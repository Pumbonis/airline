<!DOCTYPE html>
<html>


<head>
    <title>Qatar Container2</title>
	
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
	<link rel="stylesheet" href="styles_modul.css">

</head>
<body>

<?php
$heute = date("d.m.y");

if(isset($_POST['submit'])):
    $file_prefix = 'QR-modul-wb-test';
    $filename = $file_prefix . '.php';

    // Debug: Überprüfen, ob die Flugnummer im $_POST-Array vorhanden ist
    if(isset($_POST['flight'])) {
        $flight_number = $_POST['flight'];
        echo "<p>Debug: Flugnummer ist gesetzt: $flight_number</p>";
    } else {
        echo "<p>Debug: Flugnummer ist nicht gesetzt</p>";
        $flight_number = '';
    }

    $file_contents = 
'<!DOCTYPE php>
<html>
<head>
    <title>Qatar Container3</title>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
    <link rel="stylesheet" href="styles_wb.css">
<style>

</style>

</head>

<body>

<script>
 function printContent() {
 window.print();
}
 </script>

<div class="col-sm-6 bg-default">
    <div>
        <div>
            <div class="block-text-module">
                <div class="text">
                    <div class="container-fluid layout-container">
                        <div class="layout-row">
                            <div class="col-xs-12">
                                <p>&nbsp;</p>
                                <?php
                                $heute = date("d.m.y");
                                echo "<h3>Qatar Container Nummern vom <mark>" . $heute . "</mark> für Flug " . $flight_number . "</h3>"; 
?>
                            </div>
                        </div>
                    </div>
                    <p><br></p>
                </div>
        
            </div>

        </div>
    </div>
</div>

<div class="connector-bar">
    <div class="connector-bar-inner"></div>
</div>

<div class="col-sm-4 bg-highlight">

<Table>';

    $file_contents .= "<tr>
            <th width='100px' class='cell-white'>QKE/AKE</th>
            <th width='100px' class='cell-white'>Typ</th>
            <th class='cell-white-onto'>&nbsp;</th>
            <th width='100px' class='cell-white'>QKE/AKE</th>
            <th width='100px' class='cell-white'>Typ</td>
            <th class='cell-white-onto'>&nbsp;</th>
        </tr>";

    for($i=0; $i<8; $i++):
        $first_col = isset($_POST['first_col'][$i]) ? $_POST['first_col'][$i] : '';
        $second_col = isset($_POST['second_col'][$i]) ? $_POST['second_col'][$i] : '';
        $third_col = isset($_POST['third_col'][$i]) ? $_POST['third_col'][$i] : '';
        $fourth_col = isset($_POST['fourth_col'][$i]) ? $_POST['fourth_col'][$i] : '';
        $fifth_col = isset($_POST['fifth_col'][$i]) ? $_POST['fifth_col'][$i] : '';
        $sixth_col = isset($_POST['sixth_col'][$i]) ? $_POST['sixth_col'][$i] : '';

        $file_contents .= "<tr>
        <td style='text-align:right' class='cell-white'>$first_col</td>
        <td style='text-align:center' class='cell-white'>$second_col</td>
        <td style='text-align:left' class='cell-white'>$third_col</td>
        <td style='text-align:right' class='cell-white'>$fourth_col</td>
        <td style='text-align:center' class='cell-white'>$fifth_col</td>
        <td style='text-align:left' class='cell-white'>$sixth_col</td>
        
    </tr>";
    endfor;

    for($i=0; $i<2; $i++):
        $airline = isset($_POST['airline'][$i]) ? $_POST['airline'][$i] :'';
        
        $file_contents .= "<tr>
        <td colspan='6' style='text-align:right' class='cell-white'><b>$airline</b></td>
        </tr>";
        
    endfor;
    
    $file_contents .= '<tr>
        <td colspan="6" align="center" class="cell-white"><h2 style="color:Tomato"> Your friendly Qatar TRC</h2>
        Proud member of

        <p><b>N</b><y>asty</y><b>A</b><y>dult</y><b>S</b><y>ex</y><b>A</b><y>dvisors</y></p>
        </td>
    </tr>';

$file_contents .= '<tr>
<!--            <td colspan="6" align="center">-->
        <td colspan="6">
<div align="center">
                <div id="printOption">
                    <input type="image" src="print3.png" class="print" onclick="printContent()" />

                    <input type="image" src="reload2.png" class="reload" onclick="location.reload()" />
                </div>
</div>
        </td> 
    </tr>';
    
    $file_contents .= '</table>
    
    </div>
<div class="connector-bar">
    <div class="connector-bar-inner"></div>
</div>

<div class="col-sm-6 bg-default">
    <div>
        <div>
            <div class="block-text-module">
                <div class="text">
                    <div class="container-fluid layout-container">
                        <div class="layout-row">
                            <div class="col-xs-12">
                                <p>&nbsp;</p>
                                <h3> Marc @ aerogate - Ihr Partner für exzellenten Service</h3>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>

        </div>
    </div>
</div>
    

</body></html>';

    // Debug: Überprüfen, ob die Datei korrekt geschrieben wird
    if(file_put_contents($filename, $file_contents)) {
        echo "<p>Debug: Datei erfolgreich geschrieben</p>";
    } else {
        echo "<p>Debug: Fehler beim Schreiben der Datei</p>";
    }

    
