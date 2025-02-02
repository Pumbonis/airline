<?php
// Array mit Bilddateien für jeden Tag
$days = [
    "1" => "1.jpg",
    "2" => "2.jpeg",
    "3" => "3.jpeg",
    "4" => "4.jpg",
    "5" => "5.jpg",
    "6" => "6.jpg",
    "7" => "Bild7.jpg",
    "8" => "Bild8.jpg",
    "9" => "Bild9.jpg",
    "10" => "Bild10.jpg",
    "11" => "Bild11.jpg",
    "12" => "Bild12.jpg",
    "13" => "Bild13.jpg",
    "14" => "Bild14.jpg",
    "15" => "Bild15.jpg",
    "16" => "Bild16.jpg",
    "17" => "Bild17.jpg",
    "18" => "Bild18.jpg",
    "19" => "Bild19.jpg",
    "20" => "Bild20.jpg",
    "21" => "Bild21.jpg",
    "22" => "Bild22.jpg",
    "23" => "Bild23.jpg",
    "24" => "Bild24.jpg"
];

// Mischen der Tage
$shuffledDays = array_keys($days);
shuffle($shuffledDays);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Adventskalender</title>
    <style>
        .calendar {
            display: grid;
            gap: 10px;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-image: url('img/bg.webp'); /* Hintergrundbild */
            background-size: cover; /* Bild soll den gesamten Bereich abdecken */
            background-repeat: no-repeat; /* Bild soll sich nicht wiederholen */
        }
        
        .door {
            width: 100%;
            height: 100px;
            background-color: #ccc;
            color: white;
            text-align: center;
            line-height: 100px;
            cursor: pointer;
            position: relative;
            overflow: hidden; /* Verhindert, dass das Bild über die Tür hinausgeht */
            border: 1px dotted #000; /* Optional: Rahmen für die Türen */
        }
        .hidden {
            display: none;
        }
        .image {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Skaliert das Bild, um es in die Tür zu passen */
            position: absolute;
            top: 0;
            left: 0;
            /*opacity: 0.8; /* 20% transparent */
        }
        /* Zufällige Farben für die Türen */
        .door:nth-child(odd) {
            background-color: rgba(204, 204, 204, 0.2); /* 90% */
            /*background-color: #ff9999; /* Rot */
        }
        .door:nth-child(even) {
            background-color: rgba(204, 204, 204, 0.1); /* 90% */
            /*background-color: #99ccff; /* Blau */
        }
        .door:nth-child(3n) {
            background-color: rgba(204, 204, 204, 0.1); /* 90% */
            /*background-color: #99ff99; /* Grün */
        }
        .door:nth-child(4n) {
            background-color: rgba(204, 204, 204, 0.1); /* 90% */
            /*background-color: #ffff99; /* Gelb */
        }

        /* Portrait-Modus (4x6) */
        @media (orientation: portrait) {
            .calendar {
                grid-template-columns: repeat(4, 1fr);
                grid-template-rows: repeat(6, 1fr);
            }
        }

        /* Landscape-Modus (6x4) */
        @media (orientation: landscape) {
            .calendar {
                grid-template-columns: repeat(6, 1fr);
                grid-template-rows: repeat(4, 1fr);
            }
        }
    </style>
    <script>
        function toggleImage(day) {
            var img = document.getElementById('img' + day);
            img.classList.toggle('hidden');
        }
    </script>
</head>
<body>
    <h1>Adventskalender</h1>
    <div class="calendar">
        <?php foreach ($shuffledDays as $day): ?>
            <div class="door" onclick="toggleImage(<?= $day ?>)">
                <?= $day ?>
                <img id="img<?= $day ?>" class="image hidden" src="img/<?= $days[$day] ?>" alt="Türchen <?= $day ?>">
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>