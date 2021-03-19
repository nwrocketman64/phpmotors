<?php 
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?><!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Management</title>
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
            <h1>Image Management</h1>
            <p>
                Welcome to image management.
            </p>
            <h2>Add New Vehicle Image</h2>
            <?php
            if (isset($message)) {
                echo $message;
            } ?>
            <form action="/uploads/" method="post" enctype="multipart/form-data">
            <label for="invItem">Vehicle</label>
                <?php echo $prodSelect; ?>
                <br>
                <fieldset>
                    <label>Is this the main image for the vehicle?</label>
                    <label for="priYes" class="pImage">Yes</label>
                    <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
                    <label for="priNo" class="pImage">No</label>
                    <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
                </fieldset>
            <label>Upload Image:</label>
            <input type="file" name="file1">
            <br>
            <br>
            <input type="submit" class="regbtn" value="Upload">
            <input type="hidden" name="action" value="upload">
            </form>
            <h2>Existing Images</h2>
            <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
            <?php
            if (isset($imageDisplay)) {
                echo $imageDisplay;
            } ?>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>
<?php unset($_SESSION['message']); ?>