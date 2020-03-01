<?php
echo "<table>";
echo "<thead>
        <tr>
            <th>Title</th>
            <th>Lloc</th>
            <th>Metres2</th>
            <th>Publicar oferta</th>
        </tr>";
foreach ($apartments as $apartment){
    echo "<tr>";
    echo "<td> ".$apartment->title."</td>";
    echo "<td> ".$apartment->lloc."</td>";
    echo "<td> ".$apartment->metres2."</td>";
    echo "<td> <input type=\"button\" value=\"Posar anunci\" onclick=\"location.href = '/oferta/createForm/id/".$apartment->id."';\"></td>";
    echo "</tr>";
}
echo "</table>";