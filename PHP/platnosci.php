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
	<title>Hotel - Płatności</title>
</head>

<body>
	
	<h1>Hotel - Płatności</h1>
	
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
		if ($rezultat = @$polaczenie->query("SELECT * FROM platnosc_pokoj"))
		{
			if($rezultat->num_rows>0)
			{
			echo '<table style="width:10%">';
			echo '<tr>
					<th>NrKlienta</th>
					<th>Początak zameldowania</th> 
					<th>Koniec zameldowania</th>
					<th>Czas pobytu</th>
					<th>Opłata</th>
				</tr>';
			while ($row = $rezultat->fetch_assoc()) 
			{
				echo '<tr>';
				echo "<td>";
				echo $row["FkKlient"];
				echo "</td>";
				echo "<td>";
				echo $row["PoczatekZameldowania"];
				echo "</td>";
				echo "<td>";
				echo $row["KoniecZameldowania"];
				echo "</td>";
				echo "<td>";
				echo $row["CzasPobytu"];
				echo "</td>";
				echo "<td>";
				echo $row["Oplata"];
				echo "</td>";
				echo "<tr/> \n";
			}
			echo '</table>';
			}else
			{
			echo '<br/>';
			echo "Brak płatności!";
			}
			
		}
		
		$polaczenie->close();
	}

?>
</body>
</html>