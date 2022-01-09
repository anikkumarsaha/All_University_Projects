<?php 
	session_start();

	include("s_nav.php");


?>

<html>
<head>
	<title>Search</title>

</head>

<body>
        <div align="center">

            <form method="post" action="" >
                    <table style="height:55px;background-color:green">
                        <tr>
                            <h3>Search Instructors</h3>
                        </tr>
                        <tr>
                            <td><input type="text" id="instructor" name="search" placeholder="Type something to search" style="padding: 15px; width: 800px" required onkeyup="instructors()"> </td>
                              </tr>

                    </table>
            </form>
            <div id="div1">

	</div>
        </div>
<script type="text/javascript" >

function instructors() {
    let instructor = document.getElementById('instructor').value;
    // let types = document.getElementById('type').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/s_livesearch.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('instructor=' + instructor);
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('div1').innerHTML = this.responseText;
        }
        else {
            // document.getElementById('div1').html("Nothing to show yet.");
        }
    }
}

</script>

</body>
</html>
