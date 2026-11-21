<?php
session_start();
if (!empty($_POST['mail']) && !empty($_POST['password'])) {
    $inputMail = $_POST['mail'];
    $inputPassword = $_POST['password'];

    require_once "api/connection.php";

    try {
        $query = "SELECT voornaam, email, wachtwoord FROM accounts WHERE email = :mail AND wachtwoord = :password";
        $statement = $connection->prepare($query);
        $statement->execute(['mail' => $inputMail, 'password' => $inputPassword]);
        $account = $statement->fetch();

        $_SESSION['name'] = $account['voornaam'];
        echo $_SESSION['name'];

        $connection = null;
    } catch (PDOException $e) {
        print "<p>Ongeldige mail of wachtwoord!</p> " . $e->getMessage();
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
<main style="margin-top: 0;">
    <form action="home.php" method="post">
        <label>
            email:
            <input type="email" name="mail">
        </label><br>
        <label>
            wachtwoord:
            <input type="text" name="password">
        </label>
        <button type="submit">Login</button>
    </form>
    <p>Heb je nog geen account <a href="register.php" style="color: blue; text-decoration: underline;">Sign Up</a></p>
</main>
<footer class="teal15">
    <p>&copy; De website is eigendom van GTI Beveren<br><strong>Nathan Smeets en Lander Meersman 6ADB</strong><br>Schooljaar
        2026 - 2027</p>
</footer>

<script src="index.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/beercss@5.0.3/dist/cdn/beer.min.js"></script>
<script type="module"
        src="https://cdn.jsdelivr.net/npm/material-dynamic-colors@1.1.4/dist/cdn/material-dynamic-colors.min.js"></script>
</body>

</html>
