<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    // Retrieve form data
    $flight = htmlspecialchars($_POST['flight']);
    $belegNr = htmlspecialchars($_POST['belegNr']);
    $litres = htmlspecialchars($_POST['litres']);
    $gallonsPumped = htmlspecialchars($_POST['gallonsPumped']);
    $totalDispatchPounds = htmlspecialchars($_POST['totalDispatchPounds']);
    $totalActualPoundsOnBoard = htmlspecialchars($_POST['totalActualPoundsOnBoard']);
    $subtractTotalPoundsOnArrival = htmlspecialchars($_POST['subtractTotalPoundsOnArrival']);
    $equalsPoundsAdded = htmlspecialchars($_POST['equalsPoundsAdded']);
    $dividedByActualFuelDensity = htmlspecialchars($_POST['dividedByActualFuelDensity']);
    $equalsCalculatedGallonsAdded = htmlspecialchars($_POST['equalsCalculatedGallonsAdded']);
    $subtractTotalGallonsPumped = htmlspecialchars($_POST['subtractTotalGallonsPumped']);
    $equalsDifference = htmlspecialchars($_POST['equalsDifference']);
    $allowableDifference = htmlspecialchars($_POST['allowableDifference']);

    // Retrieve tank data
    $tankNo = $_POST['tankNo'];
    $requestedDepartureFuel = $_POST['requestedDepartureFuel'];
    $actualDepartureFuel = $_POST['actualDepartureFuel'];
    $actualArrivalFuel = $_POST['actualArrivalFuel'];

    // Generate the date for the file name
    $date = new DateTime();
    $formattedDate = $date->format('M d');
    $fileName = "delta{$flight}.html";

    // Define the subdirectory
     $subdirectory = "today"; 				// in unterverzeichnis erstellen !!

    // Create the subdirectory if it doesn't exist
     if (!is_dir($subdirectory)) {				// fuer Unterverzeichnis aktivieren
        mkdir($subdirectory, 0755, true); // Create directory with permissions 0755
    }

    // Full path to the file
    // $filePath = $fileName;
    $filePath = $subdirectory . '/' . $fileName; 			//Unterverzeichnis

    // Construct the HTML content
    $content = "<html lang=\"de\" dir=\"ltr\">
    <!DOCTYPE html>
    <html lang=\"en\">
    <head>
    <meta charset=\"UTF-8\">
    <title>Delta {$flight} {$formattedDate}</title>
    <link rel=\"stylesheet\" href=\"../styles_dl.css\">
    
    </head>
    <body>
    
    <!-- Navigationsleiste -->
    <header class=\"navbar\">
        <nav>
            <ul>
                <li><a href=\"../../\">Airline-Info</a></li>
                <li><a href=\"#noch\">TRC Checksheet dauert noch</a></li>
                <li><a href=\"../trc-checklist2.php\">DL Checksheet</a></li>
                <li><a href=\"../fueling-sheet-edit.php\">DL Fuel</a></li>
                <li><a href=\"#\">DL Fuel WB</a></li>
                <li><a href=\"../../QR/QR-modul.php\">QR Container</a></li>
                <li><a href=\"../../QR/QR-modul-wb.php\">QR Container WB</a></li>
            </ul>
        </nav>
    </header>

    <!-- Navigationsleiste -->
    
    <div class=\"container-dl-top\">
    <h2 id=\"flight-nr\">DL{$flight} - {$formattedDate}</h2>

    <div class=\"connector-bar\">
    <div class=\"connector-bar-inner\"></div>
</div>

<div class=\"col-sm-4 bg-highlight\">

    <table border=\"1\">
        <tr>
            <th>Tank No.</th>
            <th>Requested Departure Fuel</th>
            <th>Actual Departure Fuel</th>
            <th>Actual Arrival Fuel</th>
        </tr>";

    for ($i = 0; $i < count($tankNo); $i++) {
        $content .= "<tr>
            <td>{$tankNo[$i]}</td>
            <td>{$requestedDepartureFuel[$i]}</td>
            <td id=\"actualDepartureFuel\">{$actualDepartureFuel[$i]}</td>
            <td>{$actualArrivalFuel[$i]}</td>
        </tr>";
    }

    $content .= "</table>
    <table border=\"1\" id=\"output\">
        <tr>
            <td>Beleg Nr.</td>
            <td id=\"belegNr\">{$belegNr}</td>
        </tr>
        <tr>
            <td>Litres</td>
            <td id=\"litres\">{$litres}</td>
        </tr>
        <tr>
            <td>Gallons Pumped</td>
            <td id=\"gallonsPumped\">{$gallonsPumped}</td>
        </tr>
        <tr>
            <td>Total Dispatch Pounds</td>
            <td>{$totalDispatchPounds}</td>
        </tr>
        <tr>
            <td>Total actual pounds on board</td>
            <td id=\"totalActualPoundsOnBoard\">{$totalActualPoundsOnBoard}</td>
        </tr>
        <tr>
            <td>Subtract total pounds on arrival</td>
            <td>{$subtractTotalPoundsOnArrival}</td>
        </tr>
        <tr>
            <td>Equals pounds added</td>
            <td id=\"equalsPoundsAdded\">{$equalsPoundsAdded}</td>
        </tr>
        <tr>
            <td>Divided by actual fuel density LBS/GAL</td>
            <td>{$dividedByActualFuelDensity}</td>
        </tr>
        <tr>
            <td>Equals calculated gallons added</td>
            <td>{$equalsCalculatedGallonsAdded}</td>
        </tr>
        <tr>
            <td>Subtract total gallons pumped</td>
            <td>{$subtractTotalGallonsPumped}</td>
        </tr>
        <tr>
            <td>Equals difference</td>
            <td>{$equalsDifference}</td>
        </tr>
        <tr>
            <td>Allowable difference (tolerance)</td>
            <td>{$allowableDifference}</td>
        </tr>
    </table>
    </div>
       <div class=\"connector-bar\">
    <div class=\"connector-bar-inner\"></div>
</div>
    </div>    </div>
    </body>
    </html>";

    // Save the content to a file in the subdirectory
    if (file_put_contents($filePath, $content)) {
        $successMessage = "Fuel record saved as <a href='{$filePath}' target='_blank'>{$filePath}</a>";
    } else {
        $errorMessage = "Failed to save file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Result</title>
    <link rel="stylesheet" href="styles_dl.css">
</head>
<body>
    <header class="navbar">
        <nav>
            <ul>
                <li><a href="../">Airline-Info</a></li>
                <li><a href="#noch">TRC Checksheet dauert noch</a></li>
                <li><a href="trc-checklist2.php">DL Checksheet</a></li>
                <li><a href="fueling-sheet-edit.php">DL Fuel</a></li>
                <li><a href="#">DL Fuel WB</a></li>
                <li><a href="../QR/QR-modul.php">QR Container</a></li>
                <li><a href="../QR/QR-modul-wb.php">QR Container WB</a></li>
            </ul>
        </nav>
    </header>
    <div class="container-dl-top">
        <?php if (isset($successMessage)): ?>
            <p><?php echo $successMessage; ?></p>
        <?php elseif (isset($errorMessage)): ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>