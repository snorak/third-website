<?php
    //header("Location:../index.php");
?>

<html>
    <head>
        <link rel='stylesheet' type='text/css' href='assets/css/screen.css'/>
    </head>
    <body class='blue'>
        <div class='reglog'>
            <form action='models/signin.php' method='POST'>
            <h1 class='naslov'>Sign in</h1>
            <p>Username:</p>
            <input type='text' id='username' autofocus name='username' />
            <p>Password:</p>
            <input type="password" id='password' name='password' /><br/><br/>
            <a href='views/register.php' class='log'>Nemate nalog?</a><br/><br/>
            <input type='submit' value='Sign in' class='prijava' id="signin" name='signin' /><br/>
            </form>
            <p class='' id='greskaLogin'>
                 <?php if(isset($_SESSION['error'])): ?>
                   <i>Pogresan username ili password.</i>
                   <?php unset($_SESSION['error']);?>
                  <?php endif; ?>   
                  
                  <?php if(isset($_SESSION['greska'])): ?>
                   <i>Pogresan format.</i>
                   <?php unset($_SESSION['greska']);?>
                  <?php endif; ?>   
            </p>
        </div>  

        <!-- Scripts ==================================================
        ================================================== --> 
        <script src="assets/js/jquery-1.8.0.min.js" type="text/javascript"></script> 
        <!-- Main js files --> 
        <script src="assets/js/screen.js" type="text/javascript"></script> 
        <!-- Tabs --> 
        <script src="assets/js/tabs.js" type="text/javascript"></script> 
        <!-- Include Superfish --> 
        <script src="assets/js/superfish.js" type="text/javascript"></script> 
        <script src="assets/js/hoverIntent.js" type="text/javascript"></script> 
        <!-- Flexslider --> 
        <script src="assets/js/jquery.flexslider-min.js" type="text/javascript"></script> 
        <!-- Modernizr --> 
        <script type="text/javascript" src="assets/js/modernizr.custom.29473.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>