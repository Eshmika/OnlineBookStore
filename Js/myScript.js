function checkPassword(){
	if(document.getElementById("pwd").value != document.getElementById("cnfrmpwd").value){
		alert("Password Mismatch");
		return false;
	}
	else{
		alert("Success");
		return true;
	}
}

function enablebutton(){
	if(document.getElementById("checkbox").checked){
		document.getElementById("submitBtn").disabled=false;
	}
	else{
		document.getElementById("submitBtn").disabled=true;
	}
}

function editField(fieldId){
	var field = document.getElementById(fieldId);
	var currentValue = field.textContent;
	var newValue = prompt('Enter the new value:', currentValue);

	if (newValue !== null && newValue !== '') {
		field.textContent = newValue;
    }
}
	
function trackAccess() {
    var firstAccess = localStorage.getItem('firstAccess');
    var lastAccess = localStorage.getItem('lastAccess');

    if (!firstAccess) {
		// First access
		firstAccess = new Date();
        localStorage.setItem('firstAccess', firstAccess);
    }

    // Last access
    lastAccess = new Date();
    localStorage.setItem('lastAccess', lastAccess);
	
    // Display first and last access information
    document.getElementById('firstAccess').textContent = firstAccess;
    document.getElementById('lastAccess').textContent = lastAccess;
}

