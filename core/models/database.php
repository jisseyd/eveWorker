<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace jissey\core\models;
use \PDO;

/**
 * Description of database
 *
 * @author imac
 */
class database {
    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPass;
    private $pdo;


    public function __construct( $dbhost='localhost', $dbName='eve', $dbUser = 'root',$dbPass = 'root') {
        $this->dbHost = $dbhost;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
    }
  
  private function getPDO(){
    
    //si PDO n'est pas défini (si il n'y a pas encore eu de connection à la bdd), on le défini
    if($this->pdo === null){

      $pdo = new \PDO('mysql:dbname=eve;host=localhost','root', 'root');
      $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo =$pdo;
    }
    //si il n'est pas null c'est qu'il est déjà défini, donc on le renvoie
    return $this->pdo;
  } 
  
  public function query($statement, $class_name = null, $one=false){
      /**
       * $one true pour une ligne, false pour plusieurs
       */
      $req= $this->getPDO()->query($statement);
      
      if(strpos($statement, 'UPDATE')===0 || strpos($statement, 'INSERT')===0 || strpos($statement, 'DELETE')===0 ){
        return $req;
    }
    
    if($class_name === NULL){
        $req->setFetchMode(PDO::FETCH_OBJ);
    }
    else{
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }
      
      if($one){
          $datas = $req->fetchAll(PDO::FETCH_OBJ); 
          return $datas; 
      }else{
        $datas = $req->fetch(PDO::FETCH_OBJ);
        return $datas;       
      }
  }
  
  public function prepare($statement, $attribute, $class_name = null, $one = false){
      $req = $this->getPDO()->prepare($statement);
      $res = $req->execute($attribute);
    
    if(strpos($statement, 'UPDATE')===0 || strpos($statement, 'INSERT')===0 || strpos($statement, 'DELETE')===0 ){
        return $res;
    }
      
      if($class_name === NULL){
        $req->setFetchMode(PDO::FETCH_OBJ);
    }
    else{
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }
    
    if($one){
          $datas = $req->fetchAll(PDO::FETCH_OBJ); 
          return $datas; 
      }else{
        $datas = $req->fetch(PDO::FETCH_OBJ);
        return $datas;       
      }
      
  }
  
  
  public function query2($statement, $class_name = null, $one = false){//le fetcAll avec fetch_Class permet de changer de table, il faut donc preciser la table utilisée
    
    $req = $this->getPDO()->query($statement);
    
    if(strpos($statement, 'UPDATE')===0 || strpos($statement, 'INSERT')===0 || strpos($statement, 'DELETE')===0 ){
        return $req;
    }
    
    if($class_name === NULL){
        $req->setFetchMode(PDO::FETCH_OBJ);
    }
    else{
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }  
    
    if($one){
      $datas =$req->fetch();
    }else{
      $datas = $req->fetchAll();
    }
    return $datas;
  }
  
  public function prepare2($statement, $attributes, $class_name = null, $one = false){
    $req = $this->getPDO()->prepare($statement);
    $res = $req->execute($attributes);
    
    if(strpos($statement, 'UPDATE')===0 || strpos($statement, 'INSERT')===0 || strpos($statement, 'DELETE')===0 ){
        return $res;
    }
     
    if($class_name === NULL){
        $req->setFetchMode(PDO::FETCH_OBJ);
    }
    else{
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }
    
    if($one){
      $datas =$req->fetch();
    }else{
      $datas = $req->fetchAll();
    }
    
    return $datas;
  }
  
  public function test(){
      echo 'tessst ok';
  }
    
}
