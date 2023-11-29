<?php
namespace application\DAO;

use application\models\Product;

class ProductDAO
{
    // Create
    public function save($product)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $name = $product->getName();
        $brand = $product->getBrand();
        $price = $product->getPrice();
        $file_location = $product->getFileLocation();

        $SQL = "INSERT INTO products (name, brand, price, file_location) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssds", $name, $brand, $price, $file_location);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Read
    public function findAll()
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $SQL = "SELECT * FROM products";
        $result = $conn->query($SQL);

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $product = new Product($row["name"], $row["brand"], $row["price"]);
            $product->setCod($row["cod"]);
            $product->setFileLocation($row["file_location"]);
            array_push($products, $product);
        }

        return $products;
    }

    public function findById($id)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $SQL = "SELECT * FROM products WHERE cod = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $product = new Product($row["name"], $row["brand"], $row["price"]);
        $product->setCod($row["cod"]);
        $product->setFileLocation($row["file_location"]);

        return $product;
    }

    // Update
    public function update($product)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $cod = $product->getCod();
        $name = $product->getName();
        $brand = $product->getBrand();
        $price = $product->getPrice();
        $file_location = $product->getFileLocation();

        $SQL = "UPDATE products SET name = ?, brand = ?, price = ?, file_location = ? WHERE cod = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssdsi", $name, $brand, $price, $file_location, $cod);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Delete
    public function delete($id)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $SQL = "DELETE FROM products WHERE cod = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }
}
?>