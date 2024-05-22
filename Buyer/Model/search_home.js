function getData(){
    const pname = document.getElementById("search").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        document.getElementById("i1").innerHTML = this.responseText;
    }

    xhttp.open("POST", "../Model/Home.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("search="+pname);

    return false;
}

function getData1(){
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure it: GET-request for the URL
    xhr.open('GET', '../Controllers/wislistAddRem.php', true);

    // Set up a function to handle the response
    xhr.onload = function() {
    // Request finished. Do processing here.
    if (xhr.status >= 200 && xhr.status < 300) {
        // If the request was successful, do something with the response
        console.log(xhr.responseText);
    } else {
        // If there was an error, handle it here
        console.error('Request failed with status', xhr.status);
    }
    };

    // Send the request
    xhr.send();

    return false;
}

function getData2(){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controllers/wislistAddRem.php', true);
    xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {
        console.log(xhr.responseText);
    } else {
        console.error('Request failed with status', xhr.status);
    }
    };
    
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();

    return false;
}