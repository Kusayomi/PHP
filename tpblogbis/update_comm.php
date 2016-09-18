<?php
	include("mysql.inc.php");
	session_start();
if(isset($_SESSION["user"]))
{
	try {
		
		$query="UPDATE commentaires 
				SET commentaire=:commentaire 
				WHERE id=:id";
		$q = $bdd->prepare($query);
		$q->bindParam(':id', $_POST["id"], PDO::PARAM_INT);
		$q->bindParam(':commentaire', $_POST["commentaire"], PDO::PARAM_STR);
		$q->execute();

			if(!$q)
			{	
				header('Location: index.php?message=updatecommm_nok');
			}
			else
			{
				header("Location: commentaires.php?billet=".$_POST['id_billet']." ");
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