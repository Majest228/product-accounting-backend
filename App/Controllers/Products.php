<?php

namespace App\Controllers;

use App\Types\Partial;
use App\Types\Product;
use \Core\View;
use \App\Models;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Products extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render(Models\Products::getAll(new Partial($_GET)));
    }

    public function addAction() {
        $product = new Product($_POST);
        if ($product->validate()){
            View::render(Models\Products::add($product));
        }
        else {
            View::render(['error'=>'Введены неверные данные!']);
        }
    }
}
