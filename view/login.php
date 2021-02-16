<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PHP Motors</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Share+Tech&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "/css/normalize.css">
    <link rel = "stylesheet" media="screen" href = "/css/main.css">
</head>
<body>
    <div class = "page">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
            <h1>Sign in</h1>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <form action="/accounts/index.php" method="POST">
                <label>Email</label>
                <br>
                <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                <br>
                <br>
                <label>Password</label>
                <br>
                <span id = "pass-label">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                <input name="clientPassword" id="clientPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <br>
                <input type="submit" name="submit" id="regbtn" value="Register">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="Login">
            </form>
            <p>
                <a href = "/accounts/index.php/?action=registration">Not a member yet?</a>
            </p>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>