<html>
    <head>

    </head>
    <body>
    <h1>sign in</h1>
    <form id="registre" class="" method="POST" action="/sign/sign">
            <input type="text" name="user" placeholder="User">
            <input type="password" name="pass" placeholder="Pass">
            <input type="password" name="verifypass" placeholder="Verifica Pass">
            <input type="email" name="email" placeholder="Email">

        <p>Atent ha de seleccionar almenys un dels següents rols per tenir les accions que pertany</p>
            <label><input type="checkbox" name="ven">Venedor</label>
            <label><input type="checkbox" name="com">Comprador</label>

            <input type="submit" name="submit" value="Sign in" class="submit">

        </form>
    </body>
</html>