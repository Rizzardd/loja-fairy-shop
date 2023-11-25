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

    //recebe os dados
    public function update()  {
        $cod = filter_input(INPUT_POST, 'cod');
        $name = filter_input(INPUT_POST,'name');
        $brand = filter_input(INPUT_POST,'brand');
        $price = filter_input(INPUT_POST,'price');

        //cria o objeto 
        $product = new Product($name, $brand, $price);
        $product->setCod($cod);

        //cria o produto dao
        $productDAO = new ProductDAO();
        $updatedProduct = $productDAO->update($product);

        if($updatedProduct){
          $msg = 'success';
        } else {
            $msg = 'Error in edition';
        }

        $this->view('product/update', ["msg" =>  $msg, "product"=> $product]);
    }

    public function delete() {
        $cod = filter_input(INPUT_POST,"cod");
        $productDAO = new ProductDAO();
        if($productDAO->delete($cod)) {
            $msg = "success";
        } else {
            $msg = "Error in delete.";
        }

        $products = $productDAO->findAll();
        $this->view("product/index", ["msg"=> $msg,"product"=> $products]);
    }
}

?>