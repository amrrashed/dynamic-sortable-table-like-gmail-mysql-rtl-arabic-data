<?Php
//$dbhost_name = "localhost";
//$database = "bookstores";
$username = "root";
$password = "";

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;dbname=bookstores;charset=utf8', $username, $password);

$dbo -> exec("set character_set_server utf8");
$dbo -> exec("SET NAMES utf8");

} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

?> 