<html lang="de" dir="ltr">
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <link rel="icon" href="fav-dark.ico" media="(prefers-color-scheme:dark)" type="image/x-icon" />
    <link rel="icon" href="fav-light.ico" media="(prefers-color-scheme:light)" type="image/x-icon" />
<link rel="stylesheet" href="styles_dl_2.css">

    <style type="text/css">

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

        /*td {
            padding: 0 15px;
        }*/

        div.block {}

        div.paragraph {}

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


        /* checkbox in Farbe und rund */
        input[type="checkbox"] {
            height: 25px;
            width: 25px;
            clip-path: circle(50%);
            accent-color: lightgreen;
            appearance: none;
            background: #ffffff;
            /*#FFA900;*/
        }
        input[type="checkbox"]:checked {
            appearance: auto;
            background-color: #34b93d;
            /*neu*/
            border-color: #34b93d;
            /*neu*/
            animation: checkmark 0.5s ease-in-out;
            /*neu war 0.3*/
        }

        /*neu*/
@keyframes checkmark {
            0% {
                transform: scale(3);
                /* war 0 dann 7 */
            }
            100% {
                transform: scale(1);
            }
        }



        /* Druckstile */
        
        
        @media print {
    /* Deine bestehenden Druckstile */
    table {
        background-color: white !important;
    }
    button {
        display: none !important;
    }
    .print-reload {
        display: none !important;
    }
    .time {
        font-size: 0.7em; /* Anpassen der Textgröße für Timestamps */
    }
    input[type="checkbox"] {
            height: 15px;
            width: 15px;
    } 
    .waste {
            font-size: 9px;
    } 
    
    
    
    
    /* Weitere Druckstile */
    .font1 {
        font: 0.7em Arial, sans-serif;
    }
    .font2 {
        font: 0.80em Arial, sans-serif;
    }
    .font3 {
        font: 0.70em Arial, sans-serif;
    }
}
        /* Druckstile Ende */



        .print-reload {
            /*    left: 27px; */
            bottom: 0;
            height: 50px;
            border: none;
            /* Removes the border */
            outline: none;
            /* Removes the outline on focus */
            object-fit: cover;
            /* Bildgröße anpassen */
            position: relative;
            overflow: hidden;
            z-index: 20;
        }
        /*
.print-reload:hover {
	background-position: 0 -25px;
	box-shadow: 0px 0px 20px rgb(102, 204, 255), /* 171, 166, 166
			0px 0px 36px rgb(80, 195, 236), /* 149, 157, 1416
			0px 0px 28px rgb(86, 191, 242), /* 155, 153, 153
			0px 0px 28px rgb(112, 214, 255); /* 181, 176, 1715
}


*/
        .print-reload:focus {
            outline: none;
        }
        /*
.reload {
    /*width: 30px; /* Breite des Bildes
    height: 50px; /* Höhe des Bildes
	border: none; /* Removes the border
	outline: none; /* Removes the outline on focus
    object-fit: cover; /* Bildgröße anpassen
}
*/


        /* input feld design wc */
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
            /*	padding: 0px 15px; */
            margin: 0px 5px 5px 3px;
            transition: 0s;
            /*	background: black; */
            /*	opacity: 0.9; */
        }




        .svg_icon {
            position: absolute;
            left: 5px;
            fill: #000;
            /* #90EE90 */
            width: 10px;
            height: 10px;
        }
    </style>


    <script type="text/javascript">

        function updateTime(checkbox) {
            var parent = checkbox.parentElement;
            var timeSpan = parent.querySelector('.time');

            if (checkbox.checked) {
                var now = new Date();
                var hours = String(now.getHours()).padStart(2, '0');
                var minutes = String(now.getMinutes()).padStart(2, '0');
                var timeString = hours + ":" + minutes;

                if (!timeSpan) {
                    timeSpan = document.createElement('span');
                    timeSpan.className = 'time';
                    timeSpan.style.marginLeft = '5px';
                    timeSpan.style.fontWeight = 'bold';
                    parent.appendChild(timeSpan);
                }

                timeSpan.textContent = timeString;
            } else {
                if (timeSpan) {
                    timeSpan.remove();
                }
            }

            // Speichern des Zustands der Checkbox und des timeSpan in localStorage
            saveCheckboxState(checkbox, timeSpan);
        }

        function enforceUpperCase(event) {
            event.target.value = event.target.value.toUpperCase();
            saveInputState(event.target); // Speichern des Wertes im localStorage
        }

        function enforceMaxLength(event) {
            if (event.target.value.length > 4) {
                event.target.value = event.target.value.slice(0, 4);
            }
            saveInputState(event.target); // Speichern des Wertes im localStorage
        }

        function enforceTwoDigits(event) {
            if (event.target.value.length > 2) {
                event.target.value = event.target.value.slice(0, 2);
            }
            if (!/^d*$/.test(event.target.value)) {
                event.target.value = event.target.value.replace(/D/g, '');
            }
            saveInputState(event.target); // Speichern des Wertes im localStorage
        }

        function checkInputs() {
            const inputs = document.querySelectorAll('input[type="text"], input[type="number"]');
            let allFilled = true;

            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    allFilled = false;
                }
            });

            return allFilled;
        }

        function checkCheckboxes() {
            const checkboxes = document.querySelectorAll('.checkbox');
            let allChecked = true;

            checkboxes.forEach(checkbox => {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });

            if (allChecked && checkInputs()) {
                window.print();
            } else {
                alert('Bitte füllen Sie alle Felder aus und markieren Sie alle Checkboxen, bevor Sie drucken.');
            }
        }

        function printPage() {
            window.print();
        }

        function saveCheckboxState(checkbox, timeSpan) {
            const state = {
                checked: checkbox.checked,
                time: timeSpan ? timeSpan.textContent: null
            };
            localStorage.setItem(checkbox.id, JSON.stringify(state));
        }

        function saveInputState(input) {
            localStorage.setItem(input.id, input.value);
        }

        function restoreCheckboxState() {
            const checkboxes = document.querySelectorAll('.checkbox');
            checkboxes.forEach(checkbox => {
                const savedState = localStorage.getItem(checkbox.id);
                if (savedState !== null) {
                    const state = JSON.parse(savedState);
                    checkbox.checked = state.checked;
                    if (state.checked && state.time) {
                        const timeSpan = document.createElement('span');
                        timeSpan.className = 'time';
                        timeSpan.style.marginLeft = '5px';
                        timeSpan.style.fontWeight = 'bold';
                        timeSpan.textContent = state.time;
                        checkbox.parentElement.appendChild(timeSpan);
                    }
                }
            });
        }

        function restoreInputState() {
            const inputs = document.querySelectorAll('input[type="text"], input[type="number"]');
            inputs.forEach(input => {
                const savedValue = localStorage.getItem(input.id);
                if (savedValue !== null) {
                    input.value = savedValue;
                }
            });
        }

        function clearLocalStorageAndReset() {
            // Lösche den localStorage
            localStorage.clear();

            // Setze alle Checkboxen zurück
            const checkboxes = document.querySelectorAll('.checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
                const timeSpan = checkbox.parentElement.querySelector('.time');
                if (timeSpan) {
                    timeSpan.remove();
                }
            });

            // Setze alle Input-Felder zurück
            const inputs = document.querySelectorAll('input[type="text"], input[type="number"]');
            inputs.forEach(input => {
                input.value = '';
            });
        }

        // Wiederherstellen des Zustands der Checkboxen und Input-Felder beim Laden der Seite
        window.onload = function() {
            restoreCheckboxState();
            restoreInputState();
        };
    </script>

