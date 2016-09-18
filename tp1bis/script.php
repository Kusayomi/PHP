<?php 
require('personnage.php');
require('personnage_manager.php');

session_start(); 

if (isset($_GET['deconnexion']))
{
  session_destroy();
  header('Location: .');
  exit();
}

if (isset($_SESSION['perso'])) // Si la session perso existe, on restaure l'objet.
{
  $perso = $_SESSION['perso'];
}

$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new PersonnagesManager($db);

if (isset($_POST['creer']) && isset($_POST['nom'])) // Si on a voulu créer un personnage.
{
  $perso = new Personnage(['nom' => $_POST['nom'], 'niveau' => $_POST['niveau'], 'experience' => $_POST['experience'],
                          'degats' => $_POST['degats'], 'forcePerso' => $_POST['forcePerso'],
                          'dateCreation' => date('d/m/y à H:i:s')]); // On crée un nouveau personnage.
  
  if (!$perso->nomValide())
  {
    $message = '<div class="alert alert-warning">Le nom choisi est invalide.</div>';
    unset($perso);
  }
  elseif ($manager->exists($perso->nom()))
  {
    $message = '<div class="alert alert-warning">Le nom du personnage est déjà pris.</div>';
    unset($perso);
  }
  else
  {
    $manager->add($perso);
  }
}

elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) // Si on a voulu utiliser un personnage.
{
  if ($manager->exists($_POST['nom'])) // Si celui-ci existe.
  {
    $perso = $manager->get($_POST['nom']);
  }
  else
  {
    $message = '<div class="alert alert-warning">Ce personnage n\'existe pas !</div>'; // S'il n'existe pas, on affichera ce message
  }
}
elseif (isset($_GET['frapper'])) // Si on a cliqué sur un personnage pour le frapper.
{
  if (!isset($perso))
  {
    $message = '<div class="alert alert-warning">Merci de créer un personnage ou de vous identifier.</div>';
  }
  
  else
  {
    if (!$manager->exists((int) $_GET['frapper']))
    {
      $message = 'Le personnage que vous voulez frapper n\'existe pas !';
    }
    else
    {
      $persoAFrapper = $manager->get((int) $_GET['frapper']);
      
      $retour = $perso->frapper($persoAFrapper); // On stocke dans $retour les éventuelles erreurs ou messages que renvoie la méthode frapper.
 
      switch ($retour)
      {
        case Personnage::CEST_MOI :
          $message = 'Mais... pourquoi voulez-vous vous frapper ???';
          break;
        
        case Personnage::PERSONNAGE_FRAPPER :
          $message = '<div class="alert alert-info fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          Le personnage : "' . $persoAFrapper->nom() .'" a bien été frappé !</div>'; 
          //$perso->atk();
          //$perso->limiteCoup($persoAFrapper);
          //$perso->isJourSuivant($persoAFrapper);
          $manager->update($perso);
          $manager->update($persoAFrapper);
          
          break;
        
        case Personnage::PERSO_ENDORMI :
            $message = 'Vous êtes endormi, vous ne pouvez pas attaquer !';
            break;

        case Personnage::PERSONNAGE_TUE :
          $message = '<div class="alert alert-danger fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          Le personnage : "' . $persoAFrapper->nom() .'" est mort !</div>';
          //$perso->atk();
        
          $perso->levelXp(); // level xp / up
          if($perso->experience() >= 100)
          {
            $perso->levelUp();
          }
          $manager->update($perso);
          $manager->delete($persoAFrapper);
          
          break;
      }
    }
  }
}
