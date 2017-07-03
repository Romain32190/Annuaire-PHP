<?php
try {
  $bdd = new PDO ('mysql:host=localhost;dbname=Annuaire;charset=utf8', 'Annuaire', '508o2mtEjBddspk1');

}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM annuaire');

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$phone = $_POST['phone'];
$naissance = $_POST['naissance'];
$entreprise = $_POST['entreprise'];
$adresse = $_POST['adresse'];
$id = $_POST['id'];

if(!empty($_POST['lastname']) && !empty($_POST['firstname'])
  && !empty($_POST['phone'])
  && !empty($_POST['naissance']) && !empty($_POST['entreprise'])
  && !empty($_POST['adresse'])) {

        $req= $bdd->prepare('
          INSERT INTO annuaire(nom, prenom, telephone, naissance, entreprise, adresse, inscription)
          VALUES(:nom,:prenom,:telephone,:naissance,:entreprise,:adresse, CURDATE());
        ');
          $req->execute(array(
          'nom' => $lastname,
          'prenom' => $firstname,
          'telephone' => $phone,
          'naissance' => $naissance,
          'entreprise' => $entreprise,
          'adresse' => $adresse,
        ));
}
// else {
//
//   echo 'failed';
// }
//
// $reponse = $bdd->query('SELECT * FROM groupe');

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <meta charset="utf-8">
    <title>Tableau</title>
  </head>
  <body>
    <h2 class="center-align">Annuaire</h2>

    <table class="bordered">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Entreprise</th>
          <th>Naissance</th>
          <th>Adresse</th>
          <th>Numéro de téléphone</th>
          <th>Date d'inscription</th>
          <th>Modifiez</th>
          <th>Supprimez</th>
        </thead>
      <tbody>
    <?php
        while($donnees=$reponse->fetch()){
          echo '<tr><td>' . $donnees['prenom'] .
          '</td><td>' . $donnees['nom'].
          '</td><td>'. $donnees['entreprise'].
          '</td><td>'. $donnees['naissance'].
          '</td><td>'. $donnees['adresse'].
          '</td><td>'. $donnees['telephone'].
          '</td><td>'. $donnees['inscription'].
          '</td><td>'.
          '<a href="formulairemodif.php?id='.$donnees['id'].'"><button class="waves-effect waves-light btn blue">Modifiez</button></a>'.
          '</td><td>'.
          '<a href="user.php?id='.$donnees['id'].'"><button class="waves-effect waves-light btn red">Supprimez</button></a>'.
          '</td></tr>';
        }
        if (isset($_GET['id'])){
        $bdd->exec('DELETE FROM annuaire WHERE id='.$_GET["id"]);
      }
    ?>
      <tbody>
      </table>

  </body>
</html>
