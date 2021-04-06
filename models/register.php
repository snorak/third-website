<?php 

    require_once "../config/connection.php";
    header("Content-type:application/json");
    session_start();

    if(isset($_POST['register'])) {
        $regexfName = "/^[A-Z][a-z]{2,13}$/";
        $regexlName = "/^[A-Z][a-z]{2,13}(\s[A-Z][a-z]{2,13})?$/";
        $regexEmail = "/^[a-zA-Z0-9.!#$%&'*+=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/";
        $regexU = '/^[\w#@!]{4,20}$/';
        
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $mail = $_POST['email'];
        $username = $_POST['userName'];
        $password = $_POST['passWord'];
        $rePassword = $_POST['repassWord'];

        $errors = [];

        if(!preg_match($regexfName, $fName)) {
            $errors = "Ime u pogresnom formatu";
        }
        if(!preg_match($regexlName, $lName)) {
            $errors = "Prezime u pogresnom formatu";
        }
        if(!preg_match($regexEmail, $mail)) {
            $errors = "Mail u pogresnom formatu";
        }
        if(!preg_match($regexU, $username)) {
            $errors = "Username u pogresnom formatu";
        }
        if(!preg_match($regexU, $password)) {
            $errors = "Password u pogresnom formatu";
        }
        if(!preg_match($regexU, $rePassword)) {
            $errors = "Ponovni password u pogresnom formatu";
        }
        if($password != $rePassword) {
            $errors[] = "Passwordi se ne podudaraju";
        }

        if(count($errors) > 0) {
            $_SESSION['registracija'] = $errors;
            header("Location:../views/register.php");
        }
        else {
            $password = md5($password);
            $query = "INSERT INTO user_pass(first_name, last_name, email, username, password)
            VALUES (:fName, :lName, :email, :username, :password)";

            $result = $conn->prepare($query);
            $result->bindParam(":fName", $fName);
            $result->bindParam(":lName", $lName);
            $result->bindParam(":email", $mail);
            $result->bindParam(":username", $username);
            $result->bindParam(":password", $password);

            try{
                $code = $result->execute();
                header("Location:../index.php");
            }
            catch(PDOException $e) {
                $_SESSION['postoji'] = "postoji vec";
                header("Location:../views/register.php");
            }
        }

    }
    else {
        http_response_code(404);
    }
    