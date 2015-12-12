<?php include('dbkontrol.php'); 
$bugun= date('Y-m-d');
$tarr=$_GET['adm'];
$sor=$_GET['s'];
if(!empty($tarr)){$bugun=$tarr;}else{}
// $sorunid=mysql_fetch_array(mysql_query("SELECT * FROM sorular where tarih='$bugun'"));
$sorunid= $db->query("SELECT * FROM sorular where tarih='$bugun'")->fetch(PDO::FETCH_NUM);
$soruid = $sorunid[0];
$soru   = $sorunid[1];
$cevap  = $sorunid[2];
$tarih  = $sorunid[3];
$durum  = $sorunid[4];
$a      = $sorunid[5];
$b      = $sorunid[6];
$c      = $sorunid[7];
$d      = $sorunid[8];
$e      = $sorunid[9];
$ders   = $sorunid[10];
$yil    = $sorunid[11];


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
	<script>
	function clearBox(elementID)
{
    document.getElementById(elementID).innerHTML = "";
}
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","process.php?q="+str,true);
  xmlhttp.send();
}
</script>

</head>
<body>
	<div data-role="page" data-theme="a" id="a">
		<div data-role="header" data-position="inline">
		<a class="ui-btn-left ui-btn-corner-all ui-btn ui-icon-home ui-btn-icon-notext ui-shadow" title=" Anasayfa " href="#a" data-form="ui-icon" data-role="button" role="button"> Anasayfa </a>
		<a class="ui-btn-right ui-btn-corner-all ui-btn ui-icon-grid ui-btn-icon-notext ui-shadow" title=" Soru " data-form="ui-icon" href="#<?php echo $bugun; ?>" data-role="button" role="button"> Soru </a>
			<h1>Her Gün Çıkmış DGS Sorusu!</h1><div style="text-align:right;">Tarih: <?php echo $TurkceAylar; ?></div>
		</div>
		<div data-role="content" data-theme="a">
			<p>Bu uygulamada her gün bir adet dgs sorusuna ulaşabileceksiniz.!</p>
			
		<p>		<a data-transition="slide" href="#<?php echo $bugun; ?>" class="ui-btn ui-icon-arrow-r ui-btn-icon-right">Bugünün Sorusu</a></p>

			<div style="text-align:center;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Mobil DGS Banner -->
				<ins class="adsbygoogle"
					 style="display:inline-block;width:320px;height:100px"
					 data-ad-client="ca-pub-8523283898799216"
					 data-ad-slot="5116087096"></ins>
				<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script></div>
		</div>
		
	</div>
	
		<div data-role="page" data-theme="a" id="<?php echo $bugun; ?>">
			
			<div data-role="header" data-position="inline">
		<a class="ui-btn-left ui-btn-corner-all ui-btn ui-icon-home ui-btn-icon-notext ui-shadow" title=" Anasayfa " onclick="clearBox('txtHint')" href="javascript:history.back()" data-form="ui-icon" data-role="button" role="button"> Anasayfa </a>
		<a class="ui-btn-right ui-btn-corner-all ui-btn ui-icon-grid ui-btn-icon-notext ui-shadow" title=" Soru " data-form="ui-icon" href="#<?php echo $bugun; ?>" data-role="button" role="button"> Soru </a>
			<h1><?php echo $TurkceAylar; ?> Günü Sorusu</h1><div style="text-align:right;"> <?php echo $yil.', '.$ders; ?></div>
		</div>
		<div data-role="content" data-theme="a">
		<p><?php echo $soru; ?></p>
		<input data-theme="a" onchange="showUser(this.value)" type="radio" name="users" id="radio-choice-1-a" value="<?php echo $soruid; ?>xa"  />
		        <label for="radio-choice-1-a" data-form="ui-btn-up-a">A) <?php echo $a; ?></label>
		<input data-theme="a" onchange="showUser(this.value)" type="radio" name="users" id="radio-choice-1-b" value="<?php echo $soruid; ?>xb"  />
		        <label for="radio-choice-1-b" data-form="ui-btn-up-a">B) <?php echo $b; ?></label>
		<input data-theme="a" onchange="showUser(this.value)" type="radio" name="users" id="radio-choice-1-c" value="<?php echo $soruid; ?>xc"  />
		        <label for="radio-choice-1-c" data-form="ui-btn-up-a">C) <?php echo $c; ?></label>
		<input data-theme="a" onchange="showUser(this.value)" type="radio" name="users" id="radio-choice-1-d" value="<?php echo $soruid; ?>xd"  />
		        <label for="radio-choice-1-d" data-form="ui-btn-up-a">D) <?php echo $d; ?></label>
		<input data-theme="a" onchange="showUser(this.value)" type="radio" name="users" id="radio-choice-1-e" value="<?php echo $soruid; ?>xe"  />
		        <label for="radio-choice-1-e" data-form="ui-btn-up-a">E) <?php echo $e; ?></label>
				<p><div id="txtHint"></div></p>
				
			
			</div>
		
		</div>
		


		
</body>
</html>