<?php
//print_r ($_POST);
//exit;
header("Content-Type: image/png");
$im = @imagecreate(500, 400)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 11, 63, 84);
$text_color = imagecolorallocate($im, 255, 255, 255);
imagestring($im, 1, 5, 5,  "SERTIFICATE", $text_color);
imagestring($im, 1, 100, 5,  $_POST['user'], $text_color);
imagestring($im, 1, 200, 5, 'score= '. $_POST['kolichestvo-pravilnyh-otvetov'], $text_color);
imagepng($im);
imagedestroy($im);
?>
