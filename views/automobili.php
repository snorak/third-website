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

<div id="filterSort"> 
  <div id="cenaSort">  <!--cena sort -->
  <select id="sortCena">
      <option value="0">Sortiranje</option>
      <option value="1">Cena Rastuće</option>
      <option value="2">Cena Opadajuće</option>
    </select>
  </div>
  <div id="kategorijeFilter">  
    <select id="kategorije">
     <option>Klasa</option>
     <?php
                $query = "SELECT * FROM classes";
                $rez = executeQuery($query);
                foreach($rez as $klasa):
     ?>
                <option value="<?=$klasa->idClass?>"><?=$klasa->name?>
    <?php endforeach; ?>
   </select>
  </div>
  <?php if($_SESSION['user'] == 1): ?>
  <div id='insert'>
    <a href="insert.php" class=''>INSERT</a>
  </div>
  <?php endif; ?>
</div>

    <!-- Portfolio ==================================================
================================================== -->
<div class="container portfolio" id="ispis">
    <?php

        $number_per_page = 9;
        $prebroj = ("SELECT COUNT(*) as brojSvih FROM cars");
        $broj = $conn->query($prebroj);
        $nesto = $broj->fetch();
        $number_of_results = $nesto->brojSvih;
        
        $number_of_pages = ceil($number_of_results/$number_per_page);

        if(!isset($_GET['page'])) {
            $page = 1;
        } 
        else {
            $page = $_GET['page'];
        }

        $limit = ($page - 1) * $number_per_page;


        $upit = "SELECT ca.idCar, ca.car_name, ca.price, ca.passengers, ca.discount, cl.name as className, fu.fuel_type, tr.type, pi.path, pi.description FROM cars ca INNER JOIN classes cl ON ca.idClass = cl.idClass INNER JOIN pictures pi ON ca.idPicture = pi.idPicture INNER JOIN fuel fu ON ca.idFuel = fu.idFuel INNER JOIN transmission tr ON ca.idTrans = tr.idTrans WHERE ca.onSale = true LIMIT $limit,$number_per_page";

        $rezultat = $conn->query($upit);
        $podaci = $rezultat->fetchAll();

        foreach ($podaci as $podatak):
    ?>

        <div class="one_third shadow auto">
        <?php if($_SESSION['user'] == 1): ?>
            <i><a href='modify.php?id=<?= $podatak->idCar ?>' data-id="<?= $podatak->idCar ?>" class='admin mod'>Modify</a></i><i><a class='admin del' href='#' data-id="<?= $podatak->idCar ?>">Delete</a></i>
        <?php endif; ?>
            <div class="view view-first">
            <img src="../assets/images/photo/<?= $podatak->path ?>" alt="<?= $podatak->description ?>" />
            </div>
            <h1 class='naziv'><?= $podatak->car_name ?>
            <?php
                if ($podatak->discount == true):
            ?>

                    <i class='akcija'>AKCIJA!</i>

                
                <?php endif; ?>
            </h1>
            <p class='klasa'>Klasa: <i class='class'><?= $podatak->className ?></i></p>
            <p class='cena'>Po ceni već od <i class="price"><?= $podatak->price ?>&euro;</i></p>
            <div class="showHide">
                <p>Gorivo: <?= $podatak->fuel_type ?></p>
                <p>Menjač: <?= $podatak->type ?></p>
                <p>Broj putnika: <?= $podatak->passengers ?></p>
            </div>
            <input type="button" class="dugme" value="Pogledaj više"/>
        </div>

        <?php endforeach; ?>
</div>
    <br/>

            <div id="stranicenje">
                    <?php
                        for($page = 1; $page <= $number_of_pages; $page++):
                    ?>
            
                <a href="automobili.php?page=<?=$page?>"><?=$page?></a>
            

                        <?php endfor; ?>
            </div>
            <br/>
<?php
    include "footer.php";
?>


