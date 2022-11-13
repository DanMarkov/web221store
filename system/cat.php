<?
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/system/db.php";
$query = $db -> query("SELECT * FROM category WHERE status = 1");
// echo "<pre>";
//echo json_encode( print_r($query->fetchAll(PDO::FETCH_ASSOC),true));
// echo "</pre>";
$result = [];
foreach($query as $row){
    $result[] = ["id"=>$row['id'],"name"=>$row['name']];
}
echo json_encode($result);