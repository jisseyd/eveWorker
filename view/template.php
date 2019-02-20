<?php


?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>eveWorker | <?= $title ?></title>
        <link rel="stylesheet" type="text/css" href="public/css/style.css"
        
    </head>
    <body>
        <nav>
            <h1><a href="index.php?p=home">Eveworker</a></h1>
            <section class="connect">
                <?php
                // si il y a une $_Session['user'] alors j'affiche un bouton deconection, sinon j'affiche register et login
                $login -> logged();
                ?>
            </section>
        </nav>
        
        <section id="modale">
            <div class="popup">
                <a class="close" href="#noWhere">X</a>
                <form method="post" action="index.php">
                    <input name="pseudo" id="pseudo" type="text" placeholder="Ppseudo" />
                    <input name="pass" id="pass" type="text" placeholder="Mot de passe" /></br>
        <input type="submit" id="connection" name="connection" value="Connection"/>
        <!--<input type="submit" id="deco" name="deco" value="Déconnection"/>-->
                </form>
            </div>            
        </section >
        
        <section id="message" <?php if(isset($message)):?> class="error" <?php elseif(isset($_GET['message'])):?> class="valid" <?php endif;?> >
            <?php
            if(isset($message)){
                echo 'Erreur : '.$message;
            }
            if(isset($_GET['message'])){
                echo $_GET['message'];
            }
            
            ?>
        </section>
        <section id="contenu">
           
        <?= $contents?>
            
        </section>
        
    </body>
</html>
