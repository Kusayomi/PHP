<?php
	include("mysql.inc.php");
	session_start();
if(isset($_SESSION["user"]))
{
	try {
		
		$query="UPDATE billets 
				SET titre=:titre, contenu=:contenu 
				WHERE id=:id";
		$q = $bdd->prepare($query);
		$q->bindParam(':id', $_POST["id"], PDO::PARAM_INT);
		$q->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
		$q->bindParam(':contenu', $_POST["contenu"], PDO::PARAM_STR);
		$q->execute();

			if(!$q)
			{	
				header('Location: index.php?message=update_nok');
			}
			else
			{
				header('Location: index.php?message=update_ok');
			}

		}
	
	catch (Exception $e)
		{
			echo $e->getMessage();
		}
}
else
{
	echo 'pirate !';
}