<?php
//$titre = "User profile id : " . $userID;
?>

<body>

<table width="95%" style="line-height: 24px;" border="10">
    <tr>    <!-- table row -->
        <td colspan="2"><img class="display" width=10%
                             src=<?= $chemin ?> alt="user_picture" title="user_picture"/>
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
        <td> user ID :
        <td/>
        <td><?= $userID ?>
        <td/>
    </tr>
    <tr>
        <td> nom :
        <td/>
        <td><?= $nom ?>
        <td/>
    </tr>
    <tr>
        <td> prénom :
        <td/>
        <td><?= $prenom ?>
        <td/>
    </tr>
    <tr>
        <td> niveau_accreditation :
        <td/>
        <td><?= $niveau_accreditation ?>
        <td/>
    </tr>
    <tr>
        <td> mail :
        <td/>
        <td><?= $mail ?></td>
    </tr>

</table>

</body>