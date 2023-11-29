<?php
namespace application\DAO;

use application\models\User;

class UserDAO
{
    // Create
    public function signup($user)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $SQL = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Get user by ID
    public function getById($id)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $SQL = "SELECT * FROM users WHERE cod = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            return new User($user["name"], $user["email"], $user["password"]);
        } else {
            return null;
        }
    }
    // Login
    public function login($name, $password)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $SQL = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && $password === $user["password"]) {
            $_SESSION['user_id'] = $user['cod'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];

            return true;
        } else {
            return false;
        }
    }

    // Update

    public function edit($user)
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $id = $_SESSION['user_id'];
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $SQL = "UPDATE users SET name = ?, email = ?, password = ? WHERE cod = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("sssi", $name, $email, $password, $id);

        if ($stmt->execute()) {
            $_SESSION["user_name"] = $name;
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }



    // Delete
    public function delete()
    {
        $connection = new Connection();
        $conn = $connection->getConnection();

        $id = $_SESSION['user_id'];

        $SQL = "DELETE FROM users WHERE cod = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            session_unset();
            session_destroy();
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }
}
?>