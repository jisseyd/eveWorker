<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$users->modif();

?>

<h2>Gestion des Utilisateur : </h2>

<article>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>pseudo</th>
                <th>corporation</th>
                <th>pass</th>
                <th>role</th>
            </tr>
        </thead>
        <tbody>
            <?php
//            var_dump($users->getListPseudo());
            foreach ($lists = $users->getListPseudo()as $p):
                ?>
            <tr>
                <!--<td></td>-->
                <td><?= $users->getId($p->pseudo) ?></td>
                <td><?= $p->pseudo?></td>
                <td><?= $users->getCorpo($p->pseudo) ?></td>
                <td><?= $users->getPass($p->pseudo) ?></td>
                <td><?= $users->getRole($p->pseudo) ?></td>
                <form name="gestionUser" method="post" action="#modale2">
                    <td><input type="submit" value="suppression" name="sup"></td>
                    <td><input type="submit" value="modification" name="modif"></td>
                    <input type="hidden" value="<?=$p->pseudo?>" name="lignePseudo">
                    <input type="hidden" value="<?= $users->getCorpo($p->pseudo) ?>" name="ligneCorpo">
                    <input type="hidden" value="<?= $users->getPass($p->pseudo) ?>" name="lignePass">
                    <input type="hidden" value="<?= $users->getRole($p->pseudo) ?>" name="ligneRole">
                    <input type="hidden" value="<?= $users->getId($p->pseudo) ?>" name="ligneId">
                </form>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    
                <?php $users->modif(); ?>
    

</article>