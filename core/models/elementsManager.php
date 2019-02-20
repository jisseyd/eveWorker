<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace jissey\core\models;

/**
 * Description of elementsManager
 *
 * @author imac
 */
class elementsManager {
    
    protected $db;
    protected function getdb(){
      return $this->db = new database('eve');
  }
    
     public function create(){
        
        if(isset($_POST['pseudo'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $pattern='#[0-9A-Za-z]{3,20}#';
            if(preg_match($pattern, $pseudo)){
                
                echo 'ca passe';
            }else{
                echo 'le mot de passe doit doit comporter de 3 à 20 caractères non accentués de l\'alphabet latin et/ ou des chiffres';
            }
        }
        
    }
    
    public function getClass(){
        return get_class($this);
    }
    
            
    
}
