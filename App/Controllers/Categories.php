<?php

namespace App\Controllers;

use App\Types\Category;
use App\Types\Partial;
use \Core\View;
use \App\Models;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Categories  extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render(Models\Categories::getAll(new Partial($_GET)));
    }

    public function addAction() {
        $category = new Category($_POST);
        if ($category->validate()){
            View::render(['done' =>Models\Categories::add($category)]);
        }
        else {
            View::render(['error'=>'Введены неверные данные!','done'=>false]);

        }
    }
    public function editAction() {
        $category = new Category($_POST);
        if ($category->validate()){
            View::render(['done' =>Models\Categories::edit($category)]);
        }
        else {
            View::render(['error'=>'Введены неверные данные!','done'=>false]);

        }
    }
    public function deleteAction()
    {
        if (isset($_GET['id'])) {
            View::render(['done' => Models\Categories::delete($_GET['id'])]);
        } else {
            View::render(['error' => 'Введены неверные данные!', 'done' => false]);
        }
    }
}
