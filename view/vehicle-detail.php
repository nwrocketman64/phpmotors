<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$vehiclesDetail[invMake] $vehiclesDetail[inModel]"; ?> | PHP Motors, Inc.</title>
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
            <h1><?php echo "$vehiclesDetail[invMake] $vehiclesDetail[inModel]"; ?></h1>
            <?php if(isset($message)){
                    echo $message; }
            ?>
            <?php 
                if(isset($thumbnailsList)){
                    echo $thumbnailsList;
                }
            ?>
            <?php if(isset($vehicleHTML)){
                    echo $vehicleHTML; } 
            ?>
            <h3>Customer Review</h3>
            <?php 
                if (!$_SESSION['loggedin']){
                    echo '<p>You can <a href = "/accounts/index.php?action=login">login</a> to create a review.</p>';
                }
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
            ?>
            <form action="/reviews/index.php" method="POST" <?php if (!$_SESSION['loggedin']){echo "hidden";} ?>>
                <label>Add your own review</label>
                <br>
                <textarea id="review" name="newReview" rows="4" cols="50" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required></textarea>
                <br>
                <input type="submit" name="submit" id="regbtn" value="Add Review">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addReview">
                <input type="hidden" name="userId" <?php echo 'value="'.$_SESSION['clientData']['clientId'].'"' ?>>
                <input type="hidden" name="carId" <?php echo 'value="'.$vehicleId.'"' ?>>
            </form>
            <?php 
                // Put the reviews on the page.
                if (isset($reviewHTML)){
                    echo $reviewHTML;
                }
            ?>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>