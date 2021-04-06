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

    <!-- Contact Content Part - Contact Form ==================================================
================================================== -->
<div class="container contact"> 
  <!-- Contact Sidebar ==================================================
================================================== -->
  <div class="one_third">
    <h3>Informacije</h3>
    <section class="first shadow">
      <ul>
        <li>Adresa: Zdravka Čealra 16, Beograd</li>
        <li>Telefon: +381 64 54 54 788</li>
        <li>Fax: +381 11 356 66 77</li>
        <li>Website: <a href="http://ict.edu.rs" taget="_blank" title="ICT">Visoka ICT</a></li>
        <li>Email: strahinja.popadic.281.18@ict.edu.rs</a></li>
      </ul>
    </section>
  </div>
  <!-- one_third ends here -->
  <div class="two_third lastcolumn contact1">
    <div id="contactForm">
      <h3>Kontaktirajte nas</h3>
      <div class="sepContainer"></div>
      <form action="../models/mail.php" method="post" id="contact_form">
        <div class="name">
          <label for="name">Tema poruke:</label>
          <p>Molimo Vas da unesete temu poruke</p>
          <input id="name" name="subject" type="text" placeholder="Naslov" autofocus/>
        </div>
        <div class="email">
          <label for="email">Vaš email:</label>
          <p>Molimo Vas da uneste email adresu</p>
          <input id="email" name="email" type="email" placeholder="primer@nesto.com" />
        </div>
        <div class="message">
          <label for="message">Vaša poruka:</label>
          <p>Molimo Vas da unesete poruku</p>
          <textarea id="message" name="message" rows=6 cols=10></textarea>
        </div>
        <div id="loader">
          <input type="submit" value="Pošalji" id="dugme" />
        </div>
      </form>
    </div>
    <!-- end contactForm --> 
  </div>
</div>
<div class="blankSeparator"></div>

<?php   include "footer.php"; ?>