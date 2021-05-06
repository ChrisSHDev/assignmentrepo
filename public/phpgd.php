<?php

header("Content-type: image/png");
 
$width = 350;
$height = 360;
 

$im = ImageCreateTrueColor($width, $height);
 
ImageAntiAlias($im, true);
 

 

$black = ImageColorAllocate($im, 0, 0, 0);
$white = ImageColorAllocate($im, 255, 255, 255);

ImageFillToBorder($im, 0, 0, $white, $white);

ImageFilledEllipse($im, 180, 180, 300, 300, $black);

ImageFilledEllipse($im, 180, 180, 210, 180, $white);

 ImageFilledEllipse($im, 156, 315, 98, 190, $white);
 ImageFilledEllipse($im, 204, 315, 98, 190, $white);

ImageFilledEllipse($im, 180, 180, 210, 180, $white);
 

ImageFilledRectangle($im, 120, 330, 240, 200, $white);




ImageFilledEllipse($im, 130, 280, 110, 15, $white);

function drawDiamond($x, $y, $width, $color, $filled)
{
    global $im;


    $p1_x = $x;
    $p1_y = $y+($width/2);

    $p2_x = $x+($width/2);
    $p2_y = $y;

    $p3_x = $x+$width;
    $p3_y = $y+($width/2);

    $p4_x = $x+($width/2);
    $p4_y = $y+$width;


    $points = array($p1_x, $p1_y, $p2_x, $p2_y, $p3_x, $p3_y, $p4_x, $p4_y);


    $num_of_points = 4;

    if ($filled) {
        ImageFilledPolygon($im, $points, $num_of_points, $color);
    } else {
        ImagePolygon($im, $points, $num_of_points, $color);
    }
}


drawDiamond(60, 90, 90, $white, true);
drawDiamond(220, 90, 80, $white, true);


ImagePNG($im);


ImageDestroy($im);