<?php
// Array mit Bilddateien für jeden Tag
$days = [
    "1" => "1.jpg",
    "2" => "2.jpg",
    "3" => "3.png",
    "4" => "4.jpg",
    "5" => "5.jpg",
    "6" => "6.jpg",
    "7" => "7.jpg",
    "8" => "8.jpg",
    "9" => "9.jpg",
    "10" => "10.jpg",
    "11" => "11.jpg",
    "12" => "12.jpg",
    "13" => "13.jpg",
    "14" => "14.jpg",
    "15" => "15.jpg",
    "16" => "16.jpg",
    "17" => "17.jpg",
    "18" => "18.jpg",
    "19" => "19.jpg",
    "20" => "20.jpg",
    "21" => "21.jpg",
    "22" => "22.jpg",
    "23" => "23.jpg",
    "24" => "24.jpeg"
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
        <!-- <link rel="stylesheet" href="advent.css">  -->
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
            background-position: left;
        }
        .door {
            width: 100%;
            height: 100px;
            background-color: rgba(204, 204, 204, 0.1); /* 90% transparent */
            text-align: center;
            color: #fff;
            line-height: 100px;
            cursor: pointer;
            position: relative;
            overflow: hidden; /* Verhindert, dass das Bild über die Tür hinausgeht */
            border: 1px dotted #000 ; /* Optional: Rahmen für die Türen */
        }
        .hidden {
            display: none;
        }
        .image {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Skaliert das Bild, um es in die Tür zu passen  scale-down contain cover r */
            position: absolute;
            top: 0;
            left: 0;
            /*opacity: 0.8; /* Leicht transparent */
        }
        .overlay {
            display: none; /* Unsichtbar bis alle Türen geöffnet sind */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('img/christmas.jpg'); /* Hintergrundbild für Overlay */
            background-size: cover;
            background-position: center;
            text-align: center;
            color: white;
            font-size: 3em;
            line-height: 100vh; /* Zentriert den Text vertikal */
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
        let openedDoors = 0;

        function toggleImage(day) {
            const img = document.getElementById('img' + day);
            
            if (img.classList.contains('hidden')) {
                img.classList.remove('hidden');
                openedDoors++;
                
                if (openedDoors === <?= count($days) ?>) { // Wenn alle Türen geöffnet sind
                    document.getElementById('overlay').style.display = 'block';
                }
            }
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

    <!-- Overlay -->
    <div id="overlay" class="overlay">
        Frohe Weihnachten
    </div>
</body>
</html>