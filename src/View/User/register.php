<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<title> Pie PHP </title>
  </head>
  <body>
    <?php include('Nav.php')?>
    <h1>Inscription</h1>
    <form method="post" action="register">
      <p>
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" />
        <br />
        <label for="pass">Password :</label>
        <input type="password" autocomplete name="pass" id="pass" />

        <br />
        <input type="submit" name="submit" value="submit">
      </p>
    </form>
  </body>
</html>
