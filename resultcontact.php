<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tableau groupe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
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
      <h2 class="center-align">Tableau des groupes</h2>
    <?php
    try {
      $bdd = new PDO ('mysql:host=localhost;dbname=Annuaire;charset=utf8', 'Annuaire', '508o2mtEjBddspk1');

    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->query('SELECT * FROM Groupe');
    ?>

    <table class="bordered">
      <thead>
        <tr>
          <th>Groupe</th>
          <th>Supprimez</th>
        </tr>
        </thead>
      <tbody>


    <?php
        while($donnees=$reponse->fetch()){
          echo '<tr><td>' . $donnees['name'] .
          '</td><td>'.
          '<a href="resultcontact.php?id='.$donnees['id'].'"><button class="waves-effect waves-light btn red">Supprimez</button></a>'.
          '</td></tr>';
        }
        if (isset($_GET['id'])){
        $bdd->exec('DELETE FROM Groupe WHERE id='.$_GET["id"]);
      }
    ?>
      <tbody>
      </table>
      <br>
      <a class="waves-effect waves-light btn green" href="contact.php">Ajouter un nouveau groupe</a>
</div>

  </body>
</html>
