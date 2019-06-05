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
	<title>Hotel - Informacje o kliencie</title>
</head>

<body>
	
	<h1>Hotel - Informacje o kliencie</h1>
	
	<form action="hotel.php" method="post">
	
		<input type="submit" value="Powrót" />
	
	</form>
	
<?php
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	$nazwisko = $_POST['nazwisko'];
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{	
		if ($rezultat = @$polaczenie->query(sprintf("call znajdz_klienta('%s');", $nazwisko)))
		{
			if($rezultat->num_rows>0)
			{
			echo '<table style="width:10%">';
			echo '<tr>
					<th>Nr Klienta</th>
					<th>Imię</th> 
					<th>Drugie Imię</th>
					<th>Nazwisko</th>
					<th>Data Urodzenia</th>
					<th>Obywatelstwo</th>
					<th>Email</th>
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
				echo "<td>";
				echo $row["DataUrodzenia"];
				echo "</td>";
				echo "<td>";
				echo $row["Obywatelstwo"];
				echo "</td>";
				echo "<td>";
				echo $row["Email"];
				echo "</td>";
				echo "<tr/> \n";
			}
			echo '</table>';
			}else
			{
			echo '<br/>';
			echo "brak klienta!";
			}
			
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