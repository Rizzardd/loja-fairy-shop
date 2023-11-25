<?php 
namespace application\models;
class User {
    private $cod;
    private $name;
    private $email;
    private $password;



    public function __construct($name, $email, $password){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }
}

?>