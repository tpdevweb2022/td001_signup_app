<?php

// On stocke les informations dans nos variables
$pseudo = htmlspecialchars($_POST['pseudo']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$pass = htmlspecialchars($_POST['pass']);
$confirm_pass = htmlspecialchars($_POST['confirm_pass']);

// On pense également à stocker notre fichier dans une variable $file
$file = $_FILES["avatar"];

// Si le formulaire a bien été envoyé en méthode POST ET depuis le bouton de soumission
if ($_SERVER["REQUEST_METHOD"] === "POST" and isset($_POST["submit_form"])) {

    // On gère la longueur du pseudo
    if (strlen($pseudo) < 5) {
        echo "Le pseudo n'est pas assez long";
        die;
    }

    // L'email fourni doit être valide, nous avions effectué une vérification du format email
    // lors de la vérification des variables, nous pouvons donc écrire
    // SI $email est strictement égal à FALSE, alors mauvais email
    if ($email === FALSE) {
        echo "Ceci n'est pas un email valide";
        die;
    }
    // Les mots de passe doivent correspondre
    if ($pass !== $confirm_pass) {
        echo "Les mots de passe ne correspondent pas";
        die;
    }

    // L'image doit être au format jpg, png, ou gif, nous constituons alors un array
    $authorizedExtensions = ["jpg", "jpeg", "png", "gif"];
    // Nous faisons un explode de notre fichier pour délimiter des valeurs via le séparateur "."
    $fileParams = explode(".", $file["name"]);
    // Nous récupérons l'extension en reprenant la dernière valeur du tableau $fileParams généré
    $extension = strtolower(end($fileParams)); // On la passe en minuscule (strtolower)

    // On vérifie si notre fichier possède la bonne extension
    // "Si notre extension NE fait PAS partie du tableau authorizedExtensions"
    if (!in_array($extension, $authorizedExtensions)) {
        echo "Cette extension n'est pas autorisée";
        die;
    }

    // On définit un nouveau nom de fichier pour notre upload file
    $fileName = time() . bin2hex(random_bytes(15)) . "." . $extension;

    // Puis on transert notre fichier en stockant son résultat, réussi ou non (true / false) dans $move
    $move = move_uploaded_file($file["tmp_name"], "uploads/" . $fileName);

    // Si tout est respecté, "et que le fichier est uploadé" on continu ci-dessous
    if ($move) {
        // on ouvre une nouvelle session
        session_start();
        // Puis on configure nos variables
        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["email"] = $email;
        $_SESSION["img"] = $fileName; // On pense à stocker le nom de notre image également, nous en aurons besoin en src (img)
    }
}
?>
<a href="profil.php">Voir mon profil</a>