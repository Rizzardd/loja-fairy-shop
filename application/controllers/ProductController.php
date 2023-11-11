<?php
use Application\core\Controller;
use application\DAO\ProductDAO;
use Application\models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $productDAO = new ProductDAO();
        $products = $productDAO->findAll();
       //$products = $productDAO::findAll();
        $this->view('product/index', ['products' => $products]);
    }


    public function register()
    {
        $this->view('product/register');
    }

    public function store() {
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $product = new Product($name, $brand, $price);

        $productDAO = new ProductDAO();
        $productDAO->save($product);
        $this->view('product/register');

    }

    public function initEdit($cod) {
        // 1 - buscar os dados
        $productDAO = new ProductDAO();
        $product = $productDAO->findById($cod);
        // 2 - Mostrar a view
        $this->view('product/edit', ['product'=> $product]);
    }
}

?>