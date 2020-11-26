<?php

namespace App\Helpers;

use App\Mail\IncidentReport;
use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use FPDF;
use Illuminate\Support\Facades\Mail;

// require('../../fpdf182/fpdf.php');
// require base_path('fpdf182/fpdf.php');

class Helpers {
    public function generatePDF($data) {
        // $pdf = new FPDF();
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Courier','B',12);
        $txt = 'Created for ' . $data['product_name'] . ', ' . $data['product_version'] . ' on ' . $data['date'];
        $pdf->Ln();
        $pdf->Cell(0, 0, $txt,0,1);
        // $pdf->Cell(200);
        $pdf->Ln();
        $pdf->Cell(10, 10);

        $txt1 = "1. Aim of the document";
        $pdf->Cell(0, 10, $txt1,0,1);
        $pdf->SetFont('Courier','',12);

        $txt2 = 'This document aims at reporting the unfortunate event together with its cause and the implications for the future';
        $pdf->Write(10,$txt2);

        $pdf->Ln();
        $pdf->Cell(10, 10);

        $txt1 = "2. The incident";
        $pdf->SetFont('Courier','B',12);

        $pdf->Cell(0, 10, $txt1,0,1);
        $pdf->SetFont('Courier','',12);

        $pdf->Write(15, $data['description']);


        $pdf->Ln();
        $pdf->Cell(10, 10);

        $txt1 = "3. The implication for the future";
        $pdf->SetFont('Courier','B',12);

        $pdf->Cell(0, 10, $txt1,0,1);
        $pdf->SetFont('Courier','',12);

        $pdf->Write(15, $data['lessons_learned']);


        $pdf->Ln();
        $pdf->Cell(10, 10);

        $txt1 = "4. Assurance";
        $pdf->SetFont('Courier','B',12);

        $pdf->Cell(0, 10, $txt1,0,1);
        $pdf->SetFont('Courier','',12);

        $pdf->Write(15, $data['assurance']);

        $filename = $this->createReportFile();

        $pdf->Output('F', base_path('reports/' . $filename . '.pdf'));
        Mail::
                to('bsmrrachel@gmail.com')
        // to('test-4mct27x2z@srv1.mail-tester.com')
                ->send(new IncidentReport($filename, $data['product_name']));
    }

    public function createReportFile() {
        if (!is_dir(base_path('reports'))) {
            mkdir(base_path('reports'));
        }
        $filename = 'report' . time();
        file_put_contents(base_path('reports/' . $filename . '.pdf'), '');
        return $filename;
    }
}