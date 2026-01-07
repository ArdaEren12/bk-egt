<?php
$dersAdi="PHP";
$dersİcerik="PHP ile web siteleri geliştirme";
$dersGun="Pazartesi";
$dersSaat="10:00-18:00";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
ders adı: <?php echo $dersAdi; ?>
<br>
ders içerik: <?php echo $dersİcerik; ?>
<br>
ders gün: <?php echo $dersGun; ?>
<br>
ders saat: <?php echo $dersSaat; ?>
<hr><hr>
<?php
echo "adı :".$dersAdi."<br>"."ders içerik :".$dersİcerik."<br>"."ders gün :".$dersGun."<br>"."ders saat :".$dersSaat."<br>";

?>
<hr><hr>

</body>
</html>