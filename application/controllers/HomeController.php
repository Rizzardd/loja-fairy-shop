<?php

use Application\core\Controller;
use application\DAO\ProductDAO;
use Application\models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $productDAO = new ProductDAO();
        $products = $productDAO->findAll();
        //$products = $productDAO::findAll();
        $this->view('home/index', ['products' => $products]);
    }
}

?>