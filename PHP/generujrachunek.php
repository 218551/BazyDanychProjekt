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
	<title>Hotel - Rachunek klienta</title>
</head>

<body>
	
	<h1>Hotel - Rachunek klienta</h1>
	
	<form action="hotel.php" method="post">
	
		<input type="submit" value="Powrót" />
	
	</form>
	
<?php
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	$userid = $_POST['userid'];
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{	
		if ($rezultat = @$polaczenie->query(sprintf("call generuj_rachunek(%d);", $userid)))
		{
			if($rezultat->num_rows>0)
			{
			echo '<table style="width:10%">';
			echo '<tr>
					<th>Nr rachunku</th>
					<th>Opłata</th> 
					<th>CzasPobytu</th>
					<th>FkKlient</th>
				</tr>';
			while ($row = $rezultat->fetch_assoc()) 
			{
				echo '<tr>';
				echo "<td>";
				echo $row["NrRachunku"];
				echo "</td>";
				echo "<td>";
				echo $row["Oplata"];
				echo "</td>";
				echo "<td>";
				echo $row["CzasPobytu"];
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
			echo "brak klienta!";
			}
			
		}
		else
			{
			echo '<br/>';
			echo "błędne dane!";
			}
		
		$polaczenie->close();
	}

?>
</body>
</html>