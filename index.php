<?php
session_start();


use jissey\core\models\Users;
use jissey\core\models\Users2;
use jissey\core\models\Log;
use jissey\core\Autoloader;
//use jissey\core\models\database;

require 'Core/Autoloader.php';

Autoloader::register();
     
$users = new Users();
$users2 = new Users2();
$login = new Log();

//au besoin deconnexion
$login->logout();
//$login->verifAdmin();

try{
    if(isset($_POST['connection'])){
        $users->connection();
    }
    if(isset($_SESSION['user'])){
        $users->connect($_SESSION['user']);
    }
    if(isset($_POST['register'])){
    $users->create();
}
    
} catch (Exception $e) {
    $message = $e->getMessage();
}

if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}

ob_start();

if($p == 'home'){
    $title = 'accueil';
    require 'view/pages/home.php';
}elseif ($p == 'register') {
    $title = 'enregistrement';
    require 'view/pages/register.php';
}elseif ($p == 'admin') {
    if(isset($_SESSION['user'])&& $_SESSION['role']== 'admin'){
        $title = 'administration';
        require 'view/pages/admin.php';
    }else{
        require 'view/pages/home.php';
    }
    
}elseif ($p=='gestion') { 
    if(isset($_SESSION['user'])){
        $title = 'gestion utilisateur';
        require 'view/pages/gestion.php';
    }else{
        require 'view/pages/home.php';
    }
    
}
else{
    $title = 'accueil';
    require 'view/pages/home.php';
}

$contents = ob_get_contents();
ob_end_clean();

require 'view/template.php';



//*****tests****************************//
//echo'</br>test : <pre>';
//var_dump($users->getPseudo('admin'));
//echo '</pre>';

//echo 'test <PRE>';
//$passtruc = $users->getListPseudo();
////echo 'admin???? : '.$passtruc;
//var_dump($passtruc);
//echo '</PRE>';

//if(isset($_SESSION['admin'])){
//    echo $_SESSION['admin']['role'];
//}else echo 'pas de role';

////
//if(isset($_SESSION)){
//    echo'Session : <PRE>';
//    var_dump( $_SESSION);
//    echo' fin de $_SESSION </pre>';
//}
//$login->logged();
//$idUser = $users2->getUser2Id('moi');
//var_dump($idUser);

//$test = $users2->getUserPseudo(3);
//var_dump($test);
//$test = $users2->getUserRole(3);
//var_dump($test);

//$class = $users->getClass();
//var_dump($class);
//**************************************//