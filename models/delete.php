<?php 
    $statusCode = 404;
    if(!isset($_GET['id'])) {
        http_response_code(404);
    }
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        require_once "../config/connection.php";

        $query =$conn->prepare("UPDATE cars SET onSale=0 WHERE idCar=:id");
        $query->bindParam(":id", $id);

        try {
            $result = $query->execute();
            if($result) {
                $statusCode = 204;
            } else {
                $statusCode = 500;
            }
        }
        catch (PDOException $e) {
            $statusCode = 500;
        }

        http_response_code($statusCode);

    }