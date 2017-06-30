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

echo $lastname.''.$firstname.''.$phone.''.$naissance.''.$entreprise.''.$adresse;
if(!empty($_POST['lastname']) && !empty($_POST['firstname'])
  && !empty($_POST['phone'])
  && !empty($_POST['naissance']) && !empty($_POST['entreprise'])
  && !empty($_POST['adresse'])) {
  echo 'success';

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
