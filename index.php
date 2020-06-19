<?php
$regexName = '^[\p{L}]{1}[\' \-\p{L}]+$^';
$formErrors = array();
if(count($_POST)>0){
    if(!empty($_POST['civility'])) {
        if($_POST['civility'] == 'Monsieur' || $_POST['civility'] == 'Madame') {
            $civility = $_POST['civility'];
        }else{
            $formErrors['civility'] = 'Votre civilité est mal choisie';
        }
    }else{
        $formErrors['civility'] = 'Votre civilité n\'est pas renseignée';
    }

    if(!empty($_POST['lastName'])) {
        if(preg_match($regexName, $_POST['lastName'])) {
            $lastName = $_POST['lastName'];
        }else{
            $formErrors['lastName'] = 'Votre nom de famille n\'est pas valide';
        }
    }else{
        $formErrors['lastName'] = 'Votre nom de famille n\'est pas renseigné';
    }

    if(!empty($_POST['firstName'])) {
        if(preg_match($regexName, $_POST['firstName'])) {
            $firstName = $_POST['firstName'];
        }else{
            $formErrors['firstName'] = 'Votre prénom n\'est pas valide';
        }
    }else{
        $formErrors['firstName'] = 'Votre prénom n\'est pas renseigné';
    }
}
?> 
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <title>php partie7 exo5</title>
</head>
<body>
<!--Création du formulaire-->
    <form method="POST" action="index.php">
        <label for="civility">Civilité</label>
        <select id="civility" name="civility">
            <option disabled selected>Sélectionner</option>
            <option <?= isset($_POST['civility']) && $_POST['civility'] == 'Monsieur' ? 'selected' : '' ?> value="Monsieur">Mr</option>
            <option <?= isset($_POST['civility']) && $_POST['civility'] == 'Madame' ? 'selected' : '' ?> value="Madame">Mme</option>
        </select>
        <?php if(isset($formErrors['civility'])) { ?>
        <p><?= $formErrors['civility'] ?></p>
        <?php } ?>
        <!-- On vérifie qu'on envoie le nom de famille. Si c'est le cas on l'affiche dans le champ-->
        <p><label for="lastName">Votre nom : </label><input type="text" id="lastName" name="lastName" <?= isset($_POST['lastName']) ? 'value="' . $_POST['lastName'] . '"' : '' ?> /></p>
        <?php if(isset($formErrors['lastName'])) { ?>
        <p><?= $formErrors['lastName'] ?></p>
        <?php } ?>
        <p><label for="firstName">Votre prénom : </label><input type="text" id="firstName" name="firstName" <?=isset($_POST['firstName']) ? 'value="' . $_POST['firstName'] . '"' : '' ?> /></p>
        <?php if(isset($formErrors['firstName'])) { ?>
        <p><?= $formErrors['firstName'] ?></p>
        <?php } ?>
        <input type="submit" value="Envoyer" />

    </form>
</body>
</html>