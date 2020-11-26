<?php

namespace App\Helpers;

use FPDF;

// require('../../fpdf182/fpdf.php');
require base_path('fpdf182/fpdf.php');


class PDF extends FPDF
{
function Header()
{
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Line break
    // $this->Ln(20);
    $this->centreImage(base_path('app/Images/image1.png'));
    // Move to the right
    $this->Cell(80);
    // Framed title
    $this->Cell(10,30,'INCIDENT REPORT',0,0,'C');

    // $this->Image(base_path('app/Images/image1.png', 40, 100));
    
}

// const DPI = 96;
// const MM_IN_INCH = 25.4;
// const A4_HEIGHT = 297;
// const A4_WIDTH = 210;
// tweak these values (in pixels)
// const MAX_WIDTH = 800;
// const MAX_HEIGHT = 500;

const DPI = 64;
const MM_IN_INCH = 25.4;
const A4_WIDTH = 297;
const A4_HEIGHT = 210;
const MAX_HEIGHT = 800;
const MAX_WIDTH = 500;


function pixelsToMM($val) {
    return $val * self::MM_IN_INCH / self::DPI;
}

function resizeToFit($imgFilename) {
    list($width, $height) = getimagesize($imgFilename);

    $widthScale = self::MAX_WIDTH / $width;
    $heightScale = self::MAX_HEIGHT / $height;

    $scale = min($widthScale, $heightScale);

    return array(
        // round($this->pixelsToMM($scale * $width)),
        // round($this->pixelsToMM($scale * $height))

        round($this->pixelsToMM($width)),
        round($this->pixelsToMM($height))
    );
}

function centreImage($img) {
    list($width, $height) = $this->resizeToFit($img);

    // you will probably want to swap the width/height
    // around depending on the page's orientation
    $this->Image(
        $img, (self::A4_HEIGHT - $width) / 2,
        0,
        // (self::A4_WIDTH - $height) / 2,
        $width/2,
        $height/2
    );
}

}

