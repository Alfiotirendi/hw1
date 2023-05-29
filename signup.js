function checkUsername(event) {
const input= document.querySelector("#usr");

    if(!/^[a-zA-Z0-9_]{0,15}$/.test(input.value)) {
        document.querySelector('#err').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        event.preventDefault();
       

    } else if (input.value === 0) 
    {
        document.querySelector('#err').textContent = "riempire tutti i campi";
        event.preventDefault();
    }
    
    
    else {
        fetch("check_username.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function jsonCheckUsername(json) {
    // Controllo il campo exists ritornato dal JSON
    if ( !json.exists) {
        document.querySelector('#err').innerHTML = "";
    } else {
        document.querySelector('#err').textContent = "Nome utente già utilizzato";
        event.preventDefault();
  
    }

}


document.querySelector('#formsign').addEventListener('submit', checkUsername);
