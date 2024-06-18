<?php
function desinfect($str) {
    $str = strip_tags($str); // Entfernt HTML-Tags

    $str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
    $str = trim($str); // Entfernt Leerzeichen am Anfang und Ende
    return $str;
}
?>
