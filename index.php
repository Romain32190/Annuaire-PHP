<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <title>Annuaire PHP</title>
  </head>
  <body>
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
      <!-- <p>
        <input type="checkbox" id="groupe1" />
        <label for="groupe1">Amis</label>
      </p>
      <p>
        <input type="checkbox" id="groupe2"/>
        <label for="groupe2">Collègues</label>
      </p>
      <p>
        <input type="checkbox" id="groupe3" />
        <label for="groupe3">Famille</label>
      </p>
      <p>
        <input type="checkbox" id="groupe4" />
        <label for="groupe4">Autres</label>
      </p> -->
      <button  class="waves-effect waves-light btn green" type="submit">Valider</button>
    </form>




</div>
  </body>
</html>
