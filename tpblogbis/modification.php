<?php 
include("header.inc.php");
?>
	<div class="wrap">
		<form action="update.php" method="post" class="formulaire">
		<?php
			try
			{
				$select = $bdd->query("SELECT * FROM billets WHERE id = ".$_GET['update']."");
				$select->setFetchMode (PDO::FETCH_OBJ);
				while ($enregistrement = $select->fetch())
				{

		?>		<input type="hidden" name="id" value="<?php echo $enregistrement->id;?>"/>
				<label for="titre">Titre : </label><input type="text" name="titre" id="titre" size="40" value="<?php echo $enregistrement->titre ;?>"/><br /><br />
				<label for="contenu">Contenu : </label> <textarea name="contenu" id="contenu" rows="5" cols="50"/><?php echo $enregistrement->contenu ;?></textarea><br /><br />
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