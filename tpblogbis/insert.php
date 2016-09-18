<?php 
include("mysql.inc.php");
session_start();
?>

<?php

	if(isset($_POST["titre"]))
	{
		$query="INSERT INTO billets (titre, contenu, date_creation)
				VALUES (:titre, :contenu, NOW())";
		$q = $bdd->prepare($query);
		$q->bindValue(':titre', $_POST["titre"], PDO::PARAM_STR);
		$q->bindValue(':contenu', $_POST["contenu"], PDO::PARAM_STR);
		$q->execute();

		if(!$q)
		{
			header('Location: index.php?message=insert_nok');
		}
		else
		{
			header('Location: index.php?message=insert_ok');
		}
	}
	else
	{
		echo 'pirate !';
	}