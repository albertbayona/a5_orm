<?php
echo 'USER:"'.$_SESSION["nom"].'"';
?>
<input type="button" value="Sortir" onclick="location.href = '/user/borrasession';">
<input type="button" value="Crear apartament" onclick="location.href = '/apartment';">
<input type="button" value="Posar anunci" onclick="location.href = '/oferta';">