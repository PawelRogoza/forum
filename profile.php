<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="profile">
<a href="index.php" id="backButtonProfile">Strona główna</a><br><br>
<h3 id="profileHeader">Profil użytkownika</h3><br>
    <h4>Zmiana danych użytkownika</h4>
    <form action="profile.php" method="post">
        <input type="password" name="oldPassword" id="oldPassword" placeholder="Wpisz aktualne hasło">
        <input type="password" name="newPassword" id="newPassword" placeholder="Nowe hasło">
        <input type="submit" name="passwordChange" id="passwordChange" class="passwordChange" value="Zmień hasło">
    </form>

    <form action="profile.php" method="post">
        <input type="email" name="oldEmail" id="oldEmail" placeholder="Podaj aktualny email">
        <input type="email" name="newEmail" id="newEmail" placeholder="Wpisz nowy email">
        <input type="submit" name="emailChange" id="emailChange" class="emailChange" value="Zmień email">
    </form>

    <h4 id="deleteAccHeader">Usunięcie konta</h4>
    <h5>Czy na pewno chcesz usunąć swoje konto?</h5>
    <form action="profile.php" method="post">
        <input type="password" name="passwordDeleteAcc" id="passwordDeleteAcc" placeholder="Wpisz swoje hasło w celu potwierdzenia">
        <input type="submit" name="deleteAcc" id="deleteAcc" class="deleteAcc"   value="Usuń konto">
    </form>
</div>
</body>
</html>
<?php
include "database.php";


if (isset($_POST["passwordChange"])) {
    $newPassword = mysqli_real_escape_string($con, $_POST["newPassword"]);
    $oldPassword = mysqli_real_escape_string($con, $_POST["oldPassword"]);

    $check = mysqli_query($con, "SELECT password FROM users WHERE password='$oldPassword'");
    $rows = mysqli_num_rows($check);
    if($rows > 0) {
        mysqli_query($con, "UPDATE users set password = '$newPassword' WHERE password='$oldPassword'");
    } 
}

if (isset($_POST["emailChange"])) {
    $oldEmail = mysqli_real_escape_string($con, $_POST["oldEmail"]);
    $newEmail = mysqli_real_escape_string($con, $_POST["newEmail"]);

    $check = mysqli_query($con, "SELECT email FROM users WHERE email='$oldEmail'");
    $rows = mysqli_num_rows($check);
    if($rows > 0) {
        mysqli_query($con, "UPDATE users set email = '$newEmail' WHERE email='$oldEmail'");
    } 
}

if (isset($_POST["deleteAcc"])) {
    $passwordDeleteAcc = mysqli_real_escape_string($con, $_POST["passwordDeleteAcc"]);

    $check = mysqli_query($con, "SELECT * FROM users WHERE password='$passwordDeleteAcc'");
    $rows = mysqli_num_rows($check);
    if($rows > 0) {
        mysqli_query($con, "DELETE FROM users WHERE password='$passwordDeleteAcc'");
        session_destroy();
        header("Location: login.php");
    } 
}
?>