<?php
session_start();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace 'your_username' and 'your_password' with your actual credentials
    if($username == 'admin' && $password == 'advertexadmin'){
        $_SESSION['loggedin'] = true;
        header("Location: users.php"); // Redirect to your main page
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restricted Page</title>
    <link rel="stylesheet" type="text/css" href="lock.css">
</head>
<body>
    <h2>Restricted Page</h2><br>
    <div class="login">
    <form id="login" method="post">

    <?php if(isset($error)) { echo "<p class='error-message'>$error</p>"; } ?>

       
        <input type="text" name="username" id="username" placeholder="Username">
        <br><br>
        
        <input type="Password" name="password" id="password" placeholder="Password">
        <br><br>
        <button type="submit" name="submit" id="submit">Login</button>

    </form>
</div>
</body>
</html>