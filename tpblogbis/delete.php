<?php
	include("mysql.inc.php");
	session_start();
?>

<?php

if(isset($_SESSION["user"]))
{
	try 
	{
		$query="DELETE from billets WHERE id=:id";
		$q = $bdd->prepare($query);
		$q->bindValue(':id', $_GET["delete"], PDO::PARAM_INT);
		$q->execute();
		header('Location: index.php?message=delete_ok');
	}
	catch (Exception $e)
	{
		header("location:index.php?message=delete_nok");
	}
}
else
{
	echo 'pirate !';
}


