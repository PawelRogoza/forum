<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum dyskusyjne - rejestracja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="rejestracja" class="left">
    <h3 id="rejestracjaHeader">Załóż konto</h3><Br><br>
    <form action="rejestracja.php" method="post">
        <label for="username">Login: </label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Hasło: </label>
        <input type="password" name="password" id="password"><br>
        <label for="passwordConfirm">Potwierdź hasło: </label>
        <input type="password" name="passwordConfirm" id="passwordConfirm"><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        <input type="submit" name="submit" value="Zarejestruj" id="zarejestruj"> lub <a href="login.php">Zaloguj</a>
    </form>
  </div>
</body>
</html>

<?php
include "database.php";

if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $passwordConfirm = mysqli_real_escape_string($con, $_POST["passwordConfirm"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
  
    //walidacja danych
    if (!isset($username) || $username == "" || !isset($password) || $password == "" || $password != $passwordConfirm || !isset($email) || $email == "") {
      $error = "Wypełnij poprawnie formularz";
      header("Location: rejestracja.php?error=".urlencode($error));
      exit();
    } else {
      $query = "INSERT INTO users (username, password, email)
                VALUES ('$username', '$password', '$email')";
      if (!mysqli_query($con, $query)) {
        die("Błąd: " . mysqli_error($con));
      } else {
        //skaczę do index.php
        header("Location: login.php");
        echo("Udało się zarejestrować. Proszę, zaloguj się");
        exit();
      }
                
    }
    
  }
?>