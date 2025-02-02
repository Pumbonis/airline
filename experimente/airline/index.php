<?php
// Textdatei einlesen
$data = file('imp2.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Array zur Speicherung der extrahierten Werte
$values = array();

// Durch die Zeilen der Textdatei iterieren
foreach ($data as $line) {
    // Zeile in Beschreibung und Wert aufteilen
    list($label, $value) = explode(': ', $line, 2);
    // Leerzeichen entfernen, um den Platzhalter zu erstellen
    $placeholder = str_replace(' ', '_', $label);
    // Alternative -> Leerzeichen entfernen und in Großbuchstaben umwandeln, um den Platzhalter zu erstellen
    // $placeholder = strtoupper(str_replace(' ', '_', $label)); 

    // Wert im Array speichern
    $values[$placeholder] = $value;
}

// HTML-Vorlage einlesen
$template = file_get_contents('airline-info.html');

// Platzhalter ersetzen
foreach ($values as $placeholder => $value) {
    $template = str_replace('{' . $placeholder . '}', $value, $template);
}

// Ausgabe der fertigen HTML-Seite
echo $template;
?>