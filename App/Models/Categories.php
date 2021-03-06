<?php

namespace App\Models;

use App\Types\Partial;
use App\Utils;
use PDO;
use App\Types\Category;



class Categories extends \Core\Model{
    public static function getAll(Partial $partial) {
        $db = static::getDB();
        $dataQuery = "SELECT * FROM `category`";
        $countQuery = "SELECT COUNT(*) FROM `category`";
        return Utils::getPartial($db,$dataQuery,$countQuery,$partial);
    }

    public static function add(Category $category) {
        $db = static::getDB();

        $statement = $db->prepare("
            INSERT INTO category (name)
            VALUES (:name)
        ");
        $statement->bindParam(":name", $category->name);

        return $statement->execute();
    }
    public static function edit(Category $category) {
        $db = static::getDB();

        $statement = $db->prepare("
            UPDATE category 
            SET name = :name 
            Where id = :id
        ");
        $statement->bindParam(":id", $category->id);
        $statement->bindParam(":name", $category->name);

        return $statement->execute();
    }
    public static function delete($id) {
        $db = static::getDB();

        $statement = $db->prepare("
            Delete from category 
            Where id = :id
        ");
        $statement->bindParam(":id", $id);

        return $statement->execute();
    }
}
