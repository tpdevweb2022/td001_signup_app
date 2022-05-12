<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="traitement.php" method="POST" enctype="multipart/form-data">
        <div class="pseudo">
            <label for="pseudo"></label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
        </div>
        <div class="email">
            <label for="email"></label>
            <input type="email" name="email" id="email" placeholder="Adresse email">
        </div>
        <div class="pass">
            <label for="pass"></label>
            <input type="password" name="pass" id="pass" placeholder="Mot de passe">
        </div>
        <div class="confirm_pass">
            <label for="confirm_pass"></label>
            <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Confirmer mot de passe">
        </div>
        <div class="file">
            <label for="avatar"></label>
            <input type="file" name="avatar" id="avatar">
        </div>
        <div class="submit">
            <input type="submit" name="submit_form" value="S'enregistrer">
        </div>
    </form>
</body>

</html>