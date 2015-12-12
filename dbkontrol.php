<?php
/*
$link = mysql_connect("localhost", "root", "root") or die(mysql_error());
$db = mysql_select_db("soru", $link) or die (mysql_error());
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");

*/?>

<?php
$dsn = 'mysql:host=localhost;dbname=soru';
$username = 'root';
$password = 'root';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $db = new PDO($dsn, $username, $password, $options);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage()."\n";
}

?>