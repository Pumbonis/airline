
	document.getElementById('myButton').addEventListener('click', function() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'qr.txt', true);
  xhr.onload = function() {
    if (this.status === 200) {
      var myTextarea = document.getElementById('myTextarea');
      myTextarea.value = this.responseText;
    }
  };
  xhr.send();
});

