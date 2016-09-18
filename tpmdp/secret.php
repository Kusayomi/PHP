<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> Site </title>
</head>

<body>
<h3> Le mot de passe devrait s'afficher</h3>
<?php 
	if(isset($_POST['password']) AND $_POST['password']=="film")

	{
		$mdp= $_POST['password'];
		echo 'Le mot de passe est bien : '. $mdp;
	}
	else
	{
		echo 'sa ne marche pas';
	}
	
?>
	

</body>


</html>
