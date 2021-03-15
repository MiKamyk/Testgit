<?php
$do_bazy = mysqli_connect('localhost','root','','pracownicy');
if(!$do_bazy){
    exit('Błąd połączenia z bazą danych');
	
}


$id =$_POST['id'];
$imie =$_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$pesel = $_POST['pesel'];

$aktualizacja = "UPDATE Pracownik SET Imie='$imie', Nazwisko='$nazwisko',
	PESEL='$pesel' WHERE IdPracownik=$id";
$zapytanie = mysqli_query($do_bazy, $aktualizacja);
//var_dump($do_bazy);
if(!$zapytanie){
    mysqli_close($do_bazy);
    exit("Błąd zapytania");
}

echo "Pracownik " . $imie . " " . $nazwisko . " został zaktualizowany";
mysqli_close($do_bazy);





?>