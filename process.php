 <?php
  require_once 'dbkontrol.php';

$q = $_GET['q'];


$bilgi= explode("x",$q);
$soruid=$bilgi[0];
$cevap=$bilgi[1];

$result=$db->query("SELECT * FROM sorular WHERE id = '".$soruid."'")->fetch(PDO::FETCH_NUM);


$soruid= $result[0];
$soru=$result[1];
$dcevap=$result[2];
$tarih=$result[3];
$durum=$result[4];
$ca=$result[5];
$cb=$result[6];
$cc=$result[7];
$cd=$result[8];
$ce=$result[9];
$ders=$result[10];
$yil=$result[11];

 if($cevap==$dcevap){
    $sonuc='
    <div class="answert">
        Tebrikler! Doğru Cevap
    </div>';
  }else{
    $sonuc='
        <div class="answerf">
            Yanlış Cevap, Doğru Seçenek <b>'.strtoupper($dcevap).'</b>
        </div>';
 }

echo $sonuc;

?>