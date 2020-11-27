<?php

namespace App\Helpers;

use FPDF;

// require('../../fpdf182/fpdf.php');
require base_path('fpdf182/fpdf.php');


class PDF extends FPDF
{
    /**
     * Set the header for the pdf document
     *
     * @return void
     */
    public function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->centreImage(base_path('app/Images/image1.png'));
        $this->Cell(80);
        $this->Cell(10, 30, 'INCIDENT REPORT', 0, 0, 'C');
    }

    const DPI = 64;
    const MM_IN_INCH = 25.4;
    const A4_WIDTH = 297;
    const A4_HEIGHT = 210;
    const MAX_HEIGHT = 800;
    const MAX_WIDTH = 500;

    /**
     * Convert pixels to mm
     *
     * @param integer $val
     * @return integer
     */
    protected function pixelsToMM($val)
    {
        return $val * self::MM_IN_INCH / self::DPI;
    }

    /**
     * Resize image
     *
     * @param string $imgFilename
     * @return array
     */
    protected function resizeToFit($imgFilename)
    {
        list($width, $height) = getimagesize($imgFilename);

        $widthScale = self::MAX_WIDTH / $width;
        $heightScale = self::MAX_HEIGHT / $height;

        $scale = min($widthScale, $heightScale);

        return array(
            round($this->pixelsToMM($width)),
            round($this->pixelsToMM($height))
        );
    }

    /**
     * Centre image
     *
     * @param image $img
     * @return void
     */
    public function centreImage($img)
    {
        list($width, $height) = $this->resizeToFit($img);
        $this->Image(
            $img,
            (self::A4_HEIGHT - $width) / 2,
            0,
            $width / 2,
            $height / 2
        );
    }
}
