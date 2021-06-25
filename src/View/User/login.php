<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

<?php include('Nav.php')?>
<h1>Connexion</h1>
<form action="log" method="post">
 <p>Votre email : <input type="email" name="email" /></p>
 <p>Votre mot de passe : <input type="password" autocomplete name="password" /></p>
 <p><input type="submit" value="Envoyer"></p>
 <p><?= $error ?>
</form>
  </body>
</html>
