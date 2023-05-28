<?php
    //Variables de différents types.
    $booleanVar = true;
    $integerVar = 42;
    $stringVar = "Hello";
    $floatVar = "3.14";

    //Tableau HTML pour afficher les informations des variables.
    echo "<table>
    <thead>
      <tr>
        <th>Type</th>
        <th>Nom</th>
        <th>Valeur</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Boolean</td>
        <td>booleanVar</td>
        <td>$booleanVar</td>
      </tr>
      <tr>
        <td>Integer</td>
        <td>integerVar</td>
        <td>$integerVar</td>
      </tr>
      <tr>
        <td>String</td>
        <td>stringVar</td>
        <td>$stringVar</td>
      </tr>
      <tr>
        <td>Float</td>
        <td>floatVar</td>
        <td>$floatVar</td>
      </tr>
    </tbody>
  </table>";
?>