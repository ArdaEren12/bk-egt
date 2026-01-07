<?php
$dersAdi="PHP";
$dersİcerik="PHP ile web siteleri geliştirme";
$dersGun="Pazartesi";
$dersSaat="10:00-18:00";
$dersresim="../image/images.webp";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $dersAdi; ?></title>
</head>
<body>
    <img src="<?php echo $dersresim; ?>" alt="">
    <h1><?php echo $dersAdi; ?></h1>
    <p><?php echo $dersİcerik; ?></p>
    <p><?php echo $dersGun; ?></p>
    <p><?php echo $dersSaat; ?></p> 
</body>
</html> 