<?php 
include("header.inc.php");
?>
	<div class="wrap">
		<form action="update_comm.php" method="post" class="formulaire">
		<?php
			try
			{
				$select = $bdd->query("SELECT * FROM commentaires WHERE id = ".$_GET['modification_comm']." 
					 ");
				$select->setFetchMode (PDO::FETCH_OBJ);
				while ($enregistrement = $select->fetch())
				{

		?>		<input type="hidden" name="id" value="<?php echo $enregistrement->id;?>"/>
				<input type="hidden" name="id_billet" value="<?php echo $enregistrement->id_billet;?>"/>
				<label for="commentaire">Commentaire : </label> <textarea name="commentaire" id="commentaire" rows="5" cols="50"/><?php echo $enregistrement->commentaire ;?></textarea><br /><br />
		<?php
				}

			}
			catch (Exception $e)
			{
				echo "Une erreur est survenue lors de la récupération de l'article";
			}

		?>

				<input type="submit" value="Modifier"></input>
		</form>
	
	</div>