<?php
	include('header.inc.php');
	include('mysql.inc.php');
?>
	<div class="wrap">
		<?php
		$q ='SELECT titre, contenu, id, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr 
			 FROM billets ORDER BY id DESC ';
		$reponse = $bdd->query($q);
	
		while($donnees = $reponse->fetch())
		{
			echo "<p><em>" . htmlspecialchars($donnees['date_creation_fr']) . " :</em></p>";
			echo "<p><strong>" . htmlspecialchars($donnees['titre']) . " </strong></p>";
			echo "<p>" . htmlspecialchars($donnees['contenu']) . "</p>"; 
		?>
			<a class="btn-retour" href="commentaires.php?billet=<?php echo $donnees['id'];?>">Lire l'article en entier</a><br />
		<?php
		}
		?>
	</div>

