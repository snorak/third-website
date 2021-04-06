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
    
    <!-- Slider ==================================================
================================================== -->
<section class="slider">
  <div class="flexslider">
    <ul class="slides">
      <li> <a href="#"><img src="../assets/images/flexslider/1.jpg" alt=""/></a>
        <section class="caption">  
          <h2 class="shadow3">Rent-a-car</h2>
          <p>Najbolji izbor automobila za iznajmljivanje na jednom mestu!</p>
          <a class="button" href="automobili.php">Pogledaj ponudu!</a></section>
      </li>
      <li> <img src="../assets/images/flexslider/2.jpg" alt="" />
        <section class="caption">
          <h2 class="shadow3">Rent-a-car</h2>
          <p>Najbolji izbor automobila za iznajmljivanje na jednom mestu!</p>
          <a class="button" href="automobili.php">Pogledaj ponudu!</a></section>
      </li>
      <li> <a href="#"><img src="../assets/images/flexslider/3.jpg" alt="" /></a>
        <section class="caption">
          <h2 class="shadow3">Rent-a-car</h2>
          <p>Najbolji izbor automobila za iznajmljivanje na jednom mestu!</p>
          <a class="button" href="automobili.php">Pogledaj ponudu!</a></section>
      </li>
    </ul>
  </div>
  <!-- flexslider ends here --> 
</section>
<!-- slider ends here --> 

<!--Latest Photos ==================================================
================================================== -->
<div class="container latest" id="pocetna">

    <?php
        $upit = "SELECT ca.car_name, ca.price, ca.passengers, ca.discount, cl.name as className, fu.fuel_type, tr.type, pi.path, pi.description FROM cars ca INNER JOIN classes cl ON ca.idClass = cl.idClass INNER JOIN pictures pi ON ca.idPicture = pi.idPicture INNER JOIN fuel fu ON ca.idFuel = fu.idFuel INNER JOIN transmission tr ON ca.idTrans = tr.idTrans WHERE ca.discount = true";

        $rezultat = $conn->query($upit);
        $podaci = $rezultat->fetchAll();

        foreach ($podaci as $podatak):
    ?>

            <div class="one_third shadow auto">
                <div class="view view-first">
                <img src="../assets/images/photo/<?= $podatak->path ?>" alt="<?= $podatak->description ?>" />
                </div>
                <h1 class='naziv'><?= $podatak->car_name ?> <i class='akcija'>Akcija!</i> </h1>
                <p class='klasa'>Klasa: <i class='class'><?= $podatak->className ?></i></p>
                <p class='cena'>Po ceni već od <i class="price"><?= $podatak->price ?>&euro;</i></p>
                <p class='gorivo'>Vrsta goriva: <?= $podatak->fuel_type ?></p>
                <p class='menjac'>Vrsta menjača: <?= $podatak->type ?></p>
                <p class='putnici'>Broj putnika: <?= $podatak->passengers ?></p>
            </div>

        <?php endforeach;?>

</div>
<!-- end container --> 
    
<?php
    include "footer.php";
?>