<?php

namespace App\Models;

use App\Types\Partial;
use App\Utils;
use PDO;
use App\Types\Manufactur;


class Manufacturer extends \Core\Model {
    public static function getAll(Partial $partial) {
        $db = static::getDB();
        $dataQuery = "SELECT * FROM `manufacturer`";
        $countQuery = "SELECT COUNT(*) FROM `manufacturer`";
        return Utils::getPartial($db,$dataQuery,$countQuery,$partial);
    }

    public static function add(Manufactur $manufactur) {
        $db = static::getDB();

        $statement = $db->prepare("
            INSERT INTO manufacturer (name)
            VALUES (:name)
        ");
        $statement->bindParam(":name", $manufactur->name);

        return $statement->execute();
    }
    public static function edit(Manufactur $manufactur) {
        $db = static::getDB();

        $statement = $db->prepare("
            UPDATE manufacturer 
            SET name = :name 
            Where id = :id
        ");
        $statement->bindParam(":id", $manufactur->id);
        $statement->bindParam(":name", $manufactur->name);

        return $statement->execute();
    }
    public static function delete($id) {
        $db = static::getDB();

        $statement = $db->prepare("
            Delete from manufacturer 
            Where id = :id
        ");
        $statement->bindParam(":id", $id);

        return $statement->execute();
    }
}
