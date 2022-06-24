<?php

    include_once './includes/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webpack 2</title>
</head>
<body>
    <h1>Mon super site avec du PHP et du JS</h1>
    <img src="./assets/images/toto.png" alt="">
    <?php if(MODE == 'DEV'): ?>
        <script src="http://localhost:35729/livereload.js"></script>
    <?php endif ?>
    <script src="./assets/js/bundle.js"></script>
</body>
</html>