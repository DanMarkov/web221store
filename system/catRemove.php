<?
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/system/db.php";

$db -> query("DELETE FROM category WHERE id=$_GET[catid]");
var_dump($_GET);