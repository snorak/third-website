<?php  
    session_start();
if(!isset($_SESSION['user'])) {
    header("Location:../index.php");
}
?>

<?php
    require_once "../config/connection.php";
    include "header.php"; 
?>

    <!-- Blog ==================================================
================================================== -->
<div class="container" id="autor">
  <div class="ten columns alpha">
    <article class="post">
      <h3>Strahinja Popadić 281/18</h3>
      <a class="prettyPhoto[gal]"><img class="shadow" src="../assets/images/photo/autor.jpg" alt="autor"/></a>
    </article>
  </div>    
  <div class="ten columns alpha">
    <article class="post">
      <h5>Strahinja Popadić je rodjen u Prijepolju 1998. godine. Trenutno zivi i studira u Beogradu, a visku ICT skolu upisuje 2017. godine. Pored studiranja bavi se i sportom.</h5>
    </article>
  </div>    
  <!-- ten columns ends here -->
  
  
</div>
<!-- container ends here --> 

<?php 
    include "footer.php";
?>