<?php
    if(isset($_POST['hidden'])) {
        require_once "../config/connection.php";

        $id = $_POST['hidden'];
        $carName = $_POST['carName'];
        $class = $_POST['category'];
        $transmission = $_POST['transmission'];
        $fuel = $_POST['fuel'];
        $passengers = $_POST['passengers'];
        $price = $_POST['price'];

        $rezultat = $conn->prepare("UPDATE cars SET idClass = ?, idFuel = ?, idTrans = ?, passengers = ?, price = ?, car_name = ? WHERE idCar = ?");
        $rezultat->bindValue(1, $class);
        $rezultat->bindValue(2, $fuel);
        $rezultat->bindValue(3, $transmission);
        $rezultat->bindValue(4, $passengers);
        $rezultat->bindValue(5, $price);
        $rezultat->bindValue(6, $carName);
        $rezultat->bindValue(7, $id);
        $rezultat->execute();

        header("Location:../views/automobili.php");
    }
    else {
        http_response_code(404);
    }
    