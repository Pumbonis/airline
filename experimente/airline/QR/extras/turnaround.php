<!DOCTYPE html>
<html>
<head>
    <title>Timestamp Input</title>
    <script>
        function insertTimestamp(input, button) {
            var now = new Date();
            var hours = String(now.getHours()).padStart(2, '0');
            var minutes = String(now.getMinutes()).padStart(2, '0');
            input.value = hours + ':' + minutes;
            input.readOnly = true;
            button.disabled = true;

        }
    </script>

</head>
<body>

<    <form action="">
        <label for="onRamp">On Ramp:</label>
        <input type="text" id="onRamp" name="onRamp">
        <button type="button" onclick="insertTimestamp(document.getElementById('onRamp'), this)">On Ramp</button><br>

        <label for="offLoadEnd">Offload End:</label>
        <input type="text" id="offEnd" name="offEnd">
        <button type="button" onclick="insertTimestamp(document.getElementById('offEnd'), this)">Offload End</button><br>

        <label for="onLoadStart">Onload Start:</label>
        <input type="text" id="onLoadStart" name="onLoadStart">
        <button type="button" onclick="insertTimestamp(document.getElementById('onLoadStart'), this)">Onload Start</button><br>

        <label for="onLoadEnd">Onload End:</label>
        <input type="text" id="onLoadEnd" name="onLoadEnd">
        <button type="button" onclick="insertTimestamp(document.getElementById('onLoadEnd'), this)">Onload End</button><br>

        <label for="cleanOn">Cleaning On:</label>
        <input type="text" id="cleanOn" name="cleanOn">
        <button type="button" onclick="insertTimestamp(document.getElementById('cleanOn'), this)">Cleaning On</button><br>

        <label for="cleanOff">Cleaning Off:</label>
        <input type="text" id="cleanOff" name="cleanOff">
        <button type="button" onclick="insertTimestamp(document.getElementById('cleanOff'), this)">Cleaning Off</button><br>

        <label for="boardinOK">Boarding OK:</label>
        <input type="text" id="boardOK" name="boardOK">
        <button type="button" onclick="insertTimestamp(document.getElementById('boardOK'), this)">Boarding OK</button><br>

        <label for="paxOn">1. Pax Onboard:</label>
        <input type="text" id="paxOn" name="paxOn">
        <button type="button" onclick="insertTimestamp(document.getElementById('paxOn'), this)">First Pax On</button><br>

    </form>

    
</body>
</html>
