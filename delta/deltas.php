<?php
// Verzeichnis, in dem die .php-Dateien gesucht werden
$directory = "today";

// Überprüfen, ob das Verzeichnis existiert
if (is_dir($directory)) {
    // Alle Dateien im Verzeichnis lesen
    $files = scandir($directory);
    // Nur .php-Dateien filtern
    $phpFiles = array_filter($files, function($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'html';
    });
} else {
    $phpFiles = [];
}
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="icon" href="../fav-dark.ico" media="(prefers-color-scheme:dark)" type="image/x-icon" />
    <link rel="icon" href="../fav-light.ico" media="(prefers-color-scheme:light)" type="image/x-icon" />
    <link rel="stylesheet" href="styles_dl.css">
    <style type="text/css">
        /* Deine bestehenden CSS-Stile */
        table.main {
            border: 0px solid black;
        }
        table.top {
            align-items: center;
            padding: 5px;
            border: 0px;
        }
        tr.row {}
        td.cell {
            width: 80px;
            padding: 5px;
        }
        .font0 {
            font: 0.50em Arial, sans-serif;
            text-align: center;
        }
        .font1 {
            font: 0.70em Arial, sans-serif;
        }
        .font2 {
            font: 0.80em Arial, sans-serif;
        }
        .font3 {
            font: 1.30em Arial, sans-serif;
        }
        .time {
            margin-left: 5px;
        }
        input[id="flight-nr"], input[id="3lc"] {
            width: 4em;
            color: black;
            padding: 4px;
            background-color: lightgreen;
            font-weight: bold;
        }
        .date-highlight {
            background-color: lightgreen;
            padding: 0 5px;
            width: 4em;
            font-weight: bold;
            border: 1px solid black;
        }
        input[type="checkbox"] {
            height: 25px;
            width: 25px;
            clip-path: circle(50%);
            accent-color: lightgreen;
            appearance: none;
            background: #ffffff;
        }
        input[type="checkbox"]:checked {
            appearance: auto;
            background-color: #34b93d;
            border-color: #34b93d;
            animation: checkmark 0.5s ease-in-out;
        }
@keyframes checkmark {
            0% {
                transform: scale(3);
            }

            100% {
                transform: scale(1);
            }
        }
@media print {
            /* Deine bestehenden Druckstile */
        }
        .print-reload {
            bottom: 0;
            height: 50px;
            border: none;
            outline: none;
            object-fit: cover;
            position: relative;
            overflow: hidden;
            z-index: 20;
        }
        .custom_waste {
            display: flex;
            align-items: center;
            position: relative;
            padding-bottom: 5px;
            max-width: 3.4em;
        }
        .waste {
            font-size: 12px;
            font-weight: bold;
            padding: 2px 2px;
            width: 100%;
            padding-left: 18px;
            outline: none;
            background: #FFFFFF;
            color: #000000;
            border: 0px solid #C4D1EB;
            border-radius: 20px;
            box-shadow: 1px 1px 5px 0px #E2E2E2;
            transition: .3s ease;
            maxlength: 2;
        }
        .waste:focus {
            background: #F2F2F2;
            border: 0px solid #5A7EC7;
            border-radius: 0px;
        }
        .waste::placeholder {
            color: #747474;
        }
        .tel {
            height: 20px;
            width: 20px;
            border-radius: 0px;
            margin: 0px 5px 5px 3px;
            transition: 0s;
        }
        .svg_icon {
            position: absolute;
            left: 5px;
            fill: #000;
            width: 10px;
            height: 10px;
        }
        input:user-valid {
            border: 2px solid green;
        }
        input:user-invalid {
            border: 2px solid red;
        }
        input:is(:focus) {
            border: 2px solid transparent;
            transition: all 0.1s ease;
            background: linear-gradient(#fff, #121125) padding-box, linear-gradient(45deg, blue, red) border-box;
        }
    </style>
    <script type="text/javascript">
        // Deine bestehenden JavaScript-Funktionen
    </script>
</head>
<body>
    <!-- Navigationsleiste -->
    <header class="navbar">
        <nav>
            <ul>
                <li><a href="../">Airline-Info</a></li>
                <li><a href="#noch">TRC Checksheet dauert noch</a></li>
                <li><a href="trc-checklist2.php">DL Checksheet</a></li>
                <li><a href="fueling-sheet-edit.php">DL Fuel</a></li>
                <li><a href="deltas.html">DL Fuel WB</a></li>
                <li><a href="../QR/QR-modul.php">QR Container</a></li>
                <li><a href="../QR/QR-modul-wb.php">QR Container WB</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hauptinhalt -->
    <div class="container-dl-top">
        <h2 id="flight">Fuel Doc</h2>
        <div class="connector-bar">
            <div class="connector-bar-inner"></div>
        </div>
        <div class="col-sm-4 bg-highlight">
            <!--         <table class="top">
                            <tr>
                                <td width="85px">
                                    <img src="img/dl-st.png" width="83px">
                                </td>
                                <td align="center">
                                    <p class="font2">Delta Air Lines - TRC Checklist</p>
                                </td>
                                <td align="right" width="100px">
                                    <p class="font1">Revisionsstand 0 <br>Seite 1 von 1</p>
                                </td>
                            </tr>
                        </table>
            -->

            <!-- Auflistung der .php-Dateien -->
            <div class="file-list">
                <!--<h3>Verfügbare Dateien im Verzeichnis "today":</h3>-->
                <?php if (!empty($phpFiles)): ?>
                <ul>
                    <?php foreach ($phpFiles as $file): ?>
                    <?php
                    // Dateiname ohne Endung extrahieren
                    $fileNameWithoutExtension = pathinfo($file, PATHINFO_FILENAME);
                    ?>
                    <li><a href="<?php echo $directory . '/' . $file; ?>" target="_blank"><?php echo $fileNameWithoutExtension; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php else : ?>
                <p>
                    Keine Dateien im Verzeichnis gefunden.
                </p>
                <?php endif; ?>
            </div>
            <br>
            <br>
            <br>

            <div class="connector-bar">
                <div class="connector-bar-inner"></div>
            </div>
        </div>
    </div>
</body>
</html>