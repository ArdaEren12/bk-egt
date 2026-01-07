<php    

include 'ayar.php';

$adi="muz";
$fiyat=10;

$sorgu =insert into urunler (adi,fiyat) values ('$adi',$fiyat);
$sonuc=mysqli_query($baglanti,$sorgu);















mysqli_close($baglanti);
?>