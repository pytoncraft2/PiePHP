<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<title>Acceuil</title>
  </head>
  <body>
    <h1>Film - Resum</h1>
    <form class="" action="find" method="post">
      <input type="text" name="find" placeholder="Rechercher">
    </form>

    <?php
    foreach($films as $key => $val) {
      ?>
      <h2><?=$val['titre']?></strong></h2>
      <strong>Resumé</strong>: <?=$val['resum']?><br>
      <strong>Année de production</strong>: <?=$val['annee_prod']?><br>
      <strong>Date début affichage: </strong>: <?=$val['date_debut_affiche']?><br>
      <strong>Date fin affichage: </strong>: <?=$val['date_fin_affiche']?>
    <form class="" action="addmovie" method="post">
      <button type="submit" name="addmovie" value="<?=$val['titre']?>" placeholder="Rechercher">Ajouter</button>
    </form>
      <?php
    }
    echo $_SESSION['email'];
    ?>

    </body>
</html>
