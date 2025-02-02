<!DOCTYPE html>
<html>


<head>
    <title>Delta Fuel</title>
	
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
	<link rel="stylesheet" href="styles_modul.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- neues Script by id -->






</head>
<body>



<?php

		$heute = date("d.m.y");

if(isset($_POST['submit'])):
    $file_prefix = 'delta-fuel-wb';
/*    $date = date('d-m'); */
    $filename = $file_prefix ./* $date .*/ '.php';

    $file_contents = 
'<!DOCTYPE php>
<html>
<head>
	<title>Delta Fuel</title>

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
								echo "<h3> Delta Fuel <mark>" .$heute;"</mark></h3>"?>
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

<Table style="white-space:nowrap;">';

        $file_contents .= "<!--<tr>
				<th width='100px' class='cell-white'>LM - Actual</th>
				<th width='100px' class='cell-white'>RM - Actual</th>
			 <th width='100px' class='cell-white'>CA - Actual</th>
				<th width='100px' class='cell-white'>Total actual pounds on board</th>
				<th width='100px' class='cell-white'>Equal pounds added</th>
				<th width='100px' class='cell-white'>Gallons pumped</th>
				<th width='100px' class='cell-white'>Beleg Nr.</th>
				<th width='100px' class='cell-white'>Litres</th>
				<th width='100px' class='cell-white'>more</th>
			</tr>-->";


    //    $file_contents .= '<tr>
	//			<td colspan="4">QKE/AKE</td>
	//			</tr>';



    for($i=0; $i<1; $i++):
        $first_col = isset($_POST['first_col'][$i]) ? $_POST['first_col'][$i] : '';
        $second_col = isset($_POST['second_col'][$i]) ? $_POST['second_col'][$i] : '';
					 $third_col = isset($_POST['third_col'][$i]) ? $_POST['third_col'][$i] : '';
//     $fourth_col = isset($_POST['fourth_col'][$i]) ? $_POST['fourth_col'][$i] : ''; //
        $fifth_col = isset($_POST['fifth_col'][$i]) ? $_POST['fifth_col'][$i] : '';
					 $sixth_col = isset($_POST['sixth_col'][$i]) ? $_POST['sixth_col'][$i] : '';
					 $seventh_col = isset($_POST['seventh_col'][$i]) ? $_POST['seventh_col'][$i] : '';
					 $eighth_col = isset($_POST['eighth_col'][$i]) ? $_POST['eighth_col'][$i] : '';
					 $nineth_col = isset($_POST['nineth_col'][$i]) ? $_POST['nineth_col'][$i] : '';
					 $tenth_col = isset($_POST['tenth_col'][$i]) ? $_POST['tenth_col'][$i] : '';


        $file_contents .= "<tr>
			<td width='100px'>Flight#</td>
			<td style='text-align:center' class='cell-white'>$tenth_col</td>

		</tr><tr>
			<td width:'100px'>LM - Actual</td>
			<td style='text-align:right' class='cell-white'>$first_col</td>
		</tr><tr>
			<td width='100px'>RM - Actual</td>
			<td style='text-align:right' class='cell-white'>$second_col</td>
		</tr><tr>
			<td width='100px'>CA - Actual</td>
			<td style='text-align:right' class='cell-white'>$third_col</td>
		</tr><tr>
			<td width='100px'>Total actual pounds on board</td>
			<td style='text-align:right' class='cell-white'>$fifth_col</td>
		</tr><tr>
			<td width='100px'>Equal pounds added</td>
			<td style='text-align:right' class='cell-white'>$sixth_col</td>
		</tr><tr>
			<td width='100px'>Gallons pumped</td>
			<td style='text-align:right' class='cell-white'>$seventh_col</td>
		</tr><tr>
			<td width='100px'>Beleg Nr.</td>
			<td style='text-align:right' class='cell-white'>$eighth_col</td>
		</tr><tr>
			<td width='100px'>Litres</td>
			<td style='text-align:right' class='cell-white'>$nineth_col</td>
		</tr>";
    endfor;

    for($i=0; $i<1; $i++):
		$airline = isset($POST['airline'][$i]) ? $_POST['airline'][$i] :'';
		
        $file_contents .= "<tr>
		<td colspan='6' style='text-align:right' class='cell-white'>$airline</td>
		</tr>";
		
	endfor;
	
		$file_contents .= '<tr>
			<td colspan="6" align="center" class="cell-white"><h2 style="color:Tomato"> Your friendly Delta TRC</h2>
			Proud member of

			<p><b>N</b><y>asty</y><b>A</b><y>dult</y><b>S</b><y>ex</y><b>A</b><y>dvisors</y></p>
			</td>
		</tr>';

$file_contents .= '<tr>
<!--			<td colspan="6" align="center">-->
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

    file_put_contents($filename, $file_contents);?>
<div class="col-sm-6 bg-default">
	<div>
		<div>
			<div class="block-text-module">
				<div class="text">
					<div class="container-fluid layout-container">
						<div class="layout-row">
							<div class="gesendet-klein">
