<?php
$ad = 'Arda';
$soyad = 'Eren';
$yas = 22;

$mesaj = 'merhaba benim adım ' . $ad . ' ' . $soyad . ' yaşım ' . $yas;

$mesaj2 = "merhaba benim adım {$ad} {$soyad} yaşım {$yas}";

$mesaj3="merhaba benim adım $ad $soyad yasım $yas";

echo $mesaj."<br>";
echo $mesaj2."<br>";
echo $mesaj3."<br>";

echo $mesaj[0]."<br>";
echo $mesaj2[5]."<br>";
echo $mesaj3[10]."<br>";

echo strlen($mesaj)."<br>";
echo strlen($mesaj2)."<br>";   //tr karakterleri bir fazla sayıyor mesela s 1 ş 2 olarak algılıyor
echo strlen($mesaj3)."<br>";

echo str_word_count($mesaj)."<br>";
echo str_word_count($mesaj2)."<br>";
echo str_word_count($mesaj3)."<br>";

echo strtolower($mesaj)."<br>";
echo strtoupper($mesaj)."<br>"; 
echo $mesaj;
?> 
