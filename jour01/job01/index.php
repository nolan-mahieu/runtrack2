<?php
    // nous créons les variables $str, $str2 et $str3, puis nous les concaténons pour affiche le texte.
    $str = "LaPlateforme";
    echo $str . "<br>";
    
    $str2 = "Vive";
    $str3 = "!";
    echo $str2 . " " . $str . " " . $str3 . "<br>";
    
    // nous créons la variable $val avec la valeur 6, l'affichons, puis ajoutons 4 à cette valeur et l'affichons à nouveau.
    $val = 6;
    echo $val . "<br>";
    $val += 4;
    echo $val . "<br>";

    // nous créons la variable $myBool avec la valeur true, l'affichons, puis modifions sa valeur en false et l'affichons à nouveau.
    $myBool = true;
    echo $myBool . "<br>";
    $myBool = false;
    echo $myBool . "<br>";
?>