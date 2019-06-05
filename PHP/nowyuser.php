<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Hotel - Dodawanie użytkownik</title>
</head>

<body>
	
	<h1>Hotel - Dodawanie użytkownika</h1>
	
	<form action="hotel.php" method="post">
	
		<input type="submit" value="Powrót" />
	
	</form>
	
<?php
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	$nowylogin = $_POST['nowylogin'];
	$nowehaslo = $_POST['nowehaslo'];

	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{	
		if ($rezultat = @$polaczenie->query(sprintf("INSERT INTO `users` (`id`, `login`, `haslo`, `admin`) VALUES (NULL, '%s', '%s', '0');", $nowylogin, $nowehaslo)))
		{
			echo "Poprawnie zarejestrowano użytkownika";
		}else
			{
			echo '<br/>';
			echo "błędne dane!";
			}
		$polaczenie->close();
	}

?>
</body>
</html>