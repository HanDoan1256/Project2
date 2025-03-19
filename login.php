<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Login</title>
    
</head>
    <body>
        <?php include 'header.inc'; ?>
        <br>
        <br>
        <br>
        <br>
        <h2>Login</h2>
        <form method = "post" action = "loginprocess.php">
            <label for "username"> Username: </label>
            <input type = "text" name ="username" required ><br>

            <label for "password"> Password:</label>
            <input type = "password" name = "password" required> <br>

            <input type = "hidden" name = "token" value = "Han105506817">
            <input type ="submit" value = "Login">
        </form>
        <?php include 'footer.inc'; ?>
    </body>
</html>