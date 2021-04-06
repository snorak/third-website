<?php 
    require_once "../config/connection.php";
    session_start();

        if(isset($_POST['signin'])) {

            $regex = '/^[\w#@!]{4,20}$/';
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $errors = [];

            if(!preg_match($regex, $username)) {
                $errors[] = "Username u pogresnom formatu!";
            }
            if(!preg_match($regex, $password)) {
                $errors[] = "Password u pogresnom formatu!";
            }

            if(count($errors) > 0) {
                $_SESSION['greska'] = "Pogresan format";
                header("Location:../index.php");
            }
            else {               
                $password = md5($password);

                $query = 'SELECT up.username, up.id_role FROM user_pass up INNER JOIN roles r ON up.id_role = r.idRole  WHERE username = :username AND password = :password';

                $result = $conn->prepare($query);
                $result->bindParam(":username", $username);
                $result->bindParam(":password", $password);
                $result->execute();
                $user = $result->fetch();

                if($user) {
                    $_SESSION['user'] = $user->id_role;
                    header("Location:../views/home.php");
                }
                else {
                    $_SESSION['error'] = $errors;
                    header("Location:../index.php");
                }
            }     
        }
        else {
           http_response_code(404);
        }
?>