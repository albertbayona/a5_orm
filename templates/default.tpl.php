<html>
    <head>

        <style>
            table{
                border:1px solid black;
                border-collapse: collapse;
            }
            td{
                border:1px solid black;
            }
        </style>
    </head>

    <body>

        <h1>App</h1>
       <?php
        echo $error;
        if (isset($_SESSION["nom"]) ){
            include __DIR__."/logged.tpl.php";
        }else {
            include __DIR__."/login.tpl.php";
        }
        //aqui va la logica de la tabla
        $i=0;
        $max_columnas= 4;
        echo "<table>";
        foreach ($ofertas as $oferta){
            if($i == 0){
                echo "<td>";
            }
            $apartment=$oferta->Apartment;
            $user = $apartment->user;
            ?>
            <td>
                <h1>Titol oferta:<?= $oferta->titol ?></h1>
                <h3>Nom de l'apartament:<?= $apartment->title?></h3>
                <h2>Lloc: <?= $apartment->lloc?></h2>
                <h3>Nom del contacte: <?= $user->nom?></h3>
                <h3>Correu electronic: <?= $user->email?></h3>
                <h3>Disponibilitat: <?= $oferta->disponibilitat?></h3>
            </td>
            <?php
            $i++;
            if ($i ==$max_columnas){
                echo "</td>";
                $i=0;
            }

        }
       echo "</table>";

       ?>


        <?php
        ?>
    </body>
</html>