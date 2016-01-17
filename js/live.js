function source(str) {
	if (str.length == 0) {
		document.getElementById('source').innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("source").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "livefrom.php?q=" + str, true);
		xmlhttp.send();
	}
}

function destination(str) {
	if (str.length == 0) {
		document.getElementById('destination').innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("destination").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "liveto.php?q=" + str, true);
		xmlhttp.send();
	}
}