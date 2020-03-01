<html>
    <head>


    </head>
    <body>
    <h1> oferta</h1>

        <form id="registre" class="" method="POST" action="/oferta/create/id/<?=$id?>">
            <input type="text" name="titol" placeholder="titulo">
            <input type="text" name="disponibilitat" placeholder="disponibilitat">
            <input type="submit" name="submit" value="Publicar oferta" class="submit">
        </form>
    </body>
</html>