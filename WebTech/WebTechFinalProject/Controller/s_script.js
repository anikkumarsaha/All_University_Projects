
"use strict"
function searchs() {
    let name = document.getElementById('name').value;
    // let types = document.getElementById('type').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', 's_livesearch.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('name=' + name);
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('div1').innerHTML = this.responseText;
        }
        else {
            // document.getElementById('div1').html("Nothing to show yet.");
        }
    }
}


function courses() {
    let course = document.getElementById('course').value;
    // let types = document.getElementById('type').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controllers/s_livesearch.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('course=' + course);
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('div1').innerHTML = this.responseText;
        }
        else {
            // document.getElementById('div1').html("Nothing to show yet.");
        }
    }
}

function companies() {
    let company = document.getElementById('company').value;
    // let types = document.getElementById('type').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controllers/s_livesearch.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('company=' + company);
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('div1').innerHTML = this.responseText;
        }
        else {
            // document.getElementById('div1').html("Nothing to show yet.");
        }
    }
}