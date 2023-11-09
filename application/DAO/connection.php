<?php 
namespace application\DAO;

 class Connection {
    private $db_name ="loja";
    private $db_user = "root";
    private $db_pass = "";
    private $db_host = "localhost";

    //carrega a conexão realizada com o banco 
    
    private $conn;

    public function __construct() {
        $this->conn = new \mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }

    public function getConnection () {
        
        if($this->conn->connect_error) {
            die("a conexão falhou. ". $this->conn->connect_error);
        }
        return $this->conn;
    }
    

    public function connect(){}
    public function disconnect(){
        $this->conn->close();
    }
 } 


 ?>