
//Anfang Felder nach senden löschen
document.getElementById('clearFields').addEventListener('click', function() {
	const akeqkeFields = document.querySelectorAll('.akeqke');
	const ontoFields = document.querySelectorAll('.onto');

	akeqkeFields.forEach(field => field.value = '');
	ontoFields.forEach(field => field.value = '');
});
//Ende Felder nach senden löschen


//Anfang Bild für reload Button

//document.getElementById("clearFields").innerHTML = `
//	<img src="reload1.png" alt="Clear Fields" class="bild" border="none" />
//`;

//Ende Bild für reload Button


//Anfang Eingaben auf fünf Stellen kürzen
document.getElementById('cont').addEventListener('submit', function(event) {
	var inputs = document.getElementsByClassName('akeqke');
	for (var i = 0; i < inputs.length; i++) {
    var input = inputs[i];
    if (input.value.length >= 8) {
      input.value = input.value.substring(3);
    }
	if (input.value.length >= 7) {
      input.value = input.value.substring(2);
    }
	if (input.value.length >= 6) {
      input.value = input.value.substring(1);
    }
  }
});
//Ende Eingaben auf fünf Stellen kürzen

//Anfang Doppelte Einträge
document.getElementById('cont').addEventListener('submit', function(event) {
    const fields = document.querySelectorAll('.akeqke');
    const values = [];

    fields.forEach(function(field) {
		if (field.value && values.includes(field.value)) {
		alert('Doppelte Nummern. Bitte korrigieren und nochmal senden.'); 
		event.preventDefault();
			return;
        }
		values.push(field.value);
    });
});
//Ende Doppelte Einträge
