<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Fuel Calculation</title>

	<link rel="stylesheet" href="styles_dl.css">

<style>
  /* Global styles */
  {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
  }

  h2 {
    margin-bottom: 20px;
    padding-left: 20px;
  }

  /* Table styles */
  table {
    border-collapse: collapse;
    margin-left: 50px;
    margin-right: auto;
    max-width: 75%;
    width: 70%; 
  }

  th, td {
    text-align: left;
    padding: 8px;
    border: 1px solid black;
  }

  /* Input styles */
  input[type="number"], input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[id="flight"] {
    width: 4em;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: lightgreen;
    font-weight: bold;
} 


  .tankNo {
    width: 4em; /* Ensure the input field is displayed as four characters long */
  }

  .actualDepartureFuel {
    background-color: lightgreen;
    font-weight: bold;
  }

  /* Responsive design */
  @media (max-width: 768px) {
    table {
      font-size: 14px;
    }
    th, td {
      padding: 4px;
    }
    input[type="number"], input[type="text"] {
      padding: 4px;
    }
  }

  @media (max-width: 480px) {
    table {
      font-size: 12px;
    }
    th, td {
      padding: 2px;
    }
    input[type="number"], input[type="text"] {
      padding: 20px;
    }
  }

  #belegNr, #litres, #gallonsPumped, #equalsPoundsAdded, #totalActualPoundsOnBoard  {
    font-weight: bold;
    background-color: lightgreen;
  }
 
</style>
</head>
<body>

