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

        <h1>Rentit</h1>
       <?php
        echo $error;
        if (isset($_SESSION["user"]) ){
            echo 'USER:"'.$_SESSION["user"].'"';
            echo "<input type=\"button\" value=\"Sortir\" onclick=\"location.href = '/default/borrasession';\">";


            if (isset($_SESSION["ven"]) && $_SESSION["ven"]==1 ){
                ?>
                <input type="button" value="Posar anunci" onclick="location.href = '/alquiler';">
                <?php

            }
        }else{
        ?>
    <form class="" method="POST" action="/default/login">
            <input type="text" name="user" placeholder="User">
            <input type="password" name="pass" placeholder="Pass">
            <input type="submit" name="submit" value="Log in" class="submit">
            <a href="/sign"><input type="button" value="registrarse"/> </a>
            <?php
//            if($contrasenaMal ==1){
//                echo "<p class='alert alert-warning'>Usuario/contraseña incorrecta</p>";
            }
            ?>
        </form>
    <?php echo $inmuebles;?>
    </body>
</html>