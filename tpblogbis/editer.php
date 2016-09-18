<?php include("header.inc.php"); ?>

<div class="wrap">
	<form action="insert.php" method="post" class="formulaire">
		<label name="auteur" type="text">
			<?php
			try 
			{
				$select = $bdd->query("SELECT * FROM blog_users WHERE ID =".$_SESSION["user"]['ID']." ");
				$select->setFetchMode (PDO::FETCH_OBJ);
				while ($enregistrement = $select->fetch())
				{	
					echo "Auteur : ".$enregistrement->user_login;
				}
			}
			catch ( Exception $e )
			{
				echo "Une erreur est survenue lors de la récupération des créateurs";
			}

			?>
		</label><br /><br />
		<label for="titre">Titre : </label> <input type="text" name="titre" id="titre"/><br /><br />
		<label for="contenu">Contenu : </label> <textarea name="contenu" id="contenu" rows="5" cols="50"/></textarea><br /><br />
		<input type="submit" value="Créer"/>
	</form>
</div>
