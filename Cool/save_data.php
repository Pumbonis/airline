<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1

header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

// Dateiname der Textdatei
$dateiname = 'daten.txt';

// Suffix, das entfernt werden soll
$suffix = '_alt';

// Funktion zum Entfernen von Leerzeichen und Suffix aus dem Schlüssel
//function sanitizeKey($key, $suffix) {
//   return str_replace($suffix, '', str_replace('', ' ', $key));
//}

function sanitizeKey($key, $suffix) {
    return str_replace(' ', '', str_replace($suffix, '', $key));
}



// Daten aus dem POST-Array holen und Leerzeichen entfernen
$data = [];
foreach ($_POST as $key => $value) {
    $data[sanitizeKey($key, $suffix)] = str_replace(' ', ' ', $value);
}


// Bestehende Daten aus der Datei lesen
$existingData = [];
if (file_exists($dateiname)) {
    $fileContent = file($dateiname, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($fileContent as $line) {
        list($key, $value) = explode(': ', $line);
        $existingData[$key] = $value;
    }
}

// Neue Daten hinzufügen oder vorhandene aktualisieren
$allData = array_merge($existingData, $data);

// Daten in die Datei schreiben
$fileHandle = fopen($dateiname, 'w');
foreach ($allData as $key => $value) {
    fwrite($fileHandle, $key . ': ' . $value . PHP_EOL);
}
fclose($fileHandle);

echo "Daten erfolgreich gespeichert.";
?>
