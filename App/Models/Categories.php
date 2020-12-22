<?php

namespace App\Models;

use App\Types\Partial;
use PDO;
use App\Types\Category;


class Categories extends \Core\Model{
    public static function getAll(Partial $partial) {
        $db = static::getDB();
        $dataQuery = "SELECT * FROM `category`";
        $countQuery = "SELECT COUNT(*) FROM `category`";
        if ($partial->isOrdered()){
            $dataQuery .= " order by {$partial->column} {$partial->direction}";
        }
        if ($partial->isPaging()){
            $offset = $partial->page * $partial->size;
            $dataQuery .= " limit {$partial->size} offset {$offset}";
        }

        return [
            'list'=>$db->query($dataQuery)->fetchAll(PDO::FETCH_ASSOC),
            'total'=>(int)$db->query($countQuery)->fetch()[0]

        ];
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
}