<h2>Fuel Calculation</h2>
<form id="fuelForm" method="post" action="save_delta_fuel.php">
  <label for="flight">Flight:</label>
  <input type="number" id="flight" name="flight" maxlength="4" pattern="[0-9]{1,4}" title="Please enter up to 4 digits">
  <button type="submit" name="save">Save Page</button>
  <button type="button" onclick="clearFields()">Clear Fields</button>

  <table id="fuelTable">
    <tr>
      <th>Tank No.</th>
      <th>Requested Departure Fuel</th>
      <th>Actual Departure Fuel</th>
      <th>Actual Arrival Fuel</th>
    </tr>
    <!-- Four additional rows will be added dynamically -->
  </table>

  <table>
    <tr>
      <td>Beleg Nr.</td>
      <td><input type="number" id="belegNr" name="belegNr"></td>
    </tr>
    <tr>
      <td>Litres</td>
      <td><input type="number" id="litres" name="litres"></td>
    </tr>
    <tr>
      <td>Gallons Pumped</td>
      <td><input type="number" id="gallonsPumped" name="gallonsPumped" readonly></td>
    </tr>
    <tr>
      <td>Total Dispatch Pounds</td>
      <td><input type="number" id="totalDispatchPounds" name="totalDispatchPounds" readonly></td>
    </tr>
    <tr>
      <td>Total actual pounds on board</td>
      <td><input type="number" id="totalActualPoundsOnBoard" name="totalActualPoundsOnBoard" readonly></td>
    </tr>
    <tr>
      <td>Subtract total pounds on arrival</td>
      <td><input type="number" id="subtractTotalPoundsOnArrival" name="subtractTotalPoundsOnArrival" readonly></td>
    </tr>
    <tr>
      <td>Equals pounds added</td>
      <td><input type="number" id="equalsPoundsAdded" name="equalsPoundsAdded" readonly></td>
    </tr>
    <tr>
      <td>Divided by actual fuel density LBS/GAL (use 6.70 if not available)</td>
      <td><input type="number" id="dividedByActualFuelDensity" name="dividedByActualFuelDensity" step="0.01" min="0" max="9.99"></td>
    </tr>
    <tr>
      <td>Equals calculated gallons added</td>
      <td><input type="number" id="equalsCalculatedGallonsAdded" name="equalsCalculatedGallonsAdded" readonly></td>
    </tr>
    <tr>
      <td>Subtract total gallons pumped</td>
      <td><input type="number" id="subtractTotalGallonsPumped" name="subtractTotalGallonsPumped" readonly></td>
    </tr>
    <tr>
      <td>Equals difference</td>
      <td><input type="number" id="equalsDifference" name="equalsDifference" readonly></td>
    </tr>
    <tr>
      <td>Allowable difference (tolerance)</td>
      <td><input type="number" id="allowableDifference" name="allowableDifference"></td>
    </tr>
  </table>
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const fuelTable = document.getElementById('fuelTable');
  const rows = 6; // Including the header row
  let tabIndex = 1;

  for (let i = 0; i < rows - 1; i++) {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td><input type="text" class="tankNo" name="tankNo[]" maxlength="3" tabindex="${tabIndex++}"></td>
      <td><input type="number" class="requestedDepartureFuel" name="requestedDepartureFuel[]" tabindex="${tabIndex++}"></td>
      <td><input type="number" class="actualDepartureFuel" name="actualDepartureFuel[]" tabindex="${tabIndex++}"></td>
      <td><input type="number" class="actualArrivalFuel" name="actualArrivalFuel[]" tabindex="${tabIndex++}"></td>
    `;
    fuelTable.appendChild(row);
  }

  const form = document.getElementById('fuelForm');
  form.addEventListener('input', calculateTotals);

  function calculateTotals() {
    const requestedDepartureFuelInputs = document.querySelectorAll('.requestedDepartureFuel');
    const actualDepartureFuelInputs = document.querySelectorAll('.actualDepartureFuel');
    const actualArrivalFuelInputs = document.querySelectorAll('.actualArrivalFuel');
    const litresInput = document.getElementById('litres');
    const gallonsPumpedInput = document.getElementById('gallonsPumped');
    const totalDispatchPounds = document.getElementById('totalDispatchPounds');
    const totalActualPoundsOnBoard = document.getElementById('totalActualPoundsOnBoard');
    const subtractTotalPoundsOnArrival = document.getElementById('subtractTotalPoundsOnArrival');
    const equalsPoundsAdded = document.getElementById('equalsPoundsAdded');
    const equalsCalculatedGallonsAdded = document.getElementById('equalsCalculatedGallonsAdded');
    const subtractTotalGallonsPumped = document.getElementById('subtractTotalGallonsPumped');
    const equalsDifference = document.getElementById('equalsDifference');
    const allowableDifference = document.getElementById('allowableDifference');
    const dividedByActualFuelDensity = parseFloat(document.getElementById('dividedByActualFuelDensity').value) || 6.70;

    let sumRequestedDeparture = 0, sumActualDeparture = 0, sumActualArrival = 0;

    requestedDepartureFuelInputs.forEach(input => sumRequestedDeparture += parseFloat(input.value) || 0);
    actualDepartureFuelInputs.forEach(input => sumActualDeparture += parseFloat(input.value) || 0);
    actualArrivalFuelInputs.forEach(input => sumActualArrival += parseFloat(input.value) || 0);

    totalDispatchPounds.value = sumRequestedDeparture;
    totalActualPoundsOnBoard.value = sumActualDeparture;
    subtractTotalPoundsOnArrival.value = sumActualArrival;
    equalsPoundsAdded.value = sumActualDeparture - sumActualArrival;
    equalsCalculatedGallonsAdded.value = Math.round((sumActualDeparture - sumActualArrival) / dividedByActualFuelDensity);
    gallonsPumpedInput.value = Math.round((parseFloat(litresInput.value) || 0) * 0.26417);
    subtractTotalGallonsPumped.value = parseFloat(gallonsPumpedInput.value) || 0;
    equalsDifference.value = Math.round(subtractTotalGallonsPumped.value - equalsCalculatedGallonsAdded.value);

    // Check if the difference exceeds the allowable tolerance
    const tolerance = parseFloat(allowableDifference.value) || 0;
    if (Math.abs(parseFloat(equalsDifference.value)) > tolerance) {
      equalsDifference.style.backgroundColor = 'red';
    } else {
      equalsDifference.style.backgroundColor = '';
    }
  }

  // Convert input to uppercase
  const tankNoInputs = document.querySelectorAll('.tankNo');
  tankNoInputs.forEach(input => {
    input.addEventListener('input', function() {
      this.value = this.value.toUpperCase();
    });
  });
});

function clearFields() {
  document.getElementById('flight').value = '';
  const inputs = document.querySelectorAll('#fuelForm input');
  inputs.forEach(input => input.value = '');
}



document.addEventListener("DOMContentLoaded", function() {
  const tankNoInputs = document.querySelectorAll('.tankNo');
  
  // Beispielhafte voreingestellte Werte für die Tanknummern
  const presetValues = ['LM', 'RM', 'CA', '.', '..'];

  tankNoInputs.forEach((input, index) => {
    if (index < presetValues.length) {
      input.value = presetValues[index];
    } else {
      input.value = `Tank${index + 1}`; // Fallback für zusätzliche Felder
    }

    input.addEventListener('input', function() {
      this.value = this.value.toUpperCase();
      checkUniqueTankNumbers();
    });
  });

  function checkUniqueTankNumbers() {
    const tankNumbers = [];
    let hasDuplicate = false;

    tankNoInputs.forEach(input => {
      if (input.value) {
        if (tankNumbers.includes(input.value)) {
          hasDuplicate = true;
          input.style.backgroundColor = 'red'; // Markieren Sie das Feld rot bei Duplikaten
        } else {
          tankNumbers.push(input.value);
          input.style.backgroundColor = ''; // Entfernen Sie die Markierung, wenn es kein Duplikat ist
        }
      }
    });

    if (hasDuplicate) {
      alert("Bitte stellen Sie sicher, dass alle Tanknummern einzigartig sind.");
    }
  }
});



</script>
</body>
</html>
