<!DOCTYPE html>
<html>
<head>
    <title>Qatar Container</title>
<style>
table, th, td {
  border: 1px solid black;
}
body {
  font-family: Arial, sans-serif;
}
</style>

<style>
        .text-field {
            display: none;
        }
</style>
    
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>



<?php

		$heute = date("d.m.y");

if(isset($_POST['submit'])):
    $file_prefix = 'QR-modul-wb';
/*    $date = date('d-m'); */
    $filename = $file_prefix ./* $date .*/ '.php';

    $file_contents = '<!DOCTYPE php>
	<html>
	<head>

	<style>
table, th, td {
  border: 1px solid black;
}

td {
	padding:5px;
}

p {
	background-image:url("bow.gif");
	color: white;
}
body {
  font-family: Arial, sans-serif;
}
b {
	font-size: 30px;
}
y {
	font-size: 8px;
}
</style>
<title>Qatar Container</title>
</head>

<body>
<?php
	$heute = date("d.m.y");
	echo "<h2>Qatar Container Nummern vom " .$heute;"</h2>"
?>


<script>
 function printContent() {
 window.print();
}
 </script>
 
 

<Table style="width:50%">';

        $file_contents .= "<tr>
				<th>QKE/AKE</th>
				<th>Typ</th>
				<!--<th>Stück</th>-->
				<th>QKE/AKE</th>
				<th>Typ</td>
				<!--<th>Stück</th>-->
			</tr>";


    //    $file_contents .= '<tr>
	//			<td colspan="4">QKE/AKE</td>
	//			</tr>';



    for($i=0; $i<8; $i++):
        $first_col = isset($_POST['first_col'][$i]) ? $_POST['first_col'][$i] : '';
        $second_col = isset($_POST['second_col'][$i]) ? $_POST['second_col'][$i] : '';
		//$third_col = isset($_POST['third_col'][$i]) ? $_POST['third_col'][$i] : '';
        $fourth_col = isset($_POST['fourth_col'][$i]) ? $_POST['fourth_col'][$i] : '';
        $fifth_col = isset($_POST['fifth_col'][$i]) ? $_POST['fifth_col'][$i] : '';
		//$sixth_col = isset($_POST['sixth_col'][$i]) ? $_POST['sixth_col'][$i] : '';


        $file_contents .= "<tr>
			<td style='text-align:right'>$first_col</td>
			<td style='text-align:left'>$second_col</td>
		
			<td style='text-align:right'>$fourth_col</td>
			<td style='text-align:left'>$fifth_col</td>
			
		</tr>";
    endfor;

    for($i=0; $i<1; $i++):
		$my_select = isset($POST['my_select']) ? $_POST['my_select'] :'';
		
        $file_contents .= "<tr>
		<td colspan='4' style='text-align:right'>$my_select</td>
		</tr>";
		
	endfor;
	
		$file_contents .= '<tr>
			<td colspan="4" align="center"><h3 style="color:Tomato">Your friendly Qatar TRC</h3>
			Proud member of

			<p><b>N</b><y>asty</y><b>A</b><y>dult</y><b>S</b><y>ex</y><b>A</b><y>dvisors</y></p>
			</td>
		</tr>';

$file_contents .= '<tr>
			<td colspan="4" align="center">
<button onclick="printContent()" >
<h3 style="color:Tomato"> Drucken</h3>
</button>
			</td>
		</tr>';
		
    $file_contents .= '</table>
	
</body></html>';

    file_put_contents($filename, $file_contents);

    echo '<a href="QR-modul-wb.php" target="blank">Nummern gespeichert!</a>';
endif;
?>

<div align="left">&nbsp;</div>
    <Form id="cont" action="QR-modul.php" method="post">



        <Table>
				<tr>
					<td colspan="4">
					<input type="text" name="my_select" value="<?php echo isset($_POST['my_select']) ? $_POST['my_select'] : ''; ?>" maxlength="5" size="5">	
						
						
<!--						<select name="my_select">
							<option value="QR">QR</option>
							<option value="TK">TK</option>
							<option value="AZ">AZ</option>
						</select>
-->
					</td>
				</tr>
            <?php for($i=0; $i<8; $i++): ?>
                <tr>
                    <td style="text-align:right" style="width:15%">
					<input type="text" name="first_col[]" value="<?php echo isset($_POST['first_col'][$i]) ? $_POST['first_col'][$i] : ''; ?>" maxlength="5" size="5">
					</td> 

                    <td style="text-align:left" style="width:10%">
				   
				    <select id="second" name="second_col[]">
						<option value=" "> </option>
						<option value="BTS/BTL">BTS/BTL</option>
						<option value="BTQ">BTQ</option>
						<option value="BTP">BTP</option>
						<option value="BMC">BMC</option>
						<option value="BMC/BTP">BMC/BTP</option>
						<option value="BMC/BTQ">BMC/BTQ</option>
						<option value="BY/BJ">BY/BJ</option>
						<option value="BY">BY</option>
						<option value="Onto">Onto</option>
						<option value="Crew">Crew</option>
					</select>
				   
				    </td>
<!--
					<td style="text-align:left" style="width:5%"><input type="text" name="third_col[]" value="<?php echo isset($_POST['third_col'][$i]) ? $_POST['third_col'][$i] : ''; ?>" maxlength="8" size="8">
					</td>
-->
				   
                    <td style="text-align:right" style="width:15%"><input type="text" name="fourth_col[]" value="<?php echo isset($_POST['fourth_col'][$i]) ? $_POST['fourth_col'][$i] : ''; ?>" maxlength="5" size="5">
					</td>
					
                    <td style="text-align:left" style="width:10%">
					<select id="fifth" name="fifth_col[]">
						<option value=" "> </option>
						<option value="BTS/BTL">BTS/BTL</option>
						<option value="BTQ">BTQ</option>
						<option value="BTP">BTP</option>
						<option value="BMC">BMC</option>
						<option value="BMC/BTP">BMC/BTP</option>
						<option value="BMC/BTQ">BMC/BTQ</option>
						<option value="BY/BJ">BY/BJ</option>
						<option value="BY">BY</option>
						<option value="Onto">Onto</option>
						<option value="Crew">Crew</option>
					</select>
					</td>
	<!--				
					<td style="text-align:left" style="width:5%"><input type="text" name="sixth_col[]" value="<?php echo isset($_POST['sixth_col'][$i]) ? $_POST['sixth_col'][$i] : ''; ?>" maxlength="8" size="8">
					</td>
                    
-->
				</tr>
            <?php endfor; ?>
        </table>
        <br>
        <input type="submit" name="submit" value="Senden an WB">
		<input type="reset" value="reset">
    </form>


</body>
</html>