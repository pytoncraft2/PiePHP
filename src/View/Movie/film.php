<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<title>Acceuil</title>
  </head>
  <body>
    <h1>Film - liste</h1>
    <form class="" action="find" method="post">
      <input type="text" name="find" placeholder="Rechercher">
    </form>
    <div class="main">
    <?php
    foreach($films as $key => $val) {
      ?>
    <form class="" action="resum" method="post">
      <button type="submit" name="resum" value="<?=$val['titre']?>" placeholder="Rechercher"><?=$val['titre']?></button>
    </form>

      <?php
    }
    foreach($find as $val) {
      ?>
      <a href='<?=$val?>'><?$val?></a><br>
      <?php
    }
    ?>
      </div>
    </body>
</html>
