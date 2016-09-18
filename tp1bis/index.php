<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mini jeu de combat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
  include('script.php');
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">TP 1 POO</a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div>
  </div>
</nav>
<?php

/*
$dateCoup = time();
$prochainCoup = $dateCoup + (60 * 60);
echo $prochainCoup;
echo '<br />'.date('Y-m-d, H:i:s', $prochainCoup);*/


 /*
  $dateDeb = new DateTime('2006-01-01');  
  $dateFin = new DateTime();
  echo $dateDeb->format('Y-m-d'). "<br />";
  echo $dateFin->format('Y-m-d à H:i:s'). "<br />";*/

 // $nextDay = time() + (24 * 60 * 60);

  /*$datetime = new DateTime('NOW');
  $datetime->modify('+1 day');
 echo $datetime->format('Y-m-d à H:i:s')."\r";
  echo date('d/m/y à H:i:s');
    $secondes = time() + (60); 
    echo '<br /> Seconde : '.$secondes -= time(); // reste 60 sec

    echo '<br />Heures : '.$heures = floor($secondes / 3600); 
    echo '<br />Seconde : '.$secondes -= $heures * 3600; 
    echo '<br />Minute : '.$minutes = floor($secondes / 60);
    echo '<br />Seconde : '.$secondes -= $minutes * 60; 

    $heures .= $heures <= 1 ? ' heure' : ' heures';
    $minutes .= $minutes <= 1 ? ' minute' : ' minutes';
    $secondes .= $secondes <= 1 ? ' seconde' : ' secondes';

*/

?>
<div class="container">
  <h1>Bienvenue dans ce mini-jeu</h1><br />
   <p>Nombre de personnages créés : <b><?= $manager->count() ?></b></p>
<?php
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>'. $message .'</p>'; // Si oui, on l'affiche.
}

if (isset($perso)) // Si on utilise un personnage (nouveau ou pas).
{   
  /*$nombre = 15;
  echo $perso->dateConnexion().'date connexion<br />';
  echo $perso->niveau() .'niveau<br />';
  echo $perso->dateCoup().'date coup<br />';*/
  $perso->estDeco();
 
?>
    <p><a href="?deconnexion=1">Déconnexion</a></p>
    
    <legend>Mes informations</legend>
      <p>
        Nom : <?= htmlspecialchars($perso->nom()) ?><br />
        Dégâts reçus : <?= htmlspecialchars($perso->degats()) ?><br />
        Niveau : <?= htmlspecialchars($perso->niveau()) ?><br />
        Expérience : <?= htmlspecialchars($perso->experience()) ?><br />
        Force : <?= htmlspecialchars($perso->forcePerso()) ?><br />
        Nbr coup : <?= htmlspecialchars($perso->nombreCoup()) ?><br />
       
        Date de création: <?= htmlspecialchars($perso->dateCreation()) ?><br />
      </p>


    <legend>Qui frapper ?</legend>
   
<?php
$persos = $manager->getList($perso->nom());

if (empty($persos))
{
  echo 'Personne à frapper !';
}
if ($perso->estEndormi())
    {
      echo 'Limite de coup ateint, vous pouvez attaquer dans : ', $perso->prochainCoup(), '.';
    }

else
{

  foreach ($persos as $unPerso)
    echo '<a href="?frapper=', $unPerso->id(), '">', htmlspecialchars($unPerso->nom()),
         '</a> (Dégâts reçus: ', htmlspecialchars($unPerso->degats()), ' | Niveau : ', htmlspecialchars($unPerso->niveau()),
         ' | Exp : ', htmlspecialchars($unPerso->experience()), ' | Force : ', htmlspecialchars($unPerso->forcePerso()),
         ' | NombreCoup : ', htmlspecialchars($unPerso->nombreCoup()),
         ' | Date du dernier coup : ', htmlspecialchars($unPerso->dateCoup()),
         ' | Date de création : ', htmlspecialchars($unPerso->dateCreation()), ')<br />';
}
?>

<?php
}
else
{ 
?>
<form class="form-horizontal" role="form" action="" method="post" name="formulaire" onsubmit="return verif_formulaire()">
  <div class="form-group">
    <label class="control-label col-sm-1" for="nom">Nom :</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="nom" name="nom"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="degats">Dégats :</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="degats" name="degats"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="forcePerso">Force :</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="forcePerso" name="forcePerso"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="niveau">Niveau :</label>
    <div class="col-sm-11">
      <select class="form-control" name="niveau">
        <option>1</option>
        <option>10</option>
        <option>20</option>
        <option>30</option>
        <option>40</option>
        <option>50</option>
        <option>60</option>
        <option>70</option>
        <option>80</option>
        <option>90</option>
        <option>100</option>
      </select>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-1" for="exp">XP :</label>
    <div class="col-sm-11">
      <select class="form-control" name="experience">
        <option>0</option>
        <option>10</option>
        <option>20</option>
        <option>30</option>
        <option>40</option>
        <option>50</option>
        <option>60</option>
        <option>70</option>
        <option>80</option>
        <option>90</option>
        <option>99</option>
      </select>
    </div>
  </div>
  <!--<input type="hidden" name="dateCreation" value="<?php //echo date('d/m/y à H:i:s');?>"/>-->
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
      <button type="submit" class="btn btn-default" name="creer">Créer ce personnage</button>
      <button type="submit" class="btn btn-default" name="utiliser">Utiliser ce personnage</button>
    </div>
  </div>
</form>

<?php // On affiche la liste des perso à l'accueil
$q ='SELECT id, nom, degats, niveau, experience FROM personnages ORDER BY nom';
    $reponse = $db->query($q);
    echo"Liste des personnages crées :";
    while($donnees = $reponse->fetch())
    {
      echo "<p><em>" . htmlspecialchars($donnees['nom']) . "</em></p>";
    }
}
?>
</div>
<script type="text/javascript" src="tp_js.js"></script>
</body>
</html>
<?php
if (isset($perso)) // Si on a créé un personnage, on le stocke dans une variable session afin d'économiser une requête SQL.
{
  $_SESSION['perso'] = $perso;
}