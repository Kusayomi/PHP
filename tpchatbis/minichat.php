<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>TP mini chat</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}

	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
?>
<?php 
//déclare l'existance de la variable contenant le cookie de minichat_post
	if(isset($_COOKIE['pseudo'])) 
	{
		$cookiePseudo = $_COOKIE['pseudo'];
	}
?>
	<h1>Bienvenue sur le chat</h1>
	<div class="chat">
		<form action="minichat_post.php" method="post">
			<p><label for="pseudo">Pseudo : </label><input type="text" name="pseudo" value="<?php if(isset($_COOKIE['pseudo'])){echo $cookiePseudo; }?>"/><br /><br />
			   <label for="message">Message : </label><input type ="text" name="message"/>
			<br /><br />
			   <input type ="submit" value="Envoyer" class="btn"/>
			</p>
			<?php
				if(isset($_GET['action']) && $_GET['action']=="n_ok")
				{
					echo "<p class='erreur'> Veuillez compléter les champs vides !</p>";
				}
			 ?>
		</form> 
		<div class="msg">
		<?php
			$reponse = $bdd->query('SELECT id, pseudo, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') 
									AS date_creation_fr FROM minichat ORDER BY id DESC');
			while($donnees = $reponse->fetch())
			{
				echo "<p>" . "<span class='date'>[". htmlspecialchars($donnees['date_creation_fr']) . "]</span> ".
				"<strong>" . htmlspecialchars($donnees['pseudo']) . " : </strong>" 
				. htmlspecialchars($donnees['message']) . "</p>";
			}
			$reponse->closeCursor();
		?>
		</div>
	</div>
</body>
</html>
