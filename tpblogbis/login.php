<?php
include('header.inc.php');
?>

<div class="wrap">
	<form action="verif-connexion.php" method="post" class="formulaire">
		<label for="pseudo">Pseudo : </label> <input type="text" name="pseudo" id="pseudo"/><br /><br />
		<label for="mdp">Mot de passe : </label> <input type="password" name="mdp" id="mdp"/><br /><br />
		<input type="submit" value="Connexion"/>
	</form>
</div>