</head>
<body>
<!-- Navigationsleiste 

    <header class="navbar">
        <nav>
            <ul>
                <li><a href="../">Airline-Info</a></li>
                <li><a href="#noch">TRC Checksheet dauert noch</a></li>
                <li><a href="#">DL Checksheet</a></li>
                <li><a href="fueling-sheet-edit.php">DL Fuel</a></li>
                <li><a href="delta.html">DL Fuel WB</a></li>
                <li><a href="../QR/QR-modul.php">QR Container</a></li>
                <li><a href="../QR/QR-modul-wb.php">QR Container WB</a></li>
            </ul>
        </nav>
    </header>

 Navigationsleiste -->
 
     <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-logo">aerogate</a>
            <ul class="navbar-menu">
                <li><a href="#">Airline-Info</a></li>
                <li><a href="#">TRC-Check</a>
                </li>
                <li><a href="#">Delta</a>
                    <ul class="dropdown">
                        <li><a href="#">Checksheet</a></li>
                        <li><a href="#">Fuel</a></li>
                        <li><a href="#">Fuel WB</a></li>
                    </ul>
                </li>
                <li><a href="#">Qatar</a>
                    <ul class="dropdown">
                        <li><a href="#">Container</a></li>
                        <li><a href="#">Container WB</a></li>
                    </ul>
                </li>
                <li><a href="#">Telefonliste</a></li>
            </ul>
            <div class="navbar-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>
 
 

