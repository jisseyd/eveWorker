<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author imac
 */

namespace jissey\core\models;

class Log {
    private $sessionUser;
    
    private function getSessionUser(){
        if(isset($_SESSION['user'])){
            return $this->sessionUser = $_SESSION['user'];
        }
    }
            
    
    function logged(){
        if(!isset($_SESSION['user'])):
            ?>
            <a href="#modale">Login</a>
            <a href="index.php?p=register">Register</a>
            <?php
        else:
            
            $this->getSessionUser();
            ?>
            <form method="post" action="#">
                <p>  </p><input type="submit" name ="logout" id="logout" value="Logout"/>
            </form>
            <p><button><a href="index.php?p=gestion" a><i><?= $this->sessionUser?></i></a></button> est connecté .</p>
            <?php
            if($_SESSION['role'] == 'admin'):?>
                <button><a href="index.php?p=admin" a><i>Admin</i></a></button>
                <?php
            endif;
        endif;
    }
    
    function logout(){
        if(isset($_POST['logout'])){
            $_SESSION = "";
            session_destroy();
            header('Location : index.php?p=home');
        }
        
        if(!isset($_SESSION['user'])){
            $p='home';
//            session_destroy();
        }
    }
    
    function verifAdmin(){
        if(isset($_SESSION["user"])){
            echo "session presente";
            
        }else {
            echo 'session absente';
        }
    }
}
