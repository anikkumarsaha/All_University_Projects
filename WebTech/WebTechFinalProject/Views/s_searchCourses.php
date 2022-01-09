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
                            <h3>Search Courses</h3>
                        </tr>
                        <tr>
                            <td><input type="text" id="course" name="search" placeholder="Type something to search" style="padding: 15px; width: 800px" required onkeyup="courses()"> </td>
                        </tr>

                    </table>
            </form>
            <div id="div1">

	        </div>
        </div>
<script type="text/javascript" src="../Controller/s_script.js">

</script>

</body>
</html>
