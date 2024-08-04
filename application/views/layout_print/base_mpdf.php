<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf();

// $this->load->view($content);

$html = $this->load->view($content, $data,  true);

$mpdf = new \Mpdf\Mpdf([
    'margin_left' => 1,
    'margin_right' => 1,
    'margin_top' => 1,        // table ke header
    'margin_bottom' => 1,
    'margin_header' => 1,    // header
    'margin_footer' => 1,    // footer
    'format' => [90, 125]
]);
$mpdf->AddPage('P');
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("");
$mpdf->SetAuthor("");
$mpdf->SetWatermarkText("");
$mpdf->showWatermarkText = false;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);
$mpdf->Output();
