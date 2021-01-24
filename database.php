<?php
// definiujemy, że dokument jest dokumentem PHP
// Łączymy się z SQL, zmienna to znaczek dolara + nazwa, $zmienna
// Pierwszy argument to nazwa hosta (u mnie lokalny), druga uzytkownik, trzecia haslo, czwarta nazwa bazy danych
$con = mysqli_connect("localhost", "admin", "admin", "forum");

//test połączenia, znak kropki to +
if(mysqli_connect_errno()) {
    echo "Błąd przy łączeniu z bazą danych" . $mysqli_connect_error();
}
?>