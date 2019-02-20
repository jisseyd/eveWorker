<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

                <?php $users->gestion(); ?>



<article>
    <h2>Gestion de votre personnage</h2>    
    <table border="1">
        <thead>
            <tr>
                <th>pseudo</th>
                <th>pass</th>
                <th>mail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!--<td></td>-->
                <td><?= $_SESSION['user']?></td>
                <td><?= $_SESSION['pass'] ?></td>
                <td><?= $_SESSION['mail'] ?></td>
                <form name="gestionUser" method="post" action="#modale3">
                    <input type="hidden" value="<?=$_SESSION['user']?>" name="lignePseudo">
                    <input type="hidden" value="<?=$_SESSION['pass'] ?>" name="lignePass">
                    <input type="hidden" value="<?=$_SESSION['mail'] ?>" name="ligneMail">
                    <input type="hidden" value="<?=$_SESSION['id'] ?>" name="ligneId">
                    <td><input type="submit" value="modifier" name="gestion"></td>
                </form>
            </tr
        </tbody>
    </table>
    
    

</article>