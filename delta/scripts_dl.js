document.addEventListener("DOMContentLoaded", function () {
    const fuelTable = document.getElementById('fuelTable');
    const rows = 6;
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

    document.getElementById('fuelForm').addEventListener('input', calculateTotals);

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

        const tolerance = parseFloat(allowableDifference.value) || 0;
        if (Math.abs(parseFloat(equalsDifference.value)) > tolerance) {
            equalsDifference.style.backgroundColor = 'red';
        } else {
            equalsDifference.style.backgroundColor = '';
        }
    }

    document.querySelectorAll('.tankNo').forEach(input => {
        input.addEventListener('input', function () {
            this.value = this.value.toUpperCase();
            checkUniqueTankNumbers();
        });
    });

    function checkUniqueTankNumbers() {
        const tankNoInputs = document.querySelectorAll('.tankNo');
        const tankNumbers = new Set();
        tankNoInputs.forEach(input => {
            if (input.value && tankNumbers.has(input.value)) {
                input.style.backgroundColor = 'red';
                alert("Bitte stellen Sie sicher, dass alle Tanknummern einzigartig sind.");
            } else {
                input.style.backgroundColor = '';
                tankNumbers.add(input.value);
            }
        });
    }
});

function clearFields() {
    document.getElementById('flight').value = '';
    document.querySelectorAll('#fuelForm input').forEach(input => input.value = '');
}

document.addEventListener("DOMContentLoaded", function () {
    const tankNoInputs = document.querySelectorAll('.tankNo');
    const presetValues = ['LM', 'RM', 'CA', '.', '..'];

    tankNoInputs.forEach((input, index) => {
        if (index < presetValues.length) {
            input.value = presetValues[index];
        } else {
            input.value = `Tank${index + 1}`;
        }

        input.addEventListener('input', function () {
            this.value = this.value.toUpperCase();
            checkUniqueTankNumbers();
        });
    });
});