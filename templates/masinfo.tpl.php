<html>
    <head>


    </head>
    <body>
    <?php
        if($_SESSION["com"] == 1 ){//comprobamos que de verdad entre un vendedor
    ?>
        <h1>Titol oferta:<?= $titulo ?></h1>
        <h2>Lloc: <?= $lugar?></h2>
        <h3>Data de publicació<?= $publicat_data?></h3>
        <h3>Nom del contacte: <?= $nick?></h3>
        <h3>Correu electronic: <?= $email?></h3>
        <input type="button" value="tornar" onclick="location.href = '/';">

    <?php
        }else{
            header("location:/");
        }
    ?>
    </body>
</html>