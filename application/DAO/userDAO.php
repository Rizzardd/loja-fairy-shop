<?php
namespace application\DAO;

use application\models\User;

class UserDAO
{
    //Create
    public function save($user)
    {
        $connection = new Connection(); //instancia o objeto
        $conn = $connection->getConnection(); //recebe a conexão
        //receber os dados da outra camada
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        //monta o SQL
        $SQL = "INSERT INTO users ( name, email, password) values ( '$name', '$email', '$password') ";
        // executa a operação
        if ($conn->query($SQL) === TRUE) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br/>. $conn->error";
            return false;
        }
    }
}

?>