<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.html');
    exit();
}

date_default_timezone_set('Europe/Berlin'); // Setze die Zeitzone auf Deutschland

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['fileInput'])) {
        $file = $_FILES['fileInput'];
        $fileName = $file['name'];
        $fileTmpPath = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        if ($fileError === UPLOAD_ERR_OK) {
            if ($fileName === 'daten.txt') {
                $uploadDir = 'up/';
                $uploadPath = $uploadDir . $fileName;

                if (file_exists($uploadPath)) {
                    $timestamp = date('d_m_Y_His'); // DDMMYYYY_HHMMSS
                    $newFileName = 'daten_old_' . $timestamp . '.txt';
                    rename($uploadPath, $uploadDir . $newFileName);
                }

                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    echo 'Die Datei wurde erfolgreich hochgeladen.';
                } else {
                    echo 'Beim Hochladen der Datei ist ein Fehler aufgetreten.';
                }
            } else {
                echo 'Die Datei muss den Namen "daten.txt" haben.';
            }
        } else {
            echo 'Beim Hochladen der Datei ist ein Fehler aufgetreten.';
        }
    } else {
        echo 'Es wurde keine Datei ausgewählt.';
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Datei hochladen</title>
</head>
<body>
    <h1>Datei hochladen</h1>
    <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" id="fileInput" name="fileInput" accept=".txt">
        <button type="submit">Hochladen</button>
    </form>
    <div id="message"></div>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            const fileInput = document.getElementById('fileInput');
            const file = fileInput.files[0];
            const messageDiv = document.getElementById('message');

            if (!file) {
                messageDiv.innerText = 'Bitte wählen Sie eine Datei aus.';
                event.preventDefault();
                return;
            }

            if (file.name !== 'daten.txt') {
                messageDiv.innerText = 'Die Datei muss den Namen "daten.txt" haben.';
                event.preventDefault();
                return;
            }

            messageDiv.innerText = '';
        });
    </script>
</body>
</html>