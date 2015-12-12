<?php require_once('dbkontrol.php');
$bugun= date('Y-m-d');
$sor=$_GET['s'];
function emre($ays){
$aylar=array( 
        '01'    =>    'Ocak', 
    '02'    =>    'Şubat', 
    '03'        =>    'Mart', 
    '04'        =>    'Nisan', 
    '05'        =>    'Mayıs', 
    '06'        =>    'Haziran', 
    '07'        =>    'Temmuz', 
    '08'    =>    'Ağustos', 
    '09'    =>    'Eylül', 
    '10'    =>    'Ekim', 
    '11'    =>    'Kasım', 
    '12'    =>    'Aralık', 

);  
$ayir=explode('-',$ays);
$TurkceAy=strtr($ayir[1],$aylar);
echo $ayir[2].' '.$TurkceAy.' '.$ayir[0];
}

$aylar = array( 
    'January'    =>    'Ocak', 
    'February'    =>    'Şubat', 
    'March'        =>    'Mart', 
    'April'        =>    'Nisan', 
    'May'        =>    'Mayıs', 
    'June'        =>    'Haziran', 
    'July'        =>    'Temmuz', 
    'August'    =>    'Ağustos', 
    'September'    =>    'Eylül', 
    'October'    =>    'Ekim', 
    'November'    =>    'Kasım', 
    'December'    =>    'Aralık', 
    'Monday'    =>    'Pazartesi', 
    'Tuesday'    =>    'Salı', 
    'Wednesday'    =>    'Çarşamba', 
    'Thursday'    =>    'Perşembe', 
    'Friday'    =>    'Cuma', 
    'Saturday'    =>    'Cumartesi', 
    'Sunday'    =>    'Pazar', 
);  
$TurkceAylar =  strtr(date("d F Y, l"), $aylar);  
?>
<html>
<head>
	<META http-equiv="Content-Type" content="text/html; charset=windows-1254">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex" />
	<title>DGS Sorusu</title>
	<link rel="stylesheet" href="themes/emrek.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
</head>
<body>
	<div data-role="page" data-theme="a" id="a">
		<div data-role="header" data-position="inline">
		<a class="ui-btn-left ui-btn-corner-all ui-btn ui-icon-home ui-btn-icon-notext ui-shadow" title=" Anasayfa " href="#a" data-form="ui-icon" data-role="button" role="button"> Anasayfa </a>
		<a class="ui-btn-right ui-btn-corner-all ui-btn ui-icon-grid ui-btn-icon-notext ui-shadow" title=" Soru " data-form="ui-icon" href="#<?php echo $bugun; ?>" data-role="button" role="button"> Soru </a>
			<h1>Her Gün Çıkmış DGS Sorusu!</h1><div style="text-align:right;">Tarih: <?php echo $TurkceAylar; ?></div>
		</div>

		<div data-role="content" data-theme="a">
            <p style="text-align: center;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Mobil DGS Banner -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:320px;height:100px"
                     data-ad-client="ca-pub-8523283898799216"
                     data-ad-slot="5116087096"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script></p>
			<p>Şimdiye kadar görüntülenmiş tüm sorular arşiv şeklinde aşağıdaki gibidir.</p>
			
			    <?php $arss = $db->query("SELECT DISTINCT yil FROM sorular order by yil",PDO::FETCH_NUM);
				foreach ($arss as $arsivsorgu){
				    $sayo=$db->query("select count(*) from sorular where yil='$arsivsorgu[0]' AND tarih between '2014-12-10' and '$bugun' ")->fetch(PDO::FETCH_NUM);
			    ?>
                    <a data-transition="slide" href="#dgs-<?php echo $arsivsorgu[0];?>" class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-r ui-btn-icon-right">
                    <?php echo $arsivsorgu[0].' ('.$sayo[0].') '; ?></a>
                <?php  }    ?>
		</div>
	
	</div>
	<?php
    $sayi=1;
	for($don=2000;$don<=2019;$don++){
	?>
		<div data-role="page" data-theme="a" id="dgs-<?php echo $don; ?>">

			<div data-role="header" data-position="inline">
			    <a class="ui-btn-left ui-btn-corner-all ui-btn ui-icon-arrow-l ui-btn-icon-notext ui-shadow" title=" Anasayfa " href="javascript:history.back()" data-form="ui-icon" data-role="button" role="button"> Anasayfa </a>
			    <h1><?php echo $don; ?> DGS Soruları</h1>

		        </div>

		    <div data-role="content" data-theme="a" >

		        <?php
				$arss=$db->query("SELECT * FROM sorular WHERE yil='$don' AND tarih between '2014-12-10' and '$bugun' order by id desc",PDO::FETCH_ASSOC);
				foreach($arss as $arsivsorgu) { ?>

                    <div data-role="collapsible" class="ui-nodisc-icon ui-alt-icon">

                		<h4>Soru <?php echo $sayi.' '.$arsivsorgu['ders']; $sayi++;?></h4>
               		    <p><?php echo $arsivsorgu['soru']; ?></p>

                        A) <?php echo $arsivsorgu['a']; ?><br />
                        B) <?php echo $arsivsorgu['b']; ?><br />
                        C) <?php echo $arsivsorgu['c']; ?><br />
                        D) <?php echo $arsivsorgu['d']; ?><br />
                        E) <?php echo $arsivsorgu['e']; ?><br />

                        <div data-role="collapsible" class="ui-nodisc-icon ui-alt-icon">
                            <h2 >Cevabı Göster</h2>
                            <p>Cevap: <?php echo strtoupper($arsivsorgu['cevap']); ?></p>
                        </div>

                    </div>
                    <?php if ($sayi%5==0){ ?>
                      <div style="text-align:center;">
                          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Mobil DGS Banner -->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:320px;height:100px"
                                 data-ad-client="ca-pub-8523283898799216"
                                 data-ad-slot="5116087096"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                      </div>
                    <?php }?>
                <?php  }  ?>
			</div>

        </div>

<?php $sayi=1; } ?>
		
</body>
</html>