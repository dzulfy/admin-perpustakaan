<?php
require "function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <h1>Welcome to our Library</h1>
    <?php if (isset($error)) : ?>
        <p style="color: red; font-style:italic;">Username atau Password salah</p>
    <?php endif; ?>
    <form method="post">
        <ul>
            <label for="username">Username</label>
            <input type="username" name="username" id="username" autocomplete="off">
        </ul>
        <ul>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </ul>
        <button type="submit" name="submit" style="background-color: blue; color:aliceblue;">Login</button>
    </form>
</body>

</html>