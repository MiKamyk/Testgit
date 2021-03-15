<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    
    <title>Pracownicy</title>
</head>
<body>

<?php
$do_bazy = mysqli_connect('localhost','root','','pracownicy');
if(!$do_bazy){
    echo "Błąd połączenia z bazą danych <br>";
    echo "</body>";
    echo "</html>";
    exit;
}else{
    $zapytanie = mysqli_query($do_bazy, 'SELECT * FROM Pracownik');
    if(!$zapytanie){
        echo "Błąd w zapytaniu";
        echo "</body> </html>";
        exit;
    }
    ?>
    <table>
    <tr>
        <td>ID</td>
        <td>Imię</td>
        <td>Nazwisko</td>
        <td>Pesel</td>
    </tr>
    <?php
    while($wiersz = mysqli_fetch_row($zapytanie)){
        echo "<tr>";
        echo "<td>$wiersz[0]</td>";
        echo "<td>$wiersz[1]</td>";
        echo "<td>$wiersz[2]</td>";
        echo "<td>$wiersz[3]</td>";
		echo '<td><a href="szukaj.php?id=' . $wiersz[0] . '">Aktualizuj</a></td>';
		echo '<td><a href="usun.php?id=' . $wiersz[0] . '">usun</a></td>';
        echo "</tr>";
    }
	
    ?>
   </table>
   
   
<?php
}
?>
<p><a href="dodaj.html">Dodaj pracownika</a><p>
    
</body>
</html>