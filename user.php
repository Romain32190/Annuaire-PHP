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

if(!empty($_POST['lastname']) && !empty($_POST['firstname'])
  && !empty($_POST['phone'])
  && !empty($_POST['naissance']) && !empty($_POST['entreprise'])
  && !empty($_POST['adresse'])) {
  // echo 'success';

        $req= $bdd->prepare('
          INSERT INTO annuaire(nom, prenom, telephone, naissance, entreprise, adresse)
          VALUES(:nom,:prenom,:telephone,:naissance,:entreprise,:adresse);
        ');
        $data = array(
          'nom' => $lastname,
          'prenom' => $firstname,
          'telephone' => $phone,
          'naissance' => $naissance,
          'entreprise' => $entreprise,
          'adresse' => $adresse,
        );
        if(! $req->execute($data) ){
          echo $req->errorInfo()[2];
        }
}
else {

  echo 'failed';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <meta charset="utf-8">
    <title>Tableau</title>
  </head>
  <body>
  <div class="container">
    <h2 class="center-align">Annuaire</h2>

    <table class="bordered" class="striped">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Entreprise</th>
          <th>Naissance</th>
          <th>Adresse</th>
          <th>Numéro de téléphone</th>
          <th>Supprimez</th>
          <th>Modifiez</th>
        </thead>
      <tbody>
    <?php
        while($donnees=$reponse->fetch()){
          echo '<tr><td>' . $donnees['prenom'] .'</td><td>' . $donnees['nom'].'</td><td>'. $donnees['entreprise'].'</td><td>'. $donnees['naissance'].'</td><td>'. $donnees['adresse'].'</td><td>'. $donnees['telephone'].'</td><td><button class="waves-effect waves-light btn red">Supprimez</button><td><button class="waves-effect waves-light btn blue">Modifiez</button></td></tr>';
        }
    ?>
      <tbody>
      </table>
    </div>
  </body>
</html>
