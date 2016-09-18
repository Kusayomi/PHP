<?php
require 'lib/autoload.php';

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Accueil du site</title>
    <meta charset="utf-8" />
  </head>
  
  <body>
    <?php $foo = "012345vezf678912";

    var_dump(strrpos($foo, '5', -5)); ?>

    <p><a href="admin.php">Accéder à l'espace d'administration</a></p>
<?php
if (isset($_GET['id']))
{
  $news = $manager->getUnique((int) $_GET['id']);
  
  echo '<p>Par <em>', $news->auteur(), '</em>, le ', $news->dateAjout()->format('d/m/Y à H\hi'), '</p>', "\n",
       '<h2>', $news->titre(), '</h2>', "\n",
       '<p>', nl2br($news->contenu()), '</p>', "\n";
  
  if ($news->dateAjout() != $news->dateModif())
  {
    echo '<p style="text-align: right;"><small><em>Modifiée le ', $news->dateModif()->format('d/m/Y à H\hi'), '</em></small></p>';
  }
}

else
{
  echo '<h2 style="text-align:center">Liste des 5 dernières news</h2>';
  
  foreach ($manager->getList(0, 5) as $news)
  {
    if (strlen($news->contenu()) < 5) 
    {
      $contenu = $news->contenu();
    }
    
    else
    {
      $debut = substr($news->contenu(), 0, 100);
      $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';// cut pas les mot => substr($debut,0,100 ou ' ' dernier mot si news trop court)
      
      $contenu = $debut;

    }
    
    echo '<h4><a href="?id=', $news->id(), '">', $news->titre(), '</a></h4>', "\n",
         '<p>', nl2br($contenu), '</p>';
  }
}
?>
  </body>
</html>