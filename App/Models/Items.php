<?php

namespace App\Models;

use PDO;
use App\Types\Item;


class Items extends \Core\Model{
    public static function getAll() {
        $db = static::getDB();

        return $db->query("SELECT item.id, product.name as name,item.price FROM item
                                    INNER JOIN product ON item.product_id = product.id")->fetchAll(PDO::FETCH_ASSOC);
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
}