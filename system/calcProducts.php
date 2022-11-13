<?
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/system/db.php";
$query = $db -> query("SELECT * FROM cart WHERE product_id = '$_POST[product_id]'");

if($_POST['action']==1){
    $set = "count = count + 1";
    
}
else{
    if($query -> fetch()['count'] == 1){
        exit;
    }
    $set = "count = count - 1";
}

try{
    $db -> query("UPDATE cart SET $set WHERE product_id = $_POST[product_id]");
    echo "true";    
}
catch(Exception $e){
    echo "false";
}
