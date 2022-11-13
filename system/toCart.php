<?
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/system/db.php";

//$query = $db -> prepare("INSERT INTO `cart`(`user_id`,`product_id`,`count`) VALUES(1,$_POST['product_id'])");
//R::freeze(true);

$prepare = $db -> prepare("SELECT * FROM cart WHERE users_id = 1 AND product_id = $_POST[product_id]");
$prepare -> execute();
if($prepare -> rowCount()>0){
    $count = $prepare -> fetch()['count'];
    $count++;
    $db -> query("UPDATE cart SET `count` = $count WHERE users_id=1 AND product_id = $_POST[product_id]");
}
else{
    $cart = R::dispense('cart');
    $cart -> users_id = 1;
    $cart -> product_id = $_POST['product_id'];
    $cart -> count = 1;
    R::store($cart);
}
