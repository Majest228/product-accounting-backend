<?php

namespace App\Controllers;

use App\Types\Manufactur;
use App\Types\Partial;
use \Core\View;
use \App\Models;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Manufacturer  extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render(Models\Manufacturer::getAll(new Partial($_GET)));
    }

    public function addAction() {
        $manufactur = new Manufactur($_POST);
        if ($manufactur->validate()){
            View::render(['done' =>Models\Manufacturer::add($manufactur)]);
        }
        else {
            View::render(['error'=>'Введены неверные данные!']);
        }
    }
    public function editAction() {
        $manufactur = new Manufactur($_POST);
        if ($manufactur->validate()){
            View::render(['done' =>Models\Manufacturer::edit($manufactur)]);
        }
        else {
            View::render(['error'=>'Введены неверные данные!','done'=>false]);

        }
    }
    public function deleteAction()
    {
        if (isset($_GET['id'])) {
            View::render(['done' => Models\Manufacturer::delete($_GET['id'])]);
        } else {
            View::render(['error' => 'Введены неверные данные!', 'done' => false]);
        }
    }

}