<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace jissey\core\models;

/**
 * Description of Users2
 *
 * @author imac
 */
class Users2 extends elementsManager{
    
    public function getUser2Id($pseudo){
        $user2Id = $this->getdb()->query("SELECT id FROM user WHERE pseudo='$pseudo'");
        return $user2Id;
    }
    
    private function getLigneUser($id){
        $ligneUser = $this->getdb()->query("SELECT * FROM user WHERE id = '$id'");
        return $ligneUser;
    }
    
    public function getUserPseudo($id){
        return $this->getLigneUser($id)->pseudo;
    }
    
    public function getUserRole($id){
        return $this->getLigneUser($id)->role;
    }
    
      public function getId($name){
      $id = $this->getdb()->query("SELECT id, name FROM {$name} WHERE name ='$name'");
      if($id){
          return $id->id;
      }
      
//      public function getIdBySession($name,$pass){
//          if(isset($_SESSION['suser'])&& )
//          
//      }
  }
    
}
