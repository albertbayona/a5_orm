<html>
    <head>


    </head>
    <body>
    <h1>Publicar oferta</h1>
    <?php
        if($_SESSION["ven"] == 1 ){//comprobamos que de verdad entre un vendedor
    ?>
        <form id="registre" class="" method="POST" action="/alquiler/publicar">
            <input type="text" name="titulo" placeholder="titulo">
            <input type="text" name="lugar" placeholder="lugar">
            <input type="submit" name="submit" value="Publicar oferta" class="submit">
            </form>
    <?php
        }
    ?>
    </body>
</html>