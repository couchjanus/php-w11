<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Product;

/**
 * HomeController.php
 */
// require_once MODELS.'Product.php';

class HomeController extends Controller
{
    public function index()
    {  
        $title = 'Our <b>Best Cat</b> Members Home Page';
        // $products = Product::getProducts();

        // dd($products);
        $this->_view->showFront('pages/index', ['title'=>$title]);
    }

    public function getProduct($vars)
    {
        $products = Product::getProducts();
        echo json_encode($products);
    }

}
