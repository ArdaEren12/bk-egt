<?php
// çalışılan alan girilir
$host = 'localhost';
$kullanici = 'root';
$parola = '';
$vt = 'nohu';  // gitmek istediğimiz veri tabanı ismi yazılır

$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
mysqli_set_charset($baglanti, 'UTF8');  // FARKLI KARAKTERLERDE HATA ALMAMAK İÇİN UTF8 TANIMLADIK


?>