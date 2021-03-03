<?php 
if (!$_SESSION['loggedin']){
    header('Location: /index.php/');
}
?><!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account Information</title>
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
            <h1>Update Account Information</h1>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <h2>Update Account Info</h2>
            <form action="/accounts/index.php" method="POST">
                <label>First Name</label>
                <br>
                <input type="text" name="firstName" id="firstName" <?php if(isset($firstName)){echo "value='$firstName'";} elseif(isset($_SESSION['clientData']['clientFirstname'])){echo "value='".$_SESSION['clientData']['clientFirstname']."'";} ?> required>
                <br>
                <br>
                <label>Last Name</label>
                <br>
                <input type="text" name="lastName" id="lastName" <?php if(isset($lastName)){echo "value='$lastName'";} elseif(isset($_SESSION['clientData']['clientLastname'])){echo "value='".$_SESSION['clientData']['clientLastname']."'";} ?> required>
                <br>
                <br>
                <label>Email</label>
                <br>
                <input type="text" name="newEmail" id="newEmail" <?php if(isset($newEmail)){echo "value='$newEmail'";} elseif(isset($_SESSION['clientData']['clientEmail'])){echo "value='".$_SESSION['clientData']['clientEmail']."'";} ?> required>
                <br>
                <input type="submit" name="submit" value="Update Information">
                <input type="hidden" name="action" value="updatePersonal">
                <input type="hidden" name="invId" <?php if(isset($_SESSION['clientData']['clientId'])){echo "value='".$_SESSION['clientData']['clientId']."'";} ?>>
            </form>
            <h2>Update Password</h2>
            <p>
                Passwords must be at least 8 characters and contain at least 1
                number, 1 capital letter, and 1 special character.
            </p>
            <form action="/accounts/index.php" method="POST">
                <label>New Password</label>
                <br>
                <input name="newPassword" id="newPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <br>
                <input type="submit" name="submit" value="Update Password">
                <input type="hidden" name="action" value="updatePassword">
                <input type="hidden" name="invId" <?php if(isset($_SESSION['clientData']['clientId'])){echo "value='".$_SESSION['clientData']['clientId']."'";} ?>>
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>