<?php echo '<a href="delta-fuel-wb.php" target="blank">&nbsp;Nummern gespeichert!</a>
							</div>
						</div>
					</div>
				</div>
    
			</div>

		</div>
    </div>

</div>';
endif;?>

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
    <Form id="cont" action="delta-fuel.php" method="post">




<div class="col-sm-4 bg-highlight">

        <Table>
            <?php for($i=0; $i<1; $i++): ?>

											<tr>
														<td>
														Flight#
														</td>

														<td style="text-align:left" style="width:5%"><input type="text" id="tenth" name="tenth_col[]" value="<?php echo isset($_POST['tenth_col'][$i]) ? $_POST['tenth_col'][$i] : ''; ?>" maxlength="4" size="6" inputmode="decimal">
														</td>
											</tr>

                <tr>

                    <td style="text-align:left" style="width:10%">
													 LM - Actual
												   </td>
                		 <td style="text-align:right" style="width:15%"><input type="text" id="first" name="first_col[]" value="<?php echo isset($_POST['first_col'][$i]) ? $_POST['first_col'][$i] : ''; ?>" maxlength="5" size="6" inputmode="decimal">
														</td> 
					</tr>

					<tr>
                  <td style="text-align:left" style="width:10%">
												 RM - Actual
												 </td>

      								 <td style="text-align:right" style="width:15%"><input type="text" id="second" name="second_col[]" value="<?php echo isset($_POST['second_col'][$i]) ? $_POST['second_col'][$i] : ''; ?>" maxlength="5" size="6" inputmode="decimal">
											  </td>
					</tr>

					<tr>
                  <td style="text-align:left" style="width:10%">
												 CA - Actual
												 </td>

							<td style="text-align:right" style="width:15%"><input type="text" id="third" name="third_col[]" value="<?php echo isset($_POST['third_col'][$i]) ? $_POST['third_col'][$i] : ''; ?>" maxlength="5" size="6" inputmode="decimal">
					</td>     

				</tr>

<!--
				<tr>
                  <td style="text-align:center" style="width:10%">
												 <b>Total Dispatch Pounds</b>
												 </td>

							<td style="text-align:right" style="width:5%"><input type="text" id="fourth" name="fourth_col[]" value="<?php echo isset($_POST['fourth_col'][$i]) ? $_POST['fourth_col'][$i] : ''; ?>" maxlength="6" size="6" inputmode="decimal">
					</td>
</tr>
-->

				<tr>
                 <td style="text-align:left" style="width:10%">
												Total actual pounds on board
												</td>

							<td style="text-align:right" style="width:5%"><input type="text" id="output" name="fifth_col[]" value="<?php echo isset($_POST['fifth_col'][$i]) ? $_POST['fifth_col'][$i] : ''; ?>" maxlength="6" size="6" inputmode="decimal">
					</td>
</tr>

				<tr>
                 <td style="text-align:left" style="width:10%">
												Equal pounds added
												</td>

							<td style="text-align:left" style="width:5%"><input type="text" id="sixth" name="sixth_col[]" value="<?php echo isset($_POST['sixth_col'][$i]) ? $_POST['sixth_col'][$i] : ''; ?>" maxlength="6" size="6" inputmode="decimal">
					</td>
</tr>

				<tr>
                <td style="text-align:left" style="width:10%">
											Gallons pumped
											</td>

											<td style="text-align:left" style="width:5%"><input type="text" id="seventh" name="seventh_col[]" value="<?php echo isset($_POST['seventh_col'][$i]) ? $_POST['seventh_col'][$i] : ''; ?>" maxlength="5" size="6" inputmode="decimal">
											</td>
</tr>

		<tr>
                 <td style="text-align:left" style="width:10%">
												Beleg Nr.
												</td>

												<td style="text-align:left" style="width:5%"><input type="text" id="eighth" name="eighth_col[]" value="<?php echo isset($_POST['eighth_col'][$i]) ? $_POST['eighth_col'][$i] : ''; ?>" maxlength="4" size="6" inputmode="decimal">
												</td>
</tr>

		<tr>
                 <td style="text-align:left" style="width:10%">
												Litres
												</td>

							<td style="text-align:left" style="width:5%"><input type="text" id="nineth" name="nineth_col[]" value="<?php echo isset($_POST['nineth_col'][$i]) ? $_POST['nineth_col'][$i] : ''; ?>" maxlength="6" size="6" inputmode="decimal">
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


<!-- Calculate Script Start -->

<script>
$(document).ready(function() {
    $("#first, #second, #third").on("input", function() {
        var first = parseFloat($("#first").val()) || 0;
        var second = parseFloat($("#second").val()) || 0;
        var third = parseFloat($("#third").val()) || 0;

        // Calculate the sum
        var sum = first + second + third;

        // Display the sum in the output field
        $("#output").val(sum.toFixed(0));
    });
});
</script>

<!-- Calculate Script End -->


</body>
</html>
