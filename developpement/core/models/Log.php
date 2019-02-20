<?php // Version developpement

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of log
 *
 * @author imac
 */
class Log {
    private $sessionUser;
    
    private function getSessionUser(){
        if(isset($_SESSION['user'])){
            return $this->sessionUser = $_SESSION['user'];
        }
    }
    
    public function logged(){
        if(!isset($_SESSION['user'])):
            ?>
            <a href="#modale">Login</a>
            <a href="index.php?p=register">Register</a>
            <?php
        else:
            $this->getSessionUser();
            echo $_SESSION['user'];
            ?>
            <form method="post" action="#">>
                <input type="submit" name ="logout" id="logout" value="Logout"/>
            </form>
            <p><?= $this->sessionUser ?> est Connecté </p>
            <?php
            
            if($_SESSION[$this->sessionUser]['role'] == 'admin'){
                echo '<button><a href="index.php?p=admin" a><i>Admin</i></a></button>';
                
            }
            
            endif;        
    }
    
    
    function logout(){
        if(isset($_POST['logout'])){
            $_SESSION = "";
            session_destroy();
        }
        
        if(!isset($_SESSION['user'])||$_SESSION =""){
//            session_destroy();
            header('Locate : index.php?p=home');
        }
        
        if(isset($_SESSION['user'])){
            if(isset($_SESSION[$this->sessionUser]['role']) && $_SESSION[$this->sessionUser]['role']==('admin')){
                if(isset($_SESSION['pass'])&&$_SESSION['pass']!='truc' || !isset($_SESSION['pass'])){
                    header('Locate : index.php?p=home');
                }
            }
            
        }
    }
    
}
