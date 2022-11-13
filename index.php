<?
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/system/db.php";
//session_start();

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
if(@$_SERVER['REDIRECT_URL']=="" or @$_SERVER['REDIRECT_URL']=="/main"):
     require_once "$path/public/main.php";

elseif($_SERVER['REDIRECT_URL']=="/login"):
       require_once "$path/public/login.php";

elseif($_SERVER['REDIRECT_URL']=="/signup"):
      require_once "$path/public/signup.php";

elseif($_SERVER['REDIRECT_URL']=="/search"):
     require_once "$path/public/search.php";

elseif($_SERVER['REDIRECT_URL']=="/cart"):
     require_once "$path/public/cart.php";

elseif($_SERVER['REDIRECT_URL']=="/admin"):
     require_once "$path/public/admin.php";

elseif($_SERVER['REDIRECT_URL']=="/getsubcat"):
     $query = $db -> query("SELECT * FROM subcategory WHERE cat_id = {$_GET['id']}");
     echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));

else:
     require_once "$path/public/404.php";
endif;

