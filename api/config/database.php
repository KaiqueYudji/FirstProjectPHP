<?php

 class Database{

     private $host = 'sga-iot.com';
     private $db_name = 'unitedne_bait001';
     private $username = 'unitedne_baitmgr';
     private $password = 'sgaiotbait2021#';

     public $conn;

     public function getConnection(){
         $this->conn === null;

       try{
           $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" .$this->db_name, $this->username, $this->password);
           $this->conn->exec("set names utf8");
       }catch(PDOException $exception){
           echo "conection error: " .$exception->getMessage();
       }
  
       return $this->conn;  

     }

 }

 ?>