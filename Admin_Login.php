<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form action="/Projects/AdminLogIn.php" method="post">
        <h2>LOGIN</h2>
        <?php if(isset($_GET['error'])){ ?>
        <p class="error"><?php echo $_GET['error']; ?></p><!-- comment -->
        <?php } ?>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Input username"><br>
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Input Email Address"><br><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Input Password"><br><br>

            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
