<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page - Quadrant Inc.</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="assets/img/quadrant-logo.png" alt="Quadrant logo" id="quadrant-logo">
            <img src="assets/img/inc-logo.png" alt="Inc" id="inc-logo">
            <img src="assets/img/quadrant-logo2.png" alt="quandrant-logo2" id="quadrant-logo2">
        </div>
    </header>
    <form>
    <div class="login">
        <h2 id="ln">Enter the website:</h2>
        <input type="email" name="email" placeholder="Email" id="email"> <br>
        <input type="password" name="password" placeholder="Password" id="password">
        <input type="submit" name="submit" placeholder="Enter" id="submit" value="Enter">
    </form>
    </div>
    <div class="signup">
        <h2 id="sg">No account?<br> No worries <br> <button id="btn1"><a href="registreer.php" id="txt1">Sign up</a></h2></button>
    </div>
    <footer>
        <div class="copyright">
            <h3>This Website belongs to QUADRANT Inc. <br> Official sponser for Mclaren Racing
                <img src="assets/img/quadrant-logo2.png" alt="quadrantlogo3" id="ql3">
                <img src="https://cdn-3.motorsport.com/images/mgl/YEQJgyLY/s800/mclaren-f1-team-logo-1.jpg" id="mclaren">
        </div>
    </footer>
</body>
</html>

<?php

session_start();

if (match_found_in_database()) {
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email; 
    $_SESSION['password'] = $password; 

}

header("Location: index.php");


?>
