function get(){
    const pname = document.getElementById("search").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        document.getElementById("i1").innerHTML = this.responseText;
    }

    xhttp.open("POST", "../Model/Cart.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("search="+pname);

    return false;
}

function get1(){
    const pname = document.getElementById("search").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        document.getElementById("i1").innerHTML = this.responseText;
    }

    xhttp.open("POST", "../Model/RateRev.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("search="+pname);

    return false;
}