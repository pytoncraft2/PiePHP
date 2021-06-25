<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

<?php include('Nav.php');?>
<h1>Profil</h1>
<p><em>Détail</em></p>
<p>Email: <?=$_SESSION['email']?></p>
<p>Vos films: <?php
foreach ($films as $val) {
  echo $val['films'];
} ?>
<p><a href="suppression">Supprimer votre compte	&#128165; </a></p>
  </body>
</html>
