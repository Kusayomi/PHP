<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}

catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

<?php

	if(isset($_POST['pseudo'] ) && $_POST['message'] )
	{
		$req = $bdd->prepare('INSERT INTO minichat(pseudo, message, date_creation) VALUES(:pseudo, :message, NOW())');
		$req->execute(array('pseudo' => $_POST['pseudo'], 'message' => $_POST['message']));
		setcookie('pseudo', $_POST['pseudo'], time() + 24*3600, null, null, false, true);
		header('Location: minichat.php');
	}
	else
	{
		header('Location: minichat.php?action=n_ok');
	}
	
?>