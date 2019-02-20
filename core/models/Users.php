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
//
namespace jissey\core\models;
use \PDO;
use Exception;

class Users extends elementsManager{
  private $userId;
  private $userPass;
  private $userPseudo;
  private $userRole;
  
//  protected $db;
  
  
  
  private function userId(){
    return $this->userId;    
  }
  
  private function userPass(){
    return $this->userPass;
  }
  
  private function userPseudo(){
    return $this->userPseudo;
  }
  
//  private function getdb(){
//      return $this->db = new database('eve');
//  }
  public function getId($name){
      $id = $this->getdb()->query("SELECT id, pseudo FROM user WHERE pseudo ='$name'");
      if($id){
          return $id->id;
      }
  }
  public function getPseudo($name){
      $pseudo = $this->getdb()->query("SELECT pseudo FROM user WHERE pseudo ='$name'");
      if($pseudo){
          return $pseudo->pseudo;
      }
  }
    
  PUBLIC function getListPseudo(){
      $datas = $this->getdb()->query("SELECT pseudo FROM user ", null, true);
      return $datas;
  }
  
  public function getPass($pseudo){        
        $pass = $this->getdb()->query("SELECT pass FROM user WHERE pseudo ='$pseudo'");
        if($pass){
            return $pass->pass;
        }       
  }
  
  public function getRole($pseudo){
        
        $datas = $this->getdb()->query("SELECT role FROM user WHERE pseudo ='$pseudo'");
        if($pseudo){
            return $datas->role;
        }               
  }
  
  public function getMail($pseudo){
        
        $datas = $this->getdb()->query("SELECT mail FROM user WHERE pseudo ='$pseudo'");
        if($pseudo){
            return $datas->mail;
        }               
  }
  
  
  public function getCorpo($pseudo){
        
        $datas = $this->getdb()->query("SELECT corpo FROM user WHERE pseudo ='$pseudo'");
        if($pseudo){
            return $datas->corpo;
        }       
  }


  public function connect($pseudo){
    if(isset($_POST['pass']) || $_SESSION['pass']){
        if(isset($_SESSION['pass'])){$pass=$_SESSION['pass'];}
        if(isset($_POST['pass'])){$pass=$_POST['pass'];}
        if($pass != ''){
            if($pass == $this->getPass($pseudo)){
                $_SESSION['user']=$pseudo;
                $_SESSION['role'] = $this->getRole($pseudo);
                $_SESSION['pass'] = $pass;
                $_SESSION['id'] = $this->getId($pseudo);
                $_SESSION['mail'] = $this->getMail($pseudo);
            }else  {
                throw new Exception('!! mauvais mot de pass');
        }
        
      }else  throw new Exception('Pas de mot de passe');
    }
    else  throw new Exception('Pas encore de mot de passe');
  }
  
  public function login($pseudo){
    if($this->login($pseudo)){
      return 'vous êtes connecté en tant que '.$pseudo;
    }
  }
  
  public function connection(){
      if(isset($_POST['pseudo'])){
          $pseudo = $_POST['pseudo'];
          if($pseudo!=''){
//              $listpseudo[]= $this->getListPseudo();
              if($pseudo == $this->getPseudo($pseudo)){
                  $this->connect($pseudo);
              }
              else throw new Exception ('pseudo incorrect ou inexistant');
          }else throw new Exception('Vous devez indiquer un pseudo');
      }else  throw new Exception('pas de pseudo');
  }
  
