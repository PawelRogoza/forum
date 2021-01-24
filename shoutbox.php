<?php
include "database.php";

//sprawdzam czy form jest submitted
if (isset($_POST["zatwierdz"])) {
  $imie = mysqli_real_escape_string($con, $_POST["imie"]);
  $komunikat = mysqli_real_escape_string($con, $_POST["komunikat"]);

  // czas
  date_default_timezone_set("Europe/Warsaw");
  $czas = date("H:i:s", time());

  //walidacja danych
  if (!isset($imie) || $imie == "" || !isset($komunikat) || $komunikat == "") {
    $error = "Proszę wypełnić imię i komunikat";
    header("Location: index.php?error=".urlencode($error));
    exit();
  } else {
    $query = "INSERT INTO posts (user, message, time)
              VALUES ('$imie', '$komunikat', '$czas')";
    if (!mysqli_query($con, $query)) {
      die("Błąd: " . mysqli_error($con));
    } else {
      //skaczę do index.php
      header("Location: index.php");
      exit();
    }
              
  }
  
}

?>