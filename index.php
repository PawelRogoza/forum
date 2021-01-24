<?php
    session_start();

    include "database.php";
?>
<?php
$query = "SELECT * FROM posts";
$wpisy = mysqli_query($con, $query);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="home">
    <a href="index.php">Strona główna</a>
    <a href="profile.php">Profil</a><hr>
</div>
    <form action="index.php" method="get" id="logoutForm">
    <input type="submit" name="logout" id="logout" value="Wyloguj się">
    </form><br>

    <div id="zawartosc">
        <header>
            <h1 id='naglowek'>messenger</h1>
        </header>
        <div id="wpisy">
            <ul>
                <?php while($wiersz = mysqli_fetch_assoc($wpisy)): ?>
                    <li class='wpis'><span class='godzina'><?php echo $wiersz["time"]?></span>
                    <?php echo $wiersz["user"]?> : 
                    <?php echo $wiersz["message"]?></li>
                <?php endwhile;?>

            </ul>
        </div>

        <div id="formularz">
            <form action="shoutbox.php" method="post">
                <div id="srodek">
                <input type='text' placeholder='Wpisz swoje imię: ' name='imie' id='imie'>
                <input type='text' placeholder='Wpisz swój komunikat: ' name='komunikat' id='komunikat'>
                </div>
                <input type='submit' value='Wyślij wiadomość' name='zatwierdz' id='button'>
            </form>
        </div>
    </div>
</body>
</html>

<?php

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: login.php");
}
?>