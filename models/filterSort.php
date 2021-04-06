<?php

if(isset($_GET['id'])) {

    header('Content-Type: application/json');
    require_once '../config/connection.php';
    $sort = $_GET['id'];

    if($sort == 1) {
        $x = "asc";
    }
    else {
        $x = "desc";
    }

     $upit = "SELECT ca.idCar, ca.car_name, ca.price, ca.passengers, ca.discount, cl.name as className, fu.fuel_type, tr.type, pi.path, pi.description FROM cars ca INNER JOIN classes cl ON ca.idClass = cl.idClass INNER JOIN pictures pi ON ca.idPicture = pi.idPicture INNER JOIN fuel fu ON ca.idFuel = fu.idFuel INNER JOIN transmission tr ON ca.idTrans = tr.idTrans WHERE ca.onSale = true ORDER BY ca.price $x";
     $rezultat = executeQuery($upit);

     echo json_encode($rezultat);
}
else {
    http_response_code(404);
}
?>