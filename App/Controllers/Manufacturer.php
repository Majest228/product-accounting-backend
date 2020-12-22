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
            View::render(Models\Manufacturer::add($manufactur));
        }
        else {
            View::render(['error'=>'Введены неверные данные!']);
        }
    }

}