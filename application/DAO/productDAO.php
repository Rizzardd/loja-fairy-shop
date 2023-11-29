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

        $SQL = "INSERT INTO products (name, brand, price) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssd", $name, $brand, $price);

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

        $SQL = "UPDATE products SET name = ?, brand = ?, price = ? WHERE cod = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssdi", $name, $brand, $price, $cod);

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