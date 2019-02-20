<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<p>Merci de vous enregistrer</p>

<form method="post" action="#">
    
    <p> 
        <label for="pseudo" >pseudo</label><input type="text" id="pseudo" name="pseudo" value=""/>
    </p>
    <p>
        <label for="pass">Mot de passe</label><input type="text" id="pass" name="pass" value=""/>
    </p>
    <p>
        <label for="Vpass">Vérification du Mot de passe</label><input type="text" id="vpass" name="vpass" value=""/>
    </p>
    <p>
        <label for="mail">Mail</label><input type="mail" id="mail" name="mail" value=""/>
    </p>
    <p>
        <input type="submit" value="valider" id="register" name="register"/> 
    </p>
    
</form>