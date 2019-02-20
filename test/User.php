<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author deturck
 */
class User {
  private $userId;
  private $userPass;
  
  private function userId(){
    return $this->userId;    
  }
  
  private function userPass(){
    return $this->userPass;
  }
  
  private function getPass($pseudo){
    if($pseudo){
      $pdo = new PDO('mysql:dbname=eve;host=localhost','root', 'root');
      $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $req = $pdo->query("SELECT pass FROM user WHERE pseudo ='$pseudo'");
      $res = $req->fetch();
      return $res['pass'];
    }
  }
  
  public function connect($pseudo){
    if($this->getPass($pseudo)){
      if($_POST['pass']){
        if($_POST['pass'] == $this->getPass($pseudo)){
          $_SESSION['user']=$pseudo;
          return 'connecté';
        }else return 'mauvais mot de pass';
      }else return 'vous devez indiquer un mot de passe';
    }else return 'mauvais pseudo ou pseudo inexistant';
  }
  
  public function login($pseudo){
    if($this->login($pseudo)){
      return 'vous êtes connecté en tant que '.$pseudo;
    }
  }
}

?>
