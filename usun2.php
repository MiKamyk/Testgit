<?php
$do_bazy = mysqli_connect('localhost','root','','pracownicy');
if(!$do_bazy){
    exit('Błąd połączenia z bazą danych');
	
}


$id =$_POST['id'];
$imie =$_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$pesel = $_POST['pesel'];

$usun = "DELETE FROM Pracownik WHERE IdPracownik=$id";
$zapytaj = mysqli_query($do_bazy, $usun);
//var_dump($do_bazy);
if(!$zapytaj){
    mysqli_close($do_bazy);
    exit("Błąd zapytania");
}

echo "Pracownik " . $imie . " " . $nazwisko . " został usuniety";
mysqli_close($do_bazy);





?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="3;url=http://localhost:8080/3Tew_g1/" />
    </head>
    <body>
        <h1>Powrót za 3 sekundy.</h1>
    </body>
</html>
