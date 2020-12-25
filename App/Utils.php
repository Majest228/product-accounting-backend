<?php
namespace App;
use App\Types\Partial;
use PDO;

class Utils {
    public static function getPartial(PDO $db, $dataQuery, $countQuery, Partial $partial)
    {
        if ($partial->isOrdered()) {
            $dataQuery .= " order by {$partial->column} {$partial->direction}";
        }
        if ($partial->isPaging()) {
            $offset = $partial->page * $partial->size;
            $dataQuery .= " limit {$partial->size} offset {$offset}";
        }

        return [
            'list' => $db->query($dataQuery)->fetchAll(PDO::FETCH_ASSOC),
            'total' => (int)$db->query($countQuery)->fetch()[0]

        ];
    }
}
