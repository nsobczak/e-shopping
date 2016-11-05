<?php //$titre = "User profile id : " . $userID; ?>

<body>

<p>
<table width="95%" style="line-height: 24px;" border="10">
    <tr>    <!-- table row -->
        <td colspan="6"><img class="display" width=10% src="Images/Profil/profil_utilisateur.jpg" alt="user_picture"
                             title="user_picture"/></td>    <!-- table data -->
    </tr>
    <tr>
        <td> user ID :<td/>
        <td><?= $userID ?><td/>
    </tr>
    <tr>
        <td> nom :<td/>
        <td><?= $nom ?><td/>
    </tr>
    <tr>
        <td> prénom :<td/>
        <td><?= $prenom ?>
        <td/>
    </tr>
    <tr>
        <td> niveau_accreditation :<td/>
        <td><?= $niveau_accreditation ?><td/>
    </tr>
    <tr>
        <td> mail :<td/>
        <td><?= $mail ?></td>
    </tr>
    <tr>
        <td> sha1 du mot de passe :<td/>
        <td><?= $mot_de_passe ?></td>
    </tr>
</table>
</p>

</body>