<html>
<head></head>
<body>
<?php
if ( isset( $_REQUEST['inhalt'] ) and trim( $_REQUEST['inhalt'] ) <> '' )
{
    // Daten verarbeiten
    $zeileninhalt = explode("\r", $_REQUEST['inhalt']);
    foreach ($zeileninhalt AS $nr => $zeile) {
        $daten[$nr] = explode("\t", trim($zeile));
    }
    echo "<pre>";
    print_r($daten);
    exit;
}
?>
<h1>aus Excel-Tabelle über copy und paste einfügen</h1>
<form name="" action="" method="post">
<textarea name="inhalt" rows="10" cols="160" style="width: 100%;"></textarea>
<br>
<input name="" type="submit" value="speichern">
</form>
</body>
</html>