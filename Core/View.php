<?php

namespace Core;

/**
 * View
 *
 * PHP version 7.0
 */
class View
{

    /**
     * Render a view file
     *
     * @param object|array $data
     */
    public static function render($data)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');

        echo json_encode($data);
    }
}
