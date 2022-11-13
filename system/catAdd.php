<?
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/system/db.php";

$db -> query("INSERT INTO category(name,status) VALUES('$_GET[catName]',1)");


$query = $db -> query("SELECT MAX(id) FROM category");
echo $query -> fetch()[0];