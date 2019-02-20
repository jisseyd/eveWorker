<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Sin Akiga">
        <meta name="description" content="Eveworker">

        <!-- Mobile Stuff -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="msapplication-tap-highlight" content="no">

        <!-- Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="CHANGE-ME">
        <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon.png">

        <!-- Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="CHANGE-ME">
        <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">

        <!-- Windows 8 -->
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">


        <meta name="theme-color" content="#000000">

        <link rel="shortcut icon" href="favicon.ico">
        <link href="../public/css/style.css" type="text/css" rel="stylesheet" />
        <title>eveworker | <?= $title ?></title>
    </head>
    <body>
        <nav>
            <h1><a href="index.php?p=home">Eveworker</a></h1>
            <p>Version de developpement</p>
            <section class="connect">
                <?php
                // si il y a une $_Session['user'] alors j'affiche un bouton deconection, sinon j'affiche register et login
                $login -> logged();
                ?>
            </section>
        </nav>
        <section>
            <?= $contents ?>            
        </section>
    </body>
</html>
