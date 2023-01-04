<?php 
include_once 'auth/server.php';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include 'auth/errors.php';?>
    <center>
        <h1>Login</h1>
        <div style="padding: 20px;">
            <form method="POST" action="index.php">
                <label>Email</label>
                <input name="email" type="email" id="name" value="admin@colpare.com" required>
                <label>Password</label>
                <input name="password" type="password" value="admin1234" required>
                <hr />
                <button type="submit" name="login">Submit</button>
            </form>
        </div>

        <h1>Register </h1>
        <div style="padding: 20px;">
            <form method="POST" action="index.php">
                <label>Email</label>
                <input name="email" type="email" id="name" value="admin@colpare.com" required>
                <label>Password</label>
                <input name="password_1" type="password" value="admin1234" required>
                <label>Repeat Password</label>
                <input name="password_2" type="password" value="admin1234" required>
                <hr />
                <button type="submit" name="register">Submit</button>
            </form>
        </div>
    </center>
</body>

</html>