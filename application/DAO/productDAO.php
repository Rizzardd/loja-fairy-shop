<?php 
namespace application\DAO;
class ProductDAO {
    //Create
    public function save($product){
        $connection = new Connection(); //instancia o objeto
        $conn = $connection->getConnection(); //recebe a conexão
         //receber os dados da outra camada
         $name = $product->getName();
         $brand = $product->getBrand();
         $price = $product->getPrice();
        //monta o SQL
        $SQL = "INSERT INTO products ( name, brand, price) values ( '$name', '$brand', '$price') ";

        if($conn->query($SQL) === TRUE){
            return true;
        } else {
            echo "Error". $SQL . "<br/>. $conn->error";
            return false;
        }
    }
    public function getAll(){}

    //Retrieve
    public function getById($id){}

    //update
    public function update($product){}

    //delete
    public function delete($id){}

}

?>