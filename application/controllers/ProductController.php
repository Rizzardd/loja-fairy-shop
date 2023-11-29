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

    public function store()
    {
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $product = new Product($name, $brand, $price);

        $imageLocation = $this->uploadImage();

        if ($imageLocation !== null) {
            $product->setFileLocation($imageLocation);
        }

        $productDAO = new ProductDAO();
        $productDAO->save($product);
        $this->view('product/register');
        header("Location: /product/index");

    }

    public function initEdit($cod)
    {
        // 1 - buscar os dados
        $productDAO = new ProductDAO();
        $product = $productDAO->findById($cod);

        $product->setFileLocation($product->getFileLocation());
        // 2 - Mostrar a view
        $this->view('product/edit', ['product' => $product]);
    }

    //recebe os dados
    public function update()
    {
        $cod = $_POST["cod"];
        $name = $_POST["name"];
        $brand = $_POST["brand"];
        $price = $_POST["price"];

        $imageLocation = $this->uploadImage();
        if ($imageLocation === null) {
            return;
        }
        $product = new product($name, $brand, $price);
        $product->setCod($cod);
        $product->setFileLocation($imageLocation);

        $productDAO = new ProductDAO();
        $productDAO->update($product);
        $updatedProduct = $productDAO->findById($cod);

        header("Location: /product/index");
    }

    public function delete()
    {
        $cod = $_POST["productCode"];
        $productDAO = new ProductDAO();
        $productDAO->delete($cod);
        header("Location: /product/index");
        exit();
    }

    private function uploadImage()
    {
        $target_dir = $_SERVER["DOCUMENT_ROOT"] . "/assets/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (getimagesize($_FILES["product_image"]["tmp_name"]) === false) {
            echo "Sorry, your file is not an image.";
            return null;
        }

        if ($_FILES["product_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            return null;
        }

        $allowedFormats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            return null;
        }

        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            // Return the URL path to the uploaded image
            return "/assets/" . basename($_FILES["product_image"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            return null;
        }
    }

    private function uploadUpdatedImage($currentFileLocation)
    {
        if (!empty($_FILES["updated_product_image"]["name"])) {
            $target_dir = $_SERVER["DOCUMENT_ROOT"] . "/assets/";
            $target_file = $target_dir . basename($_FILES["updated_product_image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (getimagesize($_FILES["updated_product_image"]["tmp_name"]) === false) {
                echo "Sorry, your file is not an image.";
                return null;
            }

            if ($_FILES["updated_product_image"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                return null;
            }

            $allowedFormats = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                return null;
            }

            if (move_uploaded_file($_FILES["updated_product_image"]["tmp_name"], $target_file)) {
                return "/assets/" . basename($_FILES["updated_product_image"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
                return null;
            }
        } else {
            return $currentFileLocation;
        }
    }
}

?>