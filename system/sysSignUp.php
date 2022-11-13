<?
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/system/db.php";
function clearValue($value){
    $value = trim($value);
    $value = htmlspecialchars($value);
    return $value;
}

function hashPassword($password){
    $password = password_hash($password,PASSWORD_DEFAULT);
    return $password;

}


if(isset($_POST['signup'])){
    $query = $db -> prepare("INSERT INTO users(login,password,email) VALUES(:login,:password,:email)");
    $query ->execute([
        ":login"=>clearValue($_POST['login']),
        ":password"=>hashPassword($_POST['password']),
        ":email"=>clearValue($_POST['email'])
    ]);   

    $_SESSION['auth'] = $_POST['auth'];
    $_SESSION['login'] = $_POST['login'];
   // $_SESSION['login_id'] = 
    setcookie("login",$_POST['login'],time()+(3600*24*7));

    header("Location: /main");

}