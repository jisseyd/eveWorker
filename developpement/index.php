<?php // Version developpement

 session_start();
// $_SESSION = '';
// session_destroy();
 $_SESSION['user']='admin';
 $_SESSION["admin"]['role'] ='admin';
// $_SESSION["admin"]['pass'] ='pass';

require 'core/models/Log.php';

$login = new Log();
$login->logout();


if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}

echo '$p : <pre>';
var_dump($p);
echo '</pre>';
echo '<pre>';
echo 'session : ';
var_dump($_SESSION);

echo '</pre>';

ob_start();

if($p == 'home'){
    $title = 'Accueil';
    require 'view/pages/home.php';
}elseIf($p=='admin'){
    $title = 'administration';
    require 'view/pages/admin.php';
}

$contents = ob_get_contents();
ob_end_clean();
require'view/pages/templates/template.php';