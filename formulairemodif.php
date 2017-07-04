<?php
try{
  $bdd = new PDO('mysql:host=localhost;dbname=Annuaire;charset=utf8', 'Annuaire', '508o2mtEjBddspk1');
}
catch (Exception $e){
  die('Erreur :' . $e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM annuaire WHERE id="'.$_GET['id'].'"');
$donnees=$reponse->fetch();
$id= $donnees['id'];
if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['entreprise']) && !empty($_POST['naissance']) && !empty($_POST ['adresse']) && !empty($_POST ['phone'])){
  $bdd->exec('UPDATE annuaire SET nom="'.$_POST['lastname'].'",prenom="'.$_POST['firstname'].'",entreprise="'.$_POST['entreprise'].'", naissance="'.$_POST['naissance'].'", adresse="'.$_POST['adresse'].'",telephone="'.$_POST['phone'].'" WHERE id = "'.$id.'" ');
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <title>Annuaire PHP</title>
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
    <h2 class="center-align">Formulaire</h2>
    <?php
     echo  '<form action="formulairemodif.php?id='.$id.'" method="post">
      <label for="firstname">Prénom</label>
      <input type="text" name="firstname" placeholder= "Prenom" value="'.$donnees['prenom'].'">
      <label for="lastname">Nom</label>
      <input type="text" name="lastname" placeholder= "Nom" value="'.$donnees['nom'].'">
      <label for="entreprise">Entreprise</label>
      <input type="text" name="entreprise" placeholder="Entreprise" value="'.$donnees['entreprise'].'">
      <label for="naissance">Date de naissance</label>
      <input type="text" name="naissance" placeholder="Naissance" value="'.$donnees['naissance'].'">
      <label for="adresse">Adresse</label>
      <input type="text" name="adresse" placeholder="Adresse" value="'.$donnees['adresse'].'">
      <label for="phone">Numéro de téléphone</label>
      <input type="text" name="phone" placeholder="Numéro de téléphone" value="'.$donnees['telephone'].'">
      <button  class="waves-effect waves-light btn green" type="submit">Valider</button>
    </form>';
?>




</div>
  </body>
</html>
