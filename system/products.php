<?
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/system/db.php";

$query = $db -> query("SELECT * FROM goods WHERE status = 1");

$result = [];
foreach($query as $row){
    $result[] = [
        "id"=>$row['id'],
        "name"=>$row['name'],
        "price"=>$row['price'],
        "img"=>$row['img'],
        "cat_id"=>$row['cat_id']
    ];
}
echo json_encode($result);