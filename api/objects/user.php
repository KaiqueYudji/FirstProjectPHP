<?php
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "TB_usuario";
  
    // object properties
    public $id_usuario;
    public $nm_usuario;
    public $ds_email;
    public $ds_senha;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $stmt = array();
        $query = "SELECT *
            FROM
                " . $this->table_name." where ds_senha = 'celio@123' ";

                $stmt = $this->conn->prepare($query);
                print_r($stmt->execute());
                // quando o código é executado fazendo a consulta só retorna um registro
                

                return $stmt;
    }
}
?>