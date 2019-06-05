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
	<title>Hotel - panel adminstracyjny</title>
</head>

<body>
	
<?php

	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
	
?>
	<h1> Hotel - panel administracyjny </h1>
	
	<form action="goscieteraz.php" method="post">
	
		<input type="submit" value="Aktualni goście" />
	
	</form>
	<br/>
	<form action="historia.php" method="post">
	
		<input type="submit" value="Historia rezerwacji" />
	
	</form>
	<br/>
	<form action="wolnetenmiesiac.php" method="post">
	
		<input type="submit" value="Dostępne pokoje w tym miesiącu" />
	
	</form>
	<br/>
	<form action="platnosci.php" method="post">
	
		<input type="submit" value="Pokaz płatności" />
	
	</form>
	<br></br> 
	<form action="dostepne.php" method="post">
     
         Poczatek: <input type="text" name="poczatek" />  Koniec: <input type="text" name="koniec" /> <br /> <input type="submit" value="Sprawdź dostepność w terminie" /> <br/>
     
    </form>

	<br></br> 
	<form action="generujrachunek.php" method="post">
     
         Nr Klienta: <input type="text" name="userid" />  <br /> <input type="submit" value="Generuj rachunek klienta" /> <br/>
     
    </form>
	
	<br></br> 
	<form action="znajdz.php" method="post">
     
         Nazwisko klienta: <input type="text" name="nazwisko" />  <br /> <input type="submit" value="Znajdź klienta" /> <br/>
     
    </form>
	
	<br></br> 
	<form action="rezerwacja.php" method="post">
     
         Początek: <input type="text" name="poczatek" /> 
		 Koniec: <input type="text" name="koniec" /> 
		 Nr Klienta: <input type="text" name="klient" /> 
		 Nr Pokoju: <input type="text" name="pokoj" /> 
		 <br /> <input type="submit" value="Wykonaj rezerwacje" /> <br/>
     
    </form>
	<br></br>
	<form action="nowyuser.php" method="post">
	
		<span style="color:red">Nowy login</span> <input type="text" name="nowylogin" />
		<span style="color:red">Nowe haslo</span> <input type="password" name="nowehaslo" /> 
		<input type="submit" value="Dodaj użytkownika" style="color:red" />
	
	</form>
	
	<br/>
	<form action="usunuser.php" method="post">
	
		<span style="color:red">login</span> <input type="text" name="login" /> 
		<input type="submit" value="Usun użytkownika" style="color:red" />
	
	</form>
</body>
</html>