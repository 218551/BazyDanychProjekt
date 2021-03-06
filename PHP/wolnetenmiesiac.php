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
	<title>Hotel - Wolne w tym miesiącu</title>
</head>

<body>
	
	<h1>Hotel - Wolne w tym miesiącu</h1>
	
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
		if ($rezultat = @$polaczenie->query("SELECT * FROM wolne_ten_miasiac"))
		{
			if($rezultat->num_rows>0)
			{
			echo '<table style="width:10%">';
			echo '<tr>
					<th>Nr Pokoju</th>
					<th>Liczba Miejsc</th> 
					<th>Piętro</th>
					<th>Typ pokoju</th>
					<th>Cena pokoju</th>
				</tr>';
			while ($row = $rezultat->fetch_assoc()) 
			{
				echo '<tr>';
				echo "<td>";
				echo $row["NrPokoju"];
				echo "</td>";
				echo "<td>";
				echo $row["LiczbaMiejsc"];
				echo "</td>";
				echo "<td>";
				echo $row["Pietro"];
				echo "</td>";
				echo "<td>";
				echo $row["TypPokoju"];
				echo "</td>";
				echo "<td>";
				echo $row["CenaPokoju"];
				echo "</td>";
				echo "<tr/> \n";
			}
			echo '</table>';
			}else
			{
			echo '<br/>';
			echo "brak wolnych pokoi w tym miesiącu!";
			}
			
		}
		
		$polaczenie->close();
	}

?>
</body>
</html>