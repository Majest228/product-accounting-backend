<?php

namespace App\Controllers;

use App\Types\Item;
use \Core\View;
use \App\Models;
use App\Types\Partial;

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
        View::render(Models\Items::getAll(new Partial($_GET)));
    }

    public function addAction() {
        $item = new Item($_POST);
        if ($item->validate()){

            View::render(['done' =>Models\Items::add($item)]);
        }
        else {
            View::render(['error'=>'Введены неверные данные!','done'=>false]);
        }
    }
    public function editAction() {
        $item = new Item($_POST);
        if ($item->validate()){
            View::render(['done' =>Models\Items::edit($item)]);
        }
        else {
            View::render(['error'=>'Введены неверные данные!','done'=>false]);

        }
    }

}