<div class="container-dl-top">
<h2 id="flight">Checksheet</h2>
<!--
<div class="container-dl">
-->
    <div class="connector-bar">
    <div class="connector-bar-inner"></div>
</div>
    <div class="col-sm-4 bg-highlight">
    <table class="top">
        <tr>
            <td width="85px">
                <img src="img/dl-st.png" width="83px">
            </td>
            <td align="center">
                <p class="font2">
                    Delta Air Lines - TRC Checklist
                </p>
            </td>
            <td align="right" width="100px">
                <p class="font1">
                    Revisionsstand 0 <br>Seite 1 von 1
                </p>
            </td>
        </tr>
    </table>

    <table border="1" class="main">
        <tr>
            <td colspan="2" align="center">
                <p class="font3">
                    Date: <span class="date-highlight"><?php echo date('d.m.'); ?></span> - Flight No.: <input type="number" id="flight-nr" maxlength="4" pattern="[0-9]{1,4}" oninput="enforceMaxLength(event)"> - TRC 3LC: <input type="text" size="4" maxlength="3" id="3lc" oninput="enforceUpperCase(event)">
                </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="pre-flight" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Pre-Flight Briefing with ALA
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="staff" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Check Availability of Staff/Equipment <a href="tel:21289" class="calltext"><img src="img/tel-trans.png" class="tel" align="center">[21289] aeroground</a>
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="chocks" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Check Chocking/Coning
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="safety-procedures" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Check adherence to Ramp Safety procedures
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="back-stairs" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Check back stairs positioned/door opened
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="blankets" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Check if blankets are positioned at back stairs
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="cleaner" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Cleaners on position at disembarkation end
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="fuel-truck" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Fuel Truck on position [STD -90]
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="water-service" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Water Service on position [STD-80]
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="waste-service" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Lavatory Service on position [STD-80] <br>Lavatory Sheet completed
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="waste-sheet" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Lavatory Sheet: Truck No. transmitted to <a href="tel:91618" class="calltext"><img src="img/tel-trans.png" class="tel" align="center">[91618] DL OPS</a>
            </p>
                <div class="custom_waste"><!--
                    <svg xmlns="http://www.w3.org/2000/svg" class="svg_icon" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm11.666 1.89c.682 0 1.139.47 1.187 1.107H14v-.11c-.053-1.187-1.024-2-2.342-2-1.604 0-2.518 1.05-2.518 2.751v.747c0 1.7.905 2.73 2.518 2.73 1.314 0 2.285-.792 2.342-1.939v-.114h-1.147c-.048.615-.497 1.05-1.187 1.05-.839 0-1.318-.62-1.318-1.727v-.742c0-1.112.488-1.754 1.318-1.754zm-6.188.926h.044L6.542 11h1.006L9 5.001H7.818l-.82 4.355h-.056L5.97 5.001h-.94l-.972 4.355h-.053l-.827-4.355H2L3.452 11h1.005l1.02-4.184z"></path></svg>--><input class="waste" type="number" id="waste-truck" maxlength="2" placeholder="Waste" oninput="enforceTwoDigits(event)">
                </div>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="crew" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Crew 0/B [STD-70] -&gt; Call <a href="tel:91618" class="calltext"><img src="img/tel-trans.png" class="tel" align="center">[91618] DL OPS</a> if delayed or call <a href="tel:21285" class="calltext"><img src="img/tel-trans.png" class="tel" align="center">[21285] bus dispo</a> to see wether the crewbus is already on its way.
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="fuel-sheet" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                DL Fuel Sheet completed and fuel figures transmitted to <a href="tel:91618" class="calltext"><img src="img/tel-trans.png" class="tel" align="center">[91618] DL OPS</a>
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="ala-ppr" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                DL Fuel Sheet: ALA entered Name/PPR Number
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="fuel-sheet-cockpit" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                DL Fuel Sheet: White Copy to flight crew
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="clean-progress" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Check cleaning/security check progress/ communicate boarding start to gate
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="traffic-light" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Check red/green light for passenger boarding/ give thumbs up to bus driver when needed
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="bus-arrival" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Monitor bus arrival/safe embarkation of passengers
            </p>
            </td>
        </tr>
        <tr>
            <td class="cell"><input type="checkbox" id="tobt" onclick="updateTime(this)" class="checkbox"></td>
            <td><p class="font3">
                Monitor TOBT and adjust if necessary [check with gate/ALA]
            </p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><p class="font3">
                Check Quick Reference for further infos/ <u>Ask ALA if in doubt</u> <br>Inform OPS/Station asap in case of any irregs or foreseeable delays
            </p>
            </td>
        </tr>
    </table>


    <table class="top">
        <tr>
            <td width="30%">
                <p>
                    <span class="font0" style="font-weight:bold;">Erstellt durch AGSO<br />Erstellt am 20.12.2024 </span>
                </p>
            </td>
            <td colspan="3">
                <p>
                    <span class="font0" style="font-weight:italic;">Uncontrolled copy If copied, downloaded or printed </span>
                </p>
            </td>
            <!--
            <td>
                <p>
                    <span class="font0" style="font-weight:bold;">Erstellt am 20.12.2024 </span>
                </p>
            </td>
            
            <td>
                <p>
                    <span class="font0" style="font-weight:bold;"></span>
                </p>
            </td>
            -->
            <td width="30%">
                <p>
                    <span class="font0" style="font-weight:bold;">Gepr&uuml;ft und genehmigt durch AGS<br />G&uuml;ltig ab 20.12.2024   </span>
                </p>
            </td>
        </tr>
        <tr>
            
            <td>&nbsp;</td>
            
            <td align="center"><input type="image" src="img/print3.png" class="print-reload" onclick="checkCheckboxes()" />
            </td>
            
            <td>&nbsp;</td>
            
            <td align="center"><input type="image" src="img/reload2.png" class="print-reload" onclick="clearLocalStorageAndReset()" /></td>
            
            <td>&nbsp;</td>
            
            <!--
                            <td colspan="5" align="center">
                            <!--
                            <button onclick="clearLocalStorageAndReset()">Clear</button>
                            -->
            <!--
                            print button simple
                            <button onclick="printPage()" margin-left="27px">Drucken</button>
                            -
                            </td>-->
        </tr>
    </table>
        <div class="connector-bar">
    <div class="connector-bar-inner"></div>
</div>
    </div>
    
    
    </div>
        </div>
<!--
        <br />
        <button id="export-pdf" onclick="exportToPDF()">Export as PDF</button>
        <script>
            function exportToPDF() {
                const content = document.documentElement.outerHTML; // HTML der gesamten Seite
                console.log(content); // Überprüfe den Inhalt in der Konsole
                fetch('erstellen_pdf.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ php: content })
                })
                .then(response => response.blob())
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'document.pdf';
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .catch(err => console.error('Error generating PDF:', err));
            }
        </script>
        
-->

<script>
        document.getElementById('mobile-menu').addEventListener('click', function() {
            const menu = document.querySelector('.navbar-menu');
            menu.classList.toggle('active');
        });

        document.querySelectorAll('.navbar-menu li').forEach(function(item) {
            item.addEventListener('click', function() {
                if (window.innerWidth <= 700) {
                    this.classList.toggle('active');
                }
            });
        });
    </script>
</body>
</html>