<?php
require_once __DIR__ . 'vendor/autoload.php';

// mPDF-Instanz erstellen
$mpdf = new \Mpdf\Mpdf();

// HTML-Inhalt, der in das PDF eingefügt wird
$html = '
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox-Überprüfung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
        }
        .checkbox-group {
            margin-bottom: 20px;
        }
        .checkbox-group label {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkbox-Überprüfung</h1>
        <div class="checkbox-group">
            <label><input type="checkbox" class="checkbox" checked> Checkbox 1</label>
            <label><input type="checkbox" class="checkbox" checked> Checkbox 2</label>
            <label><input type="checkbox" class="checkbox" checked> Checkbox 3</label>
            <label><input type="checkbox" class="checkbox" checked> Checkbox 4</label>
            <label><input type="checkbox" class="checkbox" checked> Checkbox 5</label>
            <label><input type="checkbox" class="checkbox" checked> Checkbox 6</label>
            <label><input type="checkbox" class="checkbox" checked> Checkbox 7</label>
            <label><input type="checkbox" class="checkbox" checked> Checkbox 8</label>
            <label><input type="checkbox" class="checkbox" checked> Checkbox 9</label>
            <label><input type="checkbox" class="checkbox" checked> Checkbox 10</label>
        </div>
    </div>
</body>
</html>
';

// HTML in das PDF schreiben
$mpdf->WriteHTML($html);

// PDF direkt im Browser anzeigen
$mpdf->Output('checkbox_ueberpruefung.pdf', \Mpdf\Output\Destination::INLINE);