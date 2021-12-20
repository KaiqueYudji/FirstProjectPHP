<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../objects/user.php';

     $database = new Database();
     $db = $database->getConnection();

     $user = new User($db);

     $stmt = $user->read();
     $num = $stmt->rowCount();

     if($num > 0){
         $user_arr = array();
         $user_arr["records"] = array();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            extract($row);

            $user_item = array(
                "id_usuario" => $id_usuario,
                "nm_usuario" => $nm_usuario,
                "ds_email" => $ds_email,
                "ds_senha" => $ds_senha
            );

            array_push($user_arr["records"],$user_item);
     }else{
        http_response_code(404);
  
        // tell the user no products found
        echo json_encode(
            array("message" => "No products found.")
        );
     }
     http_response_code(200);
  
     echo json_encode($user_arr);