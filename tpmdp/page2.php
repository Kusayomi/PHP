
<?php 
	if(isset($_POST['mdp']) AND $_POST['mdp']=="hey")

	{
		$mdp= $_POST['mdp'];
		echo 'Le mot de passe est bien : '. $mdp;
	}
	else
	{
		echo 'sa ne marche pas';
	}
	
?>
	
