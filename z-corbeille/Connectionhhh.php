<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if(isset($_POST['connection'])){
  if(isset($_POST['pseudo'])){
      $pseudo = $_POST['pseudo'];
    $pass = $user->connect($pseudo);
    header('Location : ../index.php');
    }
}