<?php
require_once "api/connection.php";

session_start();
if (!empty($_POST['mail']) && !empty($_POST['password'] && !empty($_POST['firstname']))) {
    $inputMail = $_POST['mail'];
    $inputFirstname = $_POST['firstname'];
    $inputLastname = $_POST['lastname'];
    $inputPassword = $_POST['password'];

    try {
        $query = "insert into schoolbib.accounts (voornaam, achternaam, email, wachtwoord, Rollen_RolID)
                    values(:voornaam, :achternaam, :email, :wachtwoord, 1)";
        $statement = $connection->prepare($query);
        $statement->execute(['email' => $inputMail, 'wachtwoord' => $inputPassword, 'voornaam' => $inputFirstname, 'achternaam' => $inputLastname]);
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schoolbibliotheek</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="bootstrapAddons.css">
    <link rel="stylesheet" href="resolution.css">
    <link href="https://cdn.jsdelivr.net/npm/beercss@5.0.3/dist/cdn/beer.min.css" rel="stylesheet">
</head>

<body>
<button type="button" class="teal69 ripple" onclick="darkmode()">
    <i id="darkswitch">Nightlight</i>
    <span class="tooltip bottom">Darkmode</span>
</button>
<main style="margin-top: 0;">
    <form method="post">
        <label>
            Voornaam:
            <input type="text" name="firstname" required>
        </label><br>
        <label>
            Achternaam:
            <input type="text" name="lastname">
        </label><br>
        <label>
            email:
            <input type="email" name="mail" required>
        </label><br>
        <label>
            wachtwoord:
            <input type="password" name="password" required>
        </label>
        <button type="submit">Sign Up</button>
    </form>
    <p>Heb je al een account? <a href="login.php" style="color: blue; text-decoration: underline;">Login</a></p>
</main>
<footer class="teal15">
    <p>&copy; De website is eigendom van GTI Beveren<br><strong>Nathan Smeets en Lander Meersman 6ADB</strong><br>Schooljaar 2026 - 2027</p>
</footer>

<script src="index.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/beercss@5.0.3/dist/cdn/beer.min.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/material-dynamic-colors@1.1.4/dist/cdn/material-dynamic-colors.min.js"></script>
</body>

</html>
