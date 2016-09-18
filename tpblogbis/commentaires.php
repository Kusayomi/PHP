<?php
	include('header.inc.php');
	include('mysql.inc.php');
?>
<div class="wrap">
	<h2>Détail de l'article</h2>
		<?php
			$req = $bdd->prepare('SELECT titre, contenu, id, date_creation FROM billets WHERE id = :id ');
			$req->execute(array('id' => $_GET['billet']));
			$donnees = $req->fetch();

			echo "<p><em>" . htmlspecialchars($donnees['date_creation']) . " :</em></p>";
			echo "<p><strong>" . htmlspecialchars($donnees['titre']) . " </strong></p>";
			echo "<p>" . htmlspecialchars($donnees['contenu']) . "</p>";
			echo "<a href='modification.php?update=".$donnees['id']."'>Modifier</a><br />";
			//echo "<a href='delete.php?delete=".$donnees['id']."'>Supprimer</a><br />";
			echo "<a onclick='return confirm(\"Voulez-vous supprimez ?\");' href='delete.php?delete=".$donnees['id']."'>Supprimer</a>";
		?>
		<?php
		if(isset($_SESSION['user']))
		{
		?>
			<form method="post" action="insert_comment.php?billet=<?php echo $donnees['id']; ?>">
	            <label for="auteur">Pseudo : </label><input type="text" name="auteur" id="auteur" placeholder="Entrez votre pseudo..." maxlength="20" /><br />
	            <label for="commentaire">Commentaire : </label><textarea name="commentaire" id="commentaire" placeholder="Entrez un commentaire"></textarea><br />
	            <input type="submit" value="Envoyer" />
	        </form>
	    <?php
		}
		?>	
     
	<div class="comment">
		<h3>Vos commentaires</h3>
			<?php 
				$req2 = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet = ? ');
				$req2->execute(array($_GET['billet']));
			
					while($donnees = $req2->fetch())
					{				
						echo "<p><em>Date de création : " . htmlspecialchars($donnees['date_commentaire']) . " :</em></p>";
						echo "<p>Auteur : " . htmlspecialchars($donnees['auteur']) . "</p>";
						echo "<p>Commentaire : " . htmlspecialchars($donnees['commentaire']) . "</p>";
						echo "<a href='modification_comm.php?modification_comm=".$donnees['id']."&amp;modif=".$donnees['id_billet']."'>Modifier</a> ";
						//echo "<a href='delete_comm.php?delete_comm=".$donnees['id']."'>Supprimer</a>";
						echo "<a onclick='return confirm(\"Voulez-vous supprimez ?\");' href='delete_comm.php?delete_comm=".$donnees['id']."'>Supprimer</a>";
					}

			?>
	</div>

			<a href="index.php" class="btn-retour">Retour à l'accueil</a>
</div>