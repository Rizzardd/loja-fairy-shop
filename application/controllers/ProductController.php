<?php



use Application\core\Controller;
use application\DAO\ProductDAO;
use Application\models\Product;
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
        $price = $_POST['price'];
        $product = new Product($name, $brand, $price);

        $productDAO = new ProductDAO();
        $productDAO->save($product);

    }
}

?>