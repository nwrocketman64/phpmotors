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
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>