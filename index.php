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
    <form action="user.php" method="post">
      <label for="firstname">Prénom</label>
      <input type="text" name="firstname" placeholder="Prenom">
      <label for="lastname">Nom</label>
      <input type="text" name="lastname" placeholder="Nom">
      <label for="entreprise">Entreprise</label>
      <input type="text" name="entreprise" placeholder="Entreprise">
      <label for="naissance">Date de naissance</label>
      <input type="text" name="naissance" placeholder="Naissance">
      <label for="adresse">Adresse</label>
      <input type="text" name="adresse" placeholder="Adresse">
      <label for="phone">Numéro de téléphone</label>
      <input type="text" name="phone" placeholder="Numéro de téléphone">
      <p>
        <?php

        try {
          $bdd = new PDO("mysql:host=localhost; dbname=Annuaire; charset=utf8", "Annuaire", "508o2mtEjBddspk1");
        } catch (Exception $e) {
          die("Erreur : ".$e -> getMessage());
        }

         $reponse = $bdd->query("SELECT * FROM Groupe");
         foreach ($reponse as $value) {
           echo '<p><input type="checkbox" name="groupe[]" value="'.$value['id'].'" id="'.$value['name'].'" /><label for="'.$value['name'].'">'.$value['name'].'</label></p>';
         }
         ?>
      </p>

      <button  class="waves-effect waves-light btn green" type="submit">Valider</button>
    </form>




</div>
  </body>
</html>
