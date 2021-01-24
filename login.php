<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum dyskusyjne - logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    <form action="login.php" method="post" id="login" class="left">
        <h3>Zaloguj się</h3>
    <label for="username">Login: </label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Hasło: </label>
        <input type="password" name="password" id="password">
        <input type="submit" name="zaloguj" id="zaloguj" value="Zaloguj się"> lub <a href="rejestracja.php">Zarejestruj</a>
    </form>
</body>
</html>

<?php
session_start();

include "database.php";

if (isset($_POST["zaloguj"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    if(isset($_POST['zaloguj'])) {
        if ($username != "" && $password != "") {
            $check = mysqli_query($con, "SELECT * FROM users WHERE username='$username'
            AND password='$password'");
            $rows = mysqli_num_rows($check);
            if($rows > 0) {
                $_SESSION["username"] = $username;
                header('Location: index.php');
            }                         
        }
    }
}
?>