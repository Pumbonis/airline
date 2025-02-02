<?php
require_once '../../libs/dompdf/autoload.inc.php'; // Manuell

use Dompdf\Dompdf;
use Dompdf\Options;

// Lesen Sie die eingehenden Daten
$data = json_decode(file_get_contents('php://input'), true);
$htmlContent = $data['html'];

// Überprüfe den empfangenen HTML-Inhalt
error_log($htmlContent); // Logge den Inhalt in der Fehlerkonsole

// Konfigurieren Sie dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // Für Bilder und externe Dateien
$dompdf = new Dompdf($options);

// HTML laden
$dompdf->loadHtml($htmlContent);

// Seitengröße und Ausrichtung festlegen (z.B. A4, Hochformat)
$dompdf->setPaper('A4', 'portrait');

// Rendern und ausgeben
$dompdf->render();
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="document.pdf"');
echo $dompdf->output();
?>