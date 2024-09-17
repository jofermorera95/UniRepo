<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Date</title>
</head>
<body>
    <h1>Today Is:</h1>
    <p>
        <?php
            date_default_timezone_set('America/Costa_Rica');
            echo date('m/d/Y');
        ?>
    </p>
</body>
</html>