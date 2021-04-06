<?php
    if(isset($_POST['submit'])) {

        require_once "../config/connection.php";

        $fileName = $_FILES['slika']['name'];
        $filetmp = $_FILES['slika']['tmp_name'];
        $fileDestination = "../assets/images/photo/". $fileName;
        move_uploaded_file($filetmp, $fileDestination);

        $carName = $_POST['carName'];
        $class = $_POST['category'];
        $transmission = $_POST['transmission'];
        $fuel = $_POST['fuel'];
        $passengers = $_POST['passengers'];
        $price = $_POST['price'];
        
        $rezultat = $conn->prepare("INSERT INTO pictures VALUES(NULL, ?, ?)");
        $rezultat->bindValue(1, $fileName);
        $rezultat->bindValue(2, $carName);
        $rezultat->execute();
        //$id = $rezultat->lastInsertId();

        // nisam uspeo da preuzmem poslednji upisan id tako da je ispod stavljena fiksna vrednost za id slike


 

        //if($id) {   //ako je uspeo upis u tabelu sa slikama i ako je preuzet poslednji id onda bi se radio upis u tabelu automobili
            $upit = "INSERT INTO cars VALUES(null, 1, :class, :fuel, :transmission, :passengers, :price, :carName, 0, 1)";
            $rezultat = $conn->prepare($upit);
            //$rezultat->bindParam(":lastId",$lastId );
            $rezultat->bindParam(":class", $class );
            $rezultat->bindParam(":fuel", $fuel );
            $rezultat->bindParam(":transmission", $transmission );
            $rezultat->bindParam(":passengers", $passengers );
            $rezultat->bindParam(":price", $price );
            $rezultat->bindParam(":carName", $carName );
            
            $rezultat->execute();

            header("Location:../views/automobili.php");
        //}

    }
    else {
        http_response_code(404);
    }
?>