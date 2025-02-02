<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Empfangen des HTML-Inhalts aus der POST-Anfrage
$data = json_decode(file_get_contents('php://input'), true);
$html = $data['html'];

// Optionen für Dompdf setzen
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

// Instanz von Dompdf erstellen
$dompdf = new Dompdf($options);

// HTML in das PDF schreiben
$dompdf->loadHtml($html);

// PDF rendern
$dompdf->render();

// PDF als Blob zurückgeben
$pdf = $dompdf->output();

// PDF als Datei zurückgeben
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="document.pdf"');
echo $pdf;