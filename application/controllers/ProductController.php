<?php

use Application\core\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $this->view('product/index');
    }


    public function register()
    {
        $this->view('product/register');
    }

    public function store() {
        $name = $_POST['name'];
        $brand = $_POST['brand'];

    }
}

?>