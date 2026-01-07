<?php
$yas=22;
echo $yas;
if ($yas<18) {
    echo "cocuk";
}else{
echo"yetişkin";
}

$vize=55;
$final=75;
$ort=((($vize*0.30)+($final*0.70)));
$sonuc=$ort>=50 ? "geçti":"kaldi";
if ($ort<50) {
    $sonuc="kaldi";
}elseif($ort>=50 && $ort<60 ){
    $sonuc="E";
}elseif($ort>=60 && $ort<70){
    $sonuc="D";
}elseif($ort>=70 && $ort<80){
    $sonuc="C";
}elseif($ort>=80 && $ort<90){
    $sonuc="B";
}elseif($ort>=90 && $ort<100){
    $sonuc="A";
}
echo "<br>";
echo "ort: ".$ort." sonuc: ".$sonuc;
?>