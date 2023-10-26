<?php

use Application\core\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $this->view('product/index');
    }

}

?>