  public function create(){
        
        if(isset($_POST['pseudo'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $pattern='#[0-9A-Za-z]{3,20}#';
            if(preg_match($pattern, $pseudo)){
                if($this->getPseudo($pseudo)){
                    throw new Exception('ce pseudo est déjà pris veuillez en prendre un autre');
                }else{
                    if(isset($_POST['pass']) && $_POST['pass'] !=''){
                        $pass= htmlspecialchars($_POST['pass']);
                        if(isset($_POST['vpass'])){
                            $vpass = htmlspecialchars($_POST['vpass']);
                            if($pass == $vpass){
                                if(isset($_POST['mail'])){
                                    if(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
                                        $mail = $_POST['mail'];
                                        $this->getdb()->prepare('INSERT into user (pseudo, pass, mail) VALUES (:pseudo, :pass, :mail)',[':pseudo'=>$pseudo, ':pass'=>$pass, ':mail'=>$mail]);
                                        header('Location: index.php?p=home&message=enregistré');
                                    }else{
                                        throw new Exception('Vous devez entrer une adresse mail valide');
                                    }                                    
                                }else{
                                    throw new Exception('Vous devez entrer une adresse mail');
                                }
                                
                            }else{
                                throw new Exception('les mot de passe ne coincident pas');
                            }
                        }else{
                            throw new Exception('pas de verification');
                        }
                    }else{
                        throw new Exception('Vous devez indiquer un mot de passe valide');
                    }
                }
            }else{
                throw new Exception('le mot de passe doit comporter de 3 à 20 caractères non accentués de l\'alphabet latin et/ ou des chiffres');
            }
        }else{
            echo 'vous devez indiquer un pseudo';
        }
        
    }
    
    public function modif(){
        if(isset($_POST['modif'])):
            ?>
            <section id ="modale2">
                <div class="popup">
                    <a class="close" href="#noWhere2">X</a>
                    <h3>Vous pouvez modifier les valeurs ! </h3>
                    <form action="#" method="post">
                        <input type="text" value="<?= $_POST['lignePseudo'] ?>" name="lignePseudo">
                        <input type="text" value="<?= $_POST['ligneCorpo'] ?>"name="ligneCorpo">
                        <input type="text" value="<?= $_POST['lignePass'] ?>" name="LignePass">
                        <input type="text" value="<?= $_POST['ligneRole'] ?>" name="ligneRole">
                        <input type="mail" value="<?= $_POST['ligneMail'] ?>" name="ligneMail">
                        <input type="hidden" value="<?= $_POST['ligneId'] ?>" name="ligneId">
                        
                        <input type="submit" value="Modifier?" name="modifier"/>
                    </form>
                </div>
            </section>
        <?php
        endif;
        
        if(isset($_POST['modifier'])){
            $pseudo = htmlspecialchars($_POST['lignePseudo']);
            $corpo = htmlspecialchars($_POST['ligneCorpo']);
            $pass = htmlspecialchars($_POST['lignePass']);
            $role = htmlspecialchars($_POST['ligneRole']);
            if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                $mail=$_POST['mail'];
            }else{
                throw new Exception('vous devez indiquer une adresse mail valide');
            }
            $id = htmlspecialchars($_POST['ligneId']);
            $this->getdb()->prepare('UPDATE user SET pseudo = :pseudo, pass=:pass, mail = :mail WHERE id = :id ', [':pseudo'=>$pseudo,':pass'=>$pass, ':id'=>$id]);
            $_SESSION['user']= $pseudo;
            $_SESSION['role']=$role;
            $_SESSION['pass']=$pass;            
            $_SESSION['mail']=$mail;
        }
        
        if(isset($_POST['sup'])):
            ?>
            ok on supprime

            <?php
                    endif;
    }
    
    public function gestion(){
        if(isset($_POST['gestion'])):
            ?>
            <section id ="modale3">
                <div class="popup">
                    <a class="close" href="#noWhere3">X</a>
                    <h3>Vous pouvez modifier les valeurs ! </h3>
                    <form action="#" method="post">
                        <input type="text" value="<?= $_SESSION['user'] ?>" name="lignePseudo">
                        <input type="text" value="<?= $_SESSION['pass']?>" name="LignePass">
                        <input type="mail" value="<?= $_SESSION['mail']?>" name="LigneMail">
                        <input type="hidden" value="<?= $_SESSION['id'] ?>" name="ligneId">
                        
                        <input type="submit" value="Modifier?" name="gest"/>
                    </form>
                </div>
            </section>
        <?php
        endif;
        
        if(isset($_POST['gest'])){
            $pseudo = htmlspecialchars($_POST['lignePseudo']);
            $pass = htmlspecialchars($_POST['LignePass']);
            if(filter_var($_POST['LigneMail'], FILTER_VALIDATE_EMAIL)){
                $mail=$_POST['LigneMail'];
            }else{
                throw new Exception('vous devez indiquer une adresse mail valide');
            }
            $id = htmlspecialchars($_POST['ligneId']);
            $this->getdb()->prepare('UPDATE user SET pseudo = :pseudo, pass = :pass, mail=:mail WHERE id = :id ', [':pseudo'=>$pseudo, ':pass'=>$pass, 'mail'=>$mail, ':id'=>$id]);
            $_SESSION['user']= $pseudo;
            $_SESSION['pass']= $pass;
            $_SESSION['mail']= $mail;
            header('Location : index.php');
            
        }
        
        if(isset($_POST['sup'])):
            ?>
            ok on supprime

            <?php
                    endif;
    }
}

