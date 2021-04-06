<?php 
    require_once "../config/connection.php";
    $id = $_GET['id'];
?>

<?php
    include "header.php";
?>
    <div id="insertNew">
            <form action="../models/modify.php" method="POST">
                <input type="hidden" name="hidden" id="hidden" value="<?= $id ?>"/>
                <p>Unesite ime automobila:</p>
                <input type="text" name="carName" class="insrt" id="carName" autofocus/>
                <p>Izaberite klasu:</p>
                <select name="category" class="insrt">
                    <?php
                        $query = "SELECT * FROM classes";
                        $rez = executeQuery($query);
                        foreach($rez as $klasa):
                    ?>
                        <option value="<?=$klasa->idClass?>"><?=$klasa->name?>
                        <?php endforeach; ?>
                </select>
                <p>Izaberite vrstu menjača:</p>
                <select name="transmission" class="insrt">
                    <?php 
                        $query = "SELECT * FROM transmission";
                        $rez = executeQuery($query);
                        foreach($rez as $menjac):
                    ?>
                    <option value="<?=$menjac->idTrans?>"><?=$menjac->type?>
                        <?php endforeach; ?>
                </select>
                <p>Izaberite gorivo:</p>
                <select name="fuel" class="insrt">
                    <?php 
                        $query = "SELECT * FROM fuel";
                        $rez = executeQuery($query);
                        foreach($rez as $gorivo):
                    ?>
                    <option value="<?=$gorivo->idFuel?>"><?=$gorivo->fuel_type?>
                        <?php endforeach; ?>
                </select>
                <p>Izaberite broj putnika:</p>
                <input type="number" name="passengers" class="insrt" min="1" max="9"/>
                <p>Izaberite cenu:</p>
                <input type="number" name="price" class="insrt" min="1000" max="1000000" step="1000"/><br/><br/>
                <input type="submit" name="submit" value="Modify"/>
            </form>
    </div>
<?php 
    include "footer.php";
?>

</html>
