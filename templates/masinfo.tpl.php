
    <?php
        if($_SESSION["com"] == 1 ){//comprobamos que de verdad entre un vendedor
    ?>
        <h1>Titol oferta:<?= $titulo ?></h1>
        <h2>Lloc: <?= $lugar?></h2>
        <h3>Nom del contacte: <?= $nick?></h3>
        <h3>Correu electronic: <?= $email?></h3>
    <?php
        }else{
            header("location:/");
        }
    ?>
