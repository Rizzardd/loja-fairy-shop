<?php 
namespace application\models;

class Product {
    private $cod;
    private $name;
    private $brand;
    private $price;
    private $file_location;

    public function __construct($name, $brand, $price, $file_location = null){
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
        $this->file_location = $file_location;
    }

    public function setCod($cod) {
        $this->cod = $cod;
    }

    public function getCod() {
        return $this->cod;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand){
        $this->brand = $brand;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getFileLocation() {
        return $this->file_location;
    }

    public function setFileLocation($file_location) {
        $this->file_location = $file_location;
    }
}
?>
