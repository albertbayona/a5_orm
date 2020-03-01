<html>
    <head>


    </head>
    <body>
    <h1> oferta</h1>
    <?= "user: ".$_SESSION['nom'] ?>
        <form id="registre" class="" method="POST" action="/apartment/create">
            <input type="text" name="title" placeholder="titol">
            <input type="text" name="lloc" placeholder="lloc">
            <input type="number" name="metres2" placeholder="metres2">
            <input type="submit" name="submit" value="Crear apartament" class="submit">
        </form>
    </body>
</html>