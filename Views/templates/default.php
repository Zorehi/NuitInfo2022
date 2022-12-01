<!DOCTYPE html>
<html lang="fr" id="projetbdd" class=<?php echo isset($_COOKIE["color-scheme"]) ? $_COOKIE["color-scheme"] : "__pj-light-mode"; ?>>

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuit de l'Info 2022</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reset.css">
</head>

<body class="system-fonts--body segoe">

    <?= $contenu ?>

</body>

</html>