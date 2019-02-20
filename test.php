<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$bdd = new PDO('mysql:dbname=eve;host=localhost','root', 'root');
$bdd-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $bdd->query('SELECt pseudo FROM user');
$res = $req->fetchAll(PDO::FETCH_OBJ);
echo 'pseudo from user <pre>';
var_dump($res);
echo '</pre>';

$tab[]=$res;
echo '<pre>';
var_dump($tab);
echo '</pre>';

echo '<H1>Pass</H1></br>';
$passs = $bdd->query("SELECT pass FROM user where pseudo = 'admin'");
$pass = $passs->fetch(PDO::FETCH_OBJ);
$pass2= $pass->pass;

echo '<pre>';
var_dump($pass->pass);
echo '</pre>';

echo 'pass??? : '.$pass2;