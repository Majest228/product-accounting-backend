<?php

namespace App\Controllers;

use App\Types\Item;
use \Core\View;
use \App\Models;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Items extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render(Models\Items::getAll());
    }

    public function addAction() {
        $item = new Item($_POST);
        if ($item->validate()){
            View::render(Models\Items::add($item));
        }
        else {
            View::render(['error'=>'Введены неверные данные!']);
        }
    }
}
