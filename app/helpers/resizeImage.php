<?php
function resizeImage($fromFile, $toFile = null, $maxDimension = 300) {
    $width = $maxDimension;
    $height = $maxDimension;
    list($widthOrig, $heightOrig) = getimagesize($fromFile);

    if ($widthOrig === NULL || $heightOrig === NULL) {
        return false;
    }

    if ($widthOrig >= 20000 || $heightOrig >= 20000) {
        return false;
    }

    $ratioOrig = $widthOrig / $heightOrig;

    if ($width / $height > $ratioOrig) {
        $width = (int) round($height * $ratioOrig);
    } else {
        $height = (int) round($width / $ratioOrig);
    }

    $imageP = imagecreatetruecolor($width, $height);
    $image = @imagecreatefromjpeg($fromFile);

    if ($image === false) {
        return false;
    }

    // Sicherstellen, dass das Zielverzeichnis existiert
    $dir = dirname($toFile);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    imagecopyresampled($imageP, $image, 0, 0, 0, 0, $width, $height, $widthOrig, $heightOrig);
    $imageWritten = imagejpeg($imageP, $toFile, 80);

    if (!$imageWritten) {
        return false;
    }

    imagedestroy($imageP);
    imagedestroy($image);

    return true;
}
?>
