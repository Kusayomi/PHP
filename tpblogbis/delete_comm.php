<?php
	include("mysql.inc.php");
	session_start();
?>

<?php

if(isset($_SESSION["user"]))
{
	try 
	{
		$query="DELETE from commentaires WHERE id=:id";
		$q = $bdd->prepare($query);
		$q->bindValue(':id', $_GET["delete_comm"], PDO::PARAM_INT);
		$q->execute();
		header("location:index.php?message=deletecomm_ok");
	}
	catch (Exception $e)
	{
		header("location:index.php?message=deletecomm_nok");
	}
}
else
{
	echo 'pirate !';
}