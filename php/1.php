<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Merhaba</h1>
    <?php
    echo "Merhaba";
    ?>  

    <?php
    $metin = "Merhaba";
    echo $metin;
    ?>  

    <?php
    $renk = "blue";
    echo $renk;
    ?>  

    <?php   
    $renk = "blue";
    echo $renk;
    ?>  

    <h1 style="color: <?php echo $renk; ?>;">test</h1>

    <?php
    $font="Arial";
    $font_size=30;
    ?>
<h1 style="font-family: <?php echo $font; ?>; font-size: <?php echo $font_size; ?>px;">test</h1>
</body>
</html>