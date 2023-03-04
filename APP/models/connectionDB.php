<?php 

class connectDB {

    public $hostName, $port, $dbname, $username, $password, $conn;
    
    
    function __construct() {
    
        $this->hostName= "localhost";
        $this->port = "3308";
        $this->dbname = "product_curd";
        $this->username = "root";
        $this->password = "";
        try {
    
            $this->conn = new PDO("mysql:host=$this->hostName;port=$this->port;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    
} 
    