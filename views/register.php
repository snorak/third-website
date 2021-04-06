<?php
     session_start();
?>

<html>
    <head>
        <link rel='stylesheet' type='text/css' href='../assets/css/screen.css'/>
    </head>
    <body class='blue'>
        <div class='reglog'>
            <form action="../models/register.php" method="POST">
            <h1 class='naslov'>Register</h1>
            <p>First Name:</p>
            <input type='text' id='fName' name='fName' autofocus/>
            <p>Last Name:</p>
            <input type="text" id='lName' name='lName' /><br/>
            <p>E-mail:</p>
            <input type="text" id='email' name="email" /><br/>
            <p>Username:</p>
            <input type="text" id='userName' name='userName' /><br/>
            <p>Password:</p>
            <input type="password" id='passWord' name='passWord' /><br/>
            <p>Re-password:</p>
            <input type="password" id='repassWord' name="repassWord" /><br/><br/>

            <a href='../index.php' class='log'>Imate nalog?</a><br/><br/>
            <input type='submit' value='Register' class='prijava' id='register' name='register' /><br/>
            </form>
            <p class='' id="porukaRegister">
                <?php 
                   if(isset($_SESSION['registracija'])):
                ?>
                <i>Podaci u pogresnom formatu!</i>
                   <?php endif;
                  unset($_SESSION['registracija']);
                   ?>

                <?php 
                    if(isset($_SESSION['postoji'])):
                ?>
                <i>Username zauzet</i>
                    <?php endif; 
                    unset($_SESSION['postoji']);
                    ?>
            </p>
        </div>  

        <!-- Scripts ==================================================
        ================================================== --> 
        <script src="../assets/js/jquery-1.8.0.min.js" type="text/javascript"></script> 
        <!-- Main js files --> 
        <script src="../assets/js/screen.js" type="text/javascript"></script> 
        <!-- Tabs --> 
        <script src="../assets/js/tabs.js" type="text/javascript"></script> 
        <!-- Include Superfish --> 
        <script src="../assets/js/superfish.js" type="text/javascript"></script> 
        <script src="../assets/js/hoverIntent.js" type="text/javascript"></script> 
        <!-- Flexslider --> 
        <script src="../assets/js/jquery.flexslider-min.js" type="text/javascript"></script> 
        <!-- Modernizr --> 
        <script type="text/javascript" src="../assets/js/modernizr.custom.29473.js"></script>
        <script type="text/javascript" src="../assets/js/main.js"></script>
    </body>
</html>