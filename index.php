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
      <input type="text" name="firstname">
      <label for="lastname">Nom</label>
      <input type="text" name="lastname">
      <label for="entreprise">Entreprise</label>
      <input type="text" name="entreprise">
      <label for="naissance">Date de naissance</label>
      <input type="text" name="naissance">
      <label for="adresse">Adresse</label>
      <input type="text" name="adresse">
      <label for="phone">Numéro de téléphone</label>
      <input type="text" name="phone">
      <button  class="waves-effect waves-light btn green" type="submit">Valider</button>
    </form>
</div>
  </body>
</html>
