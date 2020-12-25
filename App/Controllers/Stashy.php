<?php

namespace App\Controllers;

use App\Types\Stash;
use \Core\View;
use \App\Models;
use App\Types\Partial;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Stashy extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render(Models\Stashy::getAll(new Partial($_GET)));
    }

    public function addAction() {
        $stash = new Stash($_POST);
        if ($stash->validate()){
            View::render(Models\Stashy::add($stash));
        }
        else {
            View::render(['error'=>'Введены неверные данные!']);
        }
    }
}
