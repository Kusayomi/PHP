<?php include("mysql.inc.php") ;?>
<?php session_start();
if(isset($_COOKIE['pseudo']) && $_COOKIE['pseudo']!="") 
{
	$cookiePseudo = $_COOKIE['pseudo'];
	echo "Bonjour '" . $cookiePseudo . "' content de vous revoir!";
}
if(isset($_GET['action']) && ($_GET['action'] == 'logout')) 
{
	session_unset();
	setcookie('pseudo');
	unset($_COOKIE['pseudo']);
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Blog Openclassroom</title>
</head>
<body>
	<ul>	
	 <li><a href="index.php">Accueil</a></li>
        <?php 
        	if(isset($_SESSION["user"]))
        	{
        ?>        
				<li><a href="editer.php">Créer un article</a></li>
		        <li><a href="index.php?action=logout">Déconnexion</a></li>
        <?php
       		} 
            else 
            { 
            ?>
				<li><a href="login.php">Connexion</a></li>
	            <li><a href="inscrire.php">Inscription</a></li>
        <?php
            }
        ?>
	</ul>

	<h1>Bienvenue sur ce blog</h1>
