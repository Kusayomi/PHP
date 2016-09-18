<?php 
include("mysql.inc.php");
session_start();
?>

<?php
	if(isset($_POST['auteur']))
	{
		try
		{
			$req = $bdd->prepare('INSERT INTO commentaires (auteur, commentaire, id_billet, date_commentaire) 
 					  	 VALUES(:auteur, :commentaire, :id_billet, NOW())');
			//$req->execute(array($_POST['auteur'], $_POST['commentaire'], $_GET['billet']));
			$req->bindValue(':auteur', $_POST["auteur"], PDO::PARAM_STR);
			$req->bindValue(':commentaire', $_POST["commentaire"], PDO::PARAM_STR);
			$req->bindValue(':id_billet', $_GET["billet"], PDO::PARAM_STR);
			$req->execute();

			if(!$req)
			{
				header('Location: index.php?message=insert_nok');
			}
			else
			{
				header("Location: commentaires.php?billet=".$_GET['billet']." ");
			}
		}

		catch (Exception $e)
		{
			echo $e->getMessage();
		}
		
	}
	else
	{
		echo "pireate de m....";
	}

