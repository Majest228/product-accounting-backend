<?php

namespace App\Models;

use App\Types\Partial;
use App\Utils;
use PDO;
use App\Types\Item;


class Items extends \Core\Model{
    public static function getAll(Partial $partial) {
        $db = static::getDB();
        $dataQuery = "SELECT item.id,item.product_id, product.name as name,item.price FROM item
                                    LEFT JOIN product ON item.product_id = product.id";
        $countQuery = "SELECT COUNT(*) FROM `item`
";
        return Utils::getPartial($db,$dataQuery,$countQuery,$partial);
    }

    public static function add(Item $item) {
        $db = static::getDB();

        $statement = $db->prepare("
            INSERT INTO item (product_id,price)
            VALUES (:product_id,:price)
        ");
        $statement->bindParam(":product_id", $item->product_id);
        $statement->bindParam(":price", $item->price);

        return $statement->execute();
    }
    public static function edit(Item $item) {
        $db = static::getDB();

        $statement = $db->prepare("
            UPDATE item 
            SET product_id = :product_id,price = :price
            Where id = :id
        ");
        $statement->bindParam(":id", $item->id);
        $statement->bindParam(":product_id", $item->product_id);
        $statement->bindParam(":price", $item->price);

        return $statement->execute();
    }
    public static function delete($id) {
        $db = static::getDB();

        $statement = $db->prepare("
            Delete from item 
            Where id = :id
        ");
        $statement->bindParam(":id", $id);

        return $statement->execute();
    }
}
