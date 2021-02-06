<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - PHP Motors</title>
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
            <h1>Registration</h1>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <form action="/accounts/index.php" method="POST">
                <label>First Name</label>
                <br>
                <input name="clientFirst" id="clientFirst" type="text" required>
                <br>
                <br>
                <label>Last Name</label>
                <br>
                <input name="clientLast" id="clientLast" type="text" required>
                <br>
                <br>
                <label>Email</label>
                <br>
                <input name="clientEmail" id="clientEmail" type="text" required>
                <br>
                <br>
                <label>Password</label>
                <br>
                <input name="clientPassword" id="clientPassword" type="password">
                <br>
                <input type="submit" name="submit" id="regbtn" value="Register">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="register">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>