?>
<div class="col-sm-6 bg-default">
    <div>
        <div>
            <div class="block-text-module">
                <div class="text">
                    <div class="container-fluid layout-container">
                        <div class="layout-row">
                            <div class="gesendet-klein">
<?php echo '<a href="QR-modul-wb-test.php" target="blank">&nbsp;Nummern gespeichert!</a>';
endif;?>
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>

        </div>
    </div>

</div>

<div class="col-sm-6 bg-default">
    <div>
        <div>
            <div class="block-text-module">
                <div class="text">
                    <div class="container-fluid layout-container">
                        <div class="layout-row">
                            <div class="col-xs-12">
                                <p>&nbsp;</p>
                                <h2>MAC @ aerogate</h2>
                            </div>
                        </div>
                    </div>
                    <p><br></p>
                </div>
        
            </div>

        </div>
    </div>
</div>

<div class="connector-bar">
    <div class="connector-bar-inner"></div>
</div>
<Form id="cont" action="QR-modul-test.php" method="post">

<div class="col-sm-4 bg-highlight">

    <Table>
        <?php for($i=0; $i<1; $i++): ?>
            <tr>
                <td colspan="6">
                    <select id="airline" name="airline[]">
                        <option value="QR">QR</option>
                        <option value="TK">TK</option>
                        <option value="AZ">AZ</option>
                    </select>
                    <label for="flight">Flight:</label>
                    <input type="number" id="flight_number" name="flight" maxlength="4" pattern="[0-9]{1,4}" title="Please enter up to 4 digits">
                </td>
            </tr>
        <?php endfor; ?>
        <?php for($i=0; $i<8; $i++): ?>
            <tr>
                <td style="text-align:right" style="width:15%"><input class="akeqke" type="text" id="first" name="first_col[]" value="<?php echo isset($_POST['first_col'][$i]) ? $_POST['first_col'][$i] : ''; ?>" maxlength="8" size="5" inputmode="decimal">
                </td> 

                <td style="text-align:left" style="width:10%">
                
                    <select id="second" name="second_col[]">
                        <option value=" "> </option>
                        <option value="BTS">BTS</option>
                        <option value="BTL">BTL</option>
                        <option value="BTS/BTL">BTS/BTL</option>
                        <option value="BTQ">BTQ</option>
                        <option value="BTP">BTP</option>
                        <option value="BMC">BMC</option>
                        <option value="BMC/BTP">BMC/BTP</option>
                        <option value="BMC/BTQ">BMC/BTQ</option>
                        <option value="BTP/BTQ">BTP/BTQ</option>
                        <option value="BY/BJ">BY/BJ</option>
                        <option value="BY">BY</option>
                        <option value="Onto -->">Onto</option>
                        <option value="Crew">Crew</option>
                    </select>
                
                </td>

                <td style="text-align:left" style="width:5%"><input type="text" class="onto" name="third_col[]" value="<?php echo isset($_POST['third_col'][$i]) ? $_POST['third_col'][$i] : ''; ?>"  maxlength="4" size="4" inputmode="decimal">
                </td>

                
                <td style="text-align:right" style="width:15%"><input class="akeqke" type="text" id="fourth" name="fourth_col[]" value="<?php echo isset($_POST['fourth_col'][$i]) ? $_POST['fourth_col'][$i] : ''; ?>" maxlength="8" size="5" inputmode="decimal">
                </td>
                
                <td style="text-align:left" style="width:10%">
                    <select id="fifth" name="fifth_col[]">
                        <option value=" "> </option>
                        <option value="BTS">BTS</option>
                        <option value="BTL">BTL</option>
                        <option value="BTS/BTL">BTS/BTL</option>
                        <option value="BTQ">BTQ</option>
                        <option value="BTP">BTP</option>
                        <option value="BMC">BMC</option>
                        <option value="BMC/BTP">BMC/BTP</option>
                        <option value="BMC/BTQ">BMC/BTQ</option>
                        <option value="BTP/BTQ">BTP/BTQ</option>
                        <option value="BY/BJ">BY/BJ</option>
                        <option value="BY">BY</option>
                        <option value="Onto -->">Onto</option>
                        <option value="Crew">Crew</option>
                    </select>
                </td>
            
                <td style="text-align:left" style="width:5%"><input type="text" class="onto" name="sixth_col[]" value="<?php echo isset($_POST['sixth_col'][$i]) ? $_POST['sixth_col'][$i] : ''; ?>" maxlength="4" size="4" inputmode="decimal">
                </td>
                

            </tr>
        <?php endfor; ?>
    </table>
</div>       
<div class="connector-bar">
    <div class="connector-bar-inner"></div>
</div>
<div class="col-sm-6 bg-default">
    <div>
        <div>
            <div class="block-text-module">
                <div class="text">
                    <div class="container-fluid layout-container">
                        <div class="layout-row">
                            <div class="col-xs-12">
                                <p>&nbsp;</p>
                                <input type="submit" name="submit" value="Senden an WB">
                                <input type="reset" value="reset">
                                <!--<button id="clearFields">Clear Fields</button>  alternativer clear&reload button-->
                                <p>&nbsp;</p>
                                <input type="image" src="reload2.png" class="bild" id="clearFields" />
                                <p>&nbsp;</p>
                                <h2>Marc - Ihr Partner für exzellenten Service</h2>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>

        </div>
    </div>
</div>
</form>

<script src="script_wb.js"></script>
<script>

</script>

</body>
</html>
