<?php
// On ajoute la ligne session_start() en début de page pour récupérer nos variables de session
session_start();
// On vérifie si l'utilisateur possède bien une session, on annule le chargement de la page le cas échéant
// Si $_SESSION['pseudo'] n'est pas définie OU si $_SESSION['email'] n'est pas définie
if (!isset($_SESSION['pseudo']) or !isset($_SESSION['email'])) {
    echo "Vous n'êtes pas connecté";
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil</title>
</head>

<body>
    <!-- On affiche maintenant nos variables dans notre page, 
    attention à penser à ajouter uploads en début de img src -->
    <img src="uploads/<?= $_SESSION["img"] ?>" alt="Photo de profil de <?= $_SESSION["pseudo"] ?>">
    <h1><?= $_SESSION["pseudo"] ?></h1>
    <h2><?= $_SESSION["email"] ?></h2>
</body>

</html>