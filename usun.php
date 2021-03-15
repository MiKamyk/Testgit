<?php
$do_bazy = mysqli_connect('localhost','root','','pracownicy');
if(!$do_bazy){
    exit('Błąd połączenia z bazą danych');
	
}

$id = $_GET['id'];
$zapytaj = mysqli_query($do_bazy, "SELECT * FROM Pracownik
WHERE IdPracownik = $id");

if(!$zapytaj)
{	
	mysqli_close($do_bazy);
	exit("Błąd zapytania");
}
$ile = mysqli_num_rows($zapytaj);
if($ile == 0)
{
mysqli_close($do_bazy);
exit("Nie znaleziono pracownika");	
}
if($ile > 1)
{
	mysqli_close($do_bazy);
exit("Brak jednoznaczności");
}

$wiersz = mysqli_fetch_array($zapytaj);
$id = $wiersz['IdPracownik'];
$imie = $wiersz['Imie'];
$nazwisko = $wiersz['Nazwisko'];
$pesel = $wiersz['PESEL'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>usuwanie</title>
</head>
<body>
<form action="usun2.php" method="POST">
    <p style="font-size: 12pt; font-weight: bold;">
        usuwanie pracownika</p>
	ID: <br>
	<input type="text" name="id" value="<?php echo $id ?>" size="30"readonly="readonly"><br>
    Imię: <br>
    <input type="text" name="imie" value="<?php echo $imie ?>" size="30"readonly="readonly"><br>
    Nazwisko: <br>
    <input type="text" name="nazwisko" value="<?php echo $nazwisko ?>" size="30"readonly="readonly"><br>
    PESEL: <br>
    <input type="text" name="pesel" value="<?php echo $pesel ?>" size="30"readonly="readonly"><br>
    <input type="submit" name="dodaj" value="usun" >
</form>
</body>
</html>