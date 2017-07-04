<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <title>Ajouter un groupe</title>
   </head>
  <body>
    <nav>
        <div class="nav-wrapper teal darken-2">
           <a href="#" class="brand-logo">Annuaire</a>
           <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Ajouter un contact</a></li>
            <li><a href="contact.php">Ajouter un groupe</a></li>
            <li><a href="user.php">Annuaire</a></li>
          </ul>
        </div>
      </nav>
<div class="container">
  <h2 class="center-align">Ajouter un groupe</h2>
  <form action="contact.php" method="post">
      <label for="groupe">Ajouter un groupe</label>
      <input type="text" name="groupe">
      <button class="waves-effect waves-light btn green" type="submit">Valider</button>
      <a class="waves-effect waves-light btn blue" href="resultcontact.php">Cliquez ici pour voir les données du tableau</a>

    </form>
</div>
<?php
try {
  $bdd = new PDO ('mysql:host=localhost;dbname=Annuaire;charset=utf8', 'Annuaire', '508o2mtEjBddspk1');

}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM Groupe');

$groupe = $_POST['groupe'];

if(!empty($_POST['groupe'])) {

        $req  = $bdd->prepare('INSERT INTO Groupe VALUES(NULL, :name);
        ');
          $req->execute(array(
          'name' => $groupe,
        ));
}
else {

  echo '<center><font color="red">Veuillez remplir les champs</center>';
}

$reponse = $bdd->query('SELECT * FROM annuaire JOIN groupe_associatif ON annuaire.id_groupe= annuaire.id JOIN Groupe ON groupe_associatif.id_contact=groupe.id WHERE groupe.id='.$_GET['id'].'');


?>
  </body>
</html>
