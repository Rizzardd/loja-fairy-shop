<?php

use application\models\User;
use application\core\Controller;
use application\DAO\UserDAO;

class UserController extends Controller
{
    public function index()
    {
        $this->view('user/index');
    }

    public function register()
    {
        $this->view("user/register");
    }

    public function signout()
    {
        session_destroy();
        session_start();
        header("Location: /home/index");
    }

    public function sendSignup()
    {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $confirmation = $_POST["rePassword"];
        $email = $_POST["email"];

        if ($password === $confirmation) {
            $user = new User($name, $email, $password);

            $userDAO = new UserDAO();
            $userDAO->signup($user);

            header("Location: /user/login");
            exit();
        } else {
            echo "Passwords do not match!";
        }
    }

    public function login()
    {
        $this->view("user/login");
    }

    public function sendLogin()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $userDAO = new UserDAO();
        $loggedIn = $userDAO->login($email, $password);

        if ($loggedIn) {
            header("Location: /home/index");
            exit();
        } else {
            echo "Login failed!";
        }
    }
    public function update()
    {
        $userDAO = new UserDAO();
        $user = $userDAO->getById($_SESSION['user_id']);

        if ($user) {
            $this->view("user/update", ["user" => $user]);
        }
    }

    public function submitUpdate()
    {
        $code = $_POST["cod"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $oldPassword = $_POST["old_password"];
        $newPassword = $_POST["password"];

        $userDAO = new UserDAO();
        $user = $userDAO->getById($code);

        if ($user && $oldPassword === $user->getPassword()) {
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($newPassword);

            if ($userDAO->edit($user)) {
                echo "User updated successfully!";
                $this->view("user/index");
            } else {
                echo "Error updating user.";
            }
        } else {
            echo "Old password does not match.";
        }
    }
    public function delete()
    {
        $userDAO = new UserDAO();
        $userDAO->delete();

        header("Location: /home/index");
        exit();
    }
}

?>