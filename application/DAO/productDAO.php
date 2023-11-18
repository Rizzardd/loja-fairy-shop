<?php
namespace application\DAO;

use application\models\Product;

class ProductDAO
{
    //Create
    public function save($product)
    {
        $connection = new Connection(); //instancia o objeto
        $conn = $connection->getConnection(); //recebe a conexão
        //receber os dados da outra camada
        $name = $product->getName();
        $brand = $product->getBrand();
        $price = $product->getPrice();
        //monta o SQL
        $SQL = "INSERT INTO products ( name, brand, price) values ( '$name', '$brand', '$price') ";
        // executa a operação
        if ($conn->query($SQL) === TRUE) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br/>. $conn->error";
            return false;
        }
    }
    public function findAll()
    {
        // 1- instancia a conexao
        $connection = new Connection();
        // 2- recebe a conexão
        $conn = $connection->getConnection();
        $SQL = "SELECT * FROM products";
        //faz a consulta no banco
        $result = $conn->query($SQL);

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $product = new Product($row['name'], $row['brand'], $row['price']);
            $product->setCod($row['cod']);
            array_push($products, $product);
        }
        return $products;

    }

    //Retrieve
    public function findById($id)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();
        $SQL = "SELECT * FROM products WHERE cod =" . $id;
        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();
        $product = new Product($row["name"], $row["brand"], $row["price"]);
        $product->setCod($row["cod"]);
        return $product;
    }

    //update
    public function update($product)
    {

        //criar conexão
        $connection = new Connection();
        $conn = $connection->getConnection();

        //pega os dados
        $cod = $product->getCod();
        $name = $product->getName();
        $brand = $product->getBrand();
        $price = $product->getPrice();

        $SQL = "UPDATE products SET name = '$name', brand = '$brand', price = '$price' WHERE  cod =" . $cod;

        if($conn->query($SQL) === TRUE) {

            return true;
        }
        print_r("Error: " . $SQL . "<br/>. $conn->error");
        return $product;
    }

    //delete
    public function delete($id)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $SQL = "DELETE FROM products WHERE cod =". $id;

    }

}

?>