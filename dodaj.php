<?php
$do_bazy = mysqli_connect('localhost','root','','pracownicy');
if(!$do_bazy){
    exit('Błąd połączenia z bazą danych');
}

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$pesel = $_POST['pesel'];

$dodaj = "INSERT INTO Pracownik 
VALUES(NULL, '$imie', '$nazwisko', '$pesel', NULL, NULL, NULL )";

$zapytanie = mysqli_query($do_bazy, $dodaj);

if(!$zapytanie){
    mysqli_close($do_bazy);
    exit("Błąd zapytania");
}

echo "Pracownik " . $imie . " " . $nazwisko . " został dodany do bazy";
mysqli_close($do_bazy);

?>