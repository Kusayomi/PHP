<?php include("mysql.inc.php"); ?>
<?php
	if(isset($_POST['pseudo']))
	{
		$req = $bdd->query("SELECT * FROM blog_users
					WHERE user_login ='" . $_POST['pseudo'] . "'
					AND user_pass =	'" . $_POST['mdp'] . "'");
		
		if (!$req) 
		{
			header('location: index.php?message=select_nok');
		}
		else
		{	
			$req->setFetchMode(PDO::FETCH_ASSOC);
			if ($user = $req->fetch()) 
			{
				session_start();
				$_SESSION['user'] = $user;
				setcookie('pseudo', $_POST['pseudo'], time() + 24*3600, null, null, false, true);
				header('location: index.php?message=cok');
			}
			else
			{
				header('location: login.php?message=fail');
			}
		}
	}

	else
	{
		header('Location: login.php');
	}