<?php
use Application\core\Controller;
use application\DAO\UserDAO;
use Application\models\User;

class UserController extends Controller
{


    public function register()
    {
        $this->view('user/register');
    }

    public function signUp()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];


        if ($password === $rePassword) {
            $user = new User($name, $email, $password);

            $userDAO = new UserDAO();
            $userDAO->save($user);
            $this->view('user/register');
        } else {
            echo "chupa kabra";
        }
    }

}

?>