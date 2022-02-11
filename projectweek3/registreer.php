<?php
include "db_conn.php";

// INSERT INTO `users` (user_name, email, password) VALUES ('{$queryUserName}', '{$queryUserEmail}','{$queryUserPassword}')
// SELECT * FROM `users` WHERE `email`=$queryUserEmail

if (isset($_POST['submit'])) {
    $queryUserName = $_POST['username'];
    $queryUserEmail = $_POST['email'];
    $queryUserPassword = $_POST['password'];
    $queryUserRepeatedPassword = $_POST['password2'];

    if ($queryUserPassword != $queryUserRepeatedPassword) {
        die('passwords arent the same');
    }

    $emailCheckQuery = $dbConn->prepare("SELECT * FROM `users` WHERE `email`=?");
    $emailCheckQuery->bind_param('s', $queryUserEmail);
    if ($emailCheckQuery->execute()) {
        $emailCheckQuery->store_result();
        if ($emailCheckQuery->num_rows > 0) {
            die('Email already exists');
        }
    }



    $queryUserPassword = password_hash($queryUserPassword, PASSWORD_DEFAULT);
    $insertQuery = $dbConn->prepare("INSERT INTO `users` (`user_name`, `email`, `password`) VALUES (?, ?, ?)");
    $insertQuery->bind_param("sss", $queryUserName, $queryUserEmail, $queryUserPassword);
    if ($insertQuery->execute()) {
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreer pagina</title>
    <link rel="stylesheet" href="assets/css/registreer.css">
</head>

<body>
    <header>
        <a href="login.php"><img class="logo" src="assets/img/logo.png" alt="Quadrant logo" id="quadrant-logo"></a>
    </header><br><br><br>
    <div class="container">
        <form method="POST" action="#">
            <h2 id="account">Create a Account</h2><br>
            <input type="text" name="username" id="un" placeholder="Username" required><br>
            <input type="email" name="email" id="email" placeholder="Email" required><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            <input type="password" name="password2" id="password2" placeholder="Repeat password" required><br><br><br>
            <input type="checkbox" name="checkbox" id="cb">Do I want to recieve emails from Quadrant?<br>
            <input type="submit" name="submit" id="submit" value="Create">
        </form>
    </div>
    <footer>
        <div class="copyright">
            <h3>This Website belongs to QUADRANT Inc.<br> Official sponser for Mclaren Racing</h3>
        </div>
        <div class="foto">
            <img src="assets/img/quadrant-logo2.png" alt="quadrantlogo3" id="ql3">
            <img src="https://cdn-3.motorsport.com/images/mgl/YEQJgyLY/s800/mclaren-f1-team-logo-1.jpg" id="mclaren">
        </div>
    </footer>
</body>

</html>