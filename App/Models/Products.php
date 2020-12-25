<?php

namespace App\Models;


use App\Types\Partial;
use App\Utils;
use PDO;
use App\Types\Product;


class Products extends \Core\Model{
    public static function getAll(Partial $partial) {
        $db = static::getDB();
        $dataQuery = "SELECT product.id,product.name as product_name,manufacturer.name as manufacturer_name,category.name as category_name FROM `product`
                      INNER JOIN category ON product.category_id = category.id
                      INNER JOIN manufacturer ON product.manufacturer_id = manufacturer.id";
        $countQuery = "SELECT COUNT(*) FROM `product`
";
        return Utils::getPartial($db,$dataQuery,$countQuery,$partial);
    }

    public static function add(Product $product) {
        $db = static::getDB();

        $statement = $db->prepare("
            INSERT INTO product (name,manufacturer_id,category_id)
            VALUES (:name,:manufacturer_id,:category_id)
        ");
        $statement->bindParam(":name", $product->name);
        $statement->bindParam(":manufacturer_id", $product->manufacturer_id);
        $statement->bindParam(":category_id", $product->category_id);

        return $statement->execute();
    }
}
//                       INNER JOIN category ON product.category_id = category.id
//                       INNER JOIN manufacturer ON product.manufacturer_id = manufacturer.id