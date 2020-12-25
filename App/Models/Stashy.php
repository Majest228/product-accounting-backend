<?php

namespace App\Models;

use App\Types\Partial;
use App\Utils;
use PDO;
use App\Types\Stash;

class Stashy extends \Core\Model{
    public static function getAll(Partial $partial) {
        $db = static::getDB();
        $dataQuery = "SELECT stash.id, product.name AS product_name,manufacturer.name as manufacturer_name,category.name as category_name,stash.count FROM stash 
                      INNER JOIN item ON stash.item_id = item.id
                      INNER JOIN product ON item.product_id = product.id
                      INNER JOIN manufacturer ON product.manufacturer_id = manufacturer.id
                      INNER JOIN category ON product.category_id = category.id
";
        $countQuery = "SELECT COUNT(*) FROM `stash`
";
        return Utils::getPartial($db,$dataQuery,$countQuery,$partial);
    }

    public static function add(Stash $stash) {
        $db = static::getDB();

        $statement = $db->prepare("
            INSERT INTO stash (item_id,count)
            VALUES (:item_id,:count)
        ");
        $statement->bindParam(":item_id", $stash->item_id);
        $statement->bindParam(":count", $stash->count);

        return $statement->execute();
    }
}
