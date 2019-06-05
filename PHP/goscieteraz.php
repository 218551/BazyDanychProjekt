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
	<title>Hotel - Aktualni goście</title>
</head>

<body>
	
	<h1>Hotel - Aktualni goście</h1>
	
	<form action="hotel.php" method="post">
	
		<input type="submit" value="Powrót" />
	
	</form>
	
<?php
require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{	
		if ($rezultat = @$polaczenie->query("SELECT * FROM goscie_teraz"))
		{
			if($rezultat->num_rows>0)
			{
			echo '<table style="width:10%">';
			echo '<tr>
					<th>Nr klienta</th>
					<th>Imię klienta</th> 
					<th>Drugie imię</th>
					<th>Nazwisko</th>
				</tr>';
			while ($row = $rezultat->fetch_assoc()) 
			{
				echo '<tr>';
				echo "<td>";
				echo $row["NrKlienta"];
				echo "</td>";
				echo "<td>";
				echo $row["ImieKlienta"];
				echo "</td>";
				echo "<td>";
				echo $row["ImieDrugie"];
				echo "</td>";
				echo "<td>";
				echo $row["NazwiskoKlienta"];
				echo "</td>";
				echo "<tr/> \n";
			}
			echo '</table>';
			}else
			{
			echo '<br/>';
			echo "Aktualnie w hotelu nie przebywa żaden gość!";
			}
			
		}
		
		$polaczenie->close();
	}

?>
</body>
</html>