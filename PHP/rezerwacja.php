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
	<title>Hotel - Rezerwacja</title>
</head>

<body>
	
	<h1>Hotel - Rezerwacja</h1>
	
	<form action="hotel.php" method="post">
	
		<input type="submit" value="Powrót" />
	
	</form>
	
<?php
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	$poczatek = $_POST['poczatek'];
	$koniec = $_POST['koniec'];
	$klient = $_POST['klient'];
	$pokoj = $_POST['pokoj'];
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{	
		if ($rezultat = @$polaczenie->query(sprintf("call wykonaj_rezerwacje
		('%s','%s',%d,%d);", $poczatek, $koniec, $klient, $pokoj)))
		{
			if($rezultat->num_rows>0)
			{
			echo "Wykonano rezerwację!";
			echo '<table style="width:10%">';
			echo '<tr>
					<th>Nr Rezerwacji</th>
					<th>Początek Rezerwacji</th> 
					<th>Koniec Rezerwacji</th>
					<th>Data Rezerwacji</th>
					<th>Nr Klienta</th>
				</tr>';
			while ($row = $rezultat->fetch_assoc()) 
			{
				echo '<tr>';
				echo "<td>";
				echo $row["NrRezerwacji"];
				echo "</td>";
				echo "<td>";
				echo $row["PoczatekRezerwacji"];
				echo "</td>";
				echo "<td>";
				echo $row["KoniecRezerwacji"];
				echo "</td>";
				echo "<td>";
				echo $row["DataOperacji"];
				echo "</td>";
				echo "<td>";
				echo $row["FkKlient"];
				echo "</td>";
				echo "<tr/> \n";
			}
			echo '</table>';
			}else
			{
			echo '<br/>';
			echo "Nie udało się wykonać rezerwacji!";
			}
			
		}else
		{
			echo "Nie udało się wykonać rezerwacji!";
		}
		
		$polaczenie->close();
	}

?>
</body>
</html>