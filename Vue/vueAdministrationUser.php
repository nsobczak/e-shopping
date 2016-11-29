<!-- /**
 * Created by PhpStorm.
 * User: Romain Vanmarcke & Vivien Valencourt
 * Date: 04/11/2016
 */
//________________________________________________________________________________________ -->

<div class="admin">
    Bonjour admin, bienvenue sur la page Admin User ! <br>
    <?php if (count($listUsers) >= 1) { ?>
        <h3> Users List : </h3>
        <table>
            <th>Supprimer</th>
            <th>image</th>
            <th>userID</th>
            <th>nom</th>
            <th>prenom</th>
            <th>niveau_accreditation</th>
            <th>mail</th>
            <!-- <th>mot_de_passe</th> -->
            <?php foreach ($listUsers as $user) { ?>
                <tr>
                    <!-- <td><button>X</button></td> -->
                    <td><a href="?action=adminUser&do=deleteUser&userID=<?php echo $user['userID']; ?>"
                           title="Supprimer">[X]</a></td>
                    <td><?php echo '<img height="30px" src="./' . $user["chemin"] . '">'; ?></td>
                    <td><?php echo $user["userID"]; ?></td>
                    <td><?php echo $user["nom"]; ?></td>
                    <td><?php echo $user["prenom"]; ?></td>
                    <td>
                        <select onchange="changeAccreditation(value, <?php echo $user['userID']; ?>);" id="selectacc">
                            <?php if ($user["niveau_accreditation"] == 1) { ?>
                                <option name="choix1" value="1" selected="selected">Admin</option>
                                <option name="choix2" value="2">User</option>
                            <?php } ?>
                            <?php if ($user["niveau_accreditation"] == 2) { ?>
                                <option name="choix1" value="1">Admin</option>
                                <option name="choix2" value="2" selected="selected">User</option>
                            <?php } ?>
                        </select>
                        <?php echo $user["niveau_accreditation"]; ?>
                    </td>
                    <td><?php echo $user["mail"]; ?></td>
                    <!-- <td><?php echo $user["mot_de_passe"]; ?></td> -->
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</div>

