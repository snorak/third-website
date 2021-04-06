<?php
        $to = 'strahinja.popadic.281.18@ict.edu.rs';
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $headers = 'From: '. $_POST['email'];
        mail($to, $subject, $message, $headers);

        echo "<br/><h2>Mail uspešno poslat!</h2>";
?>