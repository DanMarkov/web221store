<?
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/system/db.php";
if(isset($_POST['signup'])):

    function clearValue($value){
        $value = trim($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    $prepare = $db -> prepare("SELECT * FROM users WHERE login = :login ");
    $prepare ->execute([
        ":login"=>clearValue($_POST['login'])
    ]);

    if($prepare->rowCount() > 0){
        $password = $prepare->fetch()['password'];
    
        if(password_verify($_POST['password'],$password)){
            $_SESSION['auth'] = $_POST['auth'];
            $_SESSION['login'] = $_POST['login'];
            setcookie("login",$_POST['login'],time()+(3600*24*7));

            header("Location: /main");
        }
    
    }
endif;
    



