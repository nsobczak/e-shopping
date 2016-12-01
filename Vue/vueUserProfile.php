<body>

<?php
if (!empty($code)) {
    if ($code == UserProfile::PASSWORD_UPDATE_SUCCESS) {
        ?><h3>Mot de passe modifié avec succès</h3><?php
    }
    if ($code == UserProfile::PASSWORD_UPDATE_BAD_OLD_PASSWORD) {
        ?><h3>Erreur: Vérifiez votre mot de passe actuel</h3><?php
    }
    if ($code == UserProfile::PASSWORD_UPDATE_FORM_INVALID) {
        ?><h3>Erreur: Le formulaire est incomplet</h3><?php
    }
    if ($code == UserProfile::PASSWORD_UPDATE_USER_ERROR) {
        ?><h3>Erreur lors du changement du mot de passe. Veuillez reesayer.</h3><?php
    }
}
?>

<table width="95%" style="line-height: 24px;" border="10">
    <tr>    <!-- table row -->
        <td><img class="display" width=10%
                 src=<?= $listUserProfile['chemin'] ?> alt="user_picture" title="user_picture"/>
        </td>    <!-- table data -->
        <td>
            <?php
            if (!empty($message)) {
                echo '<p>', "\n";
                echo "\t\t<strong>", htmlspecialchars($message), "</strong>\n";
                echo "\t</p>\n\n";
            }
            ?>
            <form enctype="multipart/form-data" action="?action=userProfile"
                  method="post">
                <fieldset>
                    <legend>Change profile picture</legend>
                    <p>
                        <label for="fichier_a_uploader" title="Choose a picture">Change in 2 steps:</label>
                        <!--                        <input type="hidden" name="MAX_FILE_SIZE" value="-->
                        <?php //echo MAX_SIZE; ?><!--"/>-->
                        <input type="file" name="fichier" id="fichier_a_uploader"/>
                        <input type="submit" name="submit" value="Update picture"/>
                    </p>
                </fieldset>
            </form>
        </td>
    </tr>
    <tr>
        <td> User ID :</td>
        <td><?= $listUserProfile['userID'] ?></td>
    </tr>
    <tr>
        <td> Nom :</td>
        <td><?= $listUserProfile['nom'] ?></td>
    </tr>
    <tr>
        <td> Prénom :</td>
        <td><?= $listUserProfile['prenom'] ?></td>
    </tr>
    <tr>
        <td> Niveau d'accreditation :</td>
        <td><?= $listUserProfile['niveau_accreditation'] ?></td>
    </tr>
    <tr>
        <td> Mail :</td>
        <td><?= $listUserProfile['mail'] ?></td>
    </tr>
    <tr>
        <td> Change password :</td>
        <td>
            <form enctype="multipart/form-data" action="?action=userProfile" method="post">
                <fieldset>
                    <legend>Change password</legend>
                    <p>
                        <label for="new_password" title="Choose a new password">New password :</label>
                        <input type="password" name="new_password" id="new_password"/><br>
                        <label for="old_password" title="Current password">Current password :</label>
                        <input type="password" name="old_password" id="old_password"/><br>
                        <input type="submit" name="submit_password" value="Update password"/>
                    </p>
                </fieldset>
            </form>
        </td>
    </tr>

</table>

</body>