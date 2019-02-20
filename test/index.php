<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

require 'User.php';
$user = new user();

if(isset($_POST['connection'])){
  echo'connection';
  if(isset($_POST['pseudo'])){
    $pass = $user->connect($_POST['pseudo']);
    echo $pass;
    }
}

if (isset($_POST['deco'])){
  if(isset($_SESSION)){
  echo'deco';
  session_destroy();
  }
}

if(isset($_SESSION)){
  var_dump($_SESSION);
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Eveworker</title>
  </head>
  <body>
    <header>
      
      <form method="post" action="#">
        <label for="pseudo">pseudo</label><input type="text" name="pseudo" id="pseudo" />
        <label for="pass">Mot de passe</label><input type="text" name="pass" id="pass"/>
        <input type="submit" id="connection" name="connection" value="connection"/>
        <input type="submit" id="deco" value="deco" name="deco" value="déconnection"/>
      </form>
      
      <div id="login"><?php ?></div>

    </header>
    
     
  </body>
</html>
