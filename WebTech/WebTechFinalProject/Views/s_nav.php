<html>
<head>
	<style>
        a{
            text-decoration:none;
        }

.dropbtn {

  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  /* z-index: 1; */
}

.dropdown-content a {
  color: black;
  padding: 10px 12px;
  text-decoration: none;
  display: block;
  text-align: left
}

.dropdown-content a:hover {background-color: seagreen;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>

<body>

    <hr>
	<table border="0" width="100%">
		<tr height="50px">
            <td>
                <b><font size="13" color="blue"> <a href="index.php">UniHub </a></font></b>
            </td>

            <?php
                if(isset($_SESSION['id']))
                {
                    echo '<td align="right" style="margin-right:10px">
				            <a href="s_index.php" style="color:#558fd2">Home</a> |
                            <a href="s_profile.php" style="color:#558fd2">Profile</a> |
                            <a href="s_courses.php" style="color:#558fd2">Courses</a> |
                            <a href="s_jobs.php" style="color:#558fd2">Jobs</a> |
                            <a href="s_companies.php" style="color:#558fd2">Companies</a> |
                            <div class="dropdown">
                            <span style="color:#558fd2">Search</span>
                            <div class="dropdown-content">
                            <a href="s_searchInstructors.php">Instructor</a>
                            <a href="s_searchCourses.php">Courses</a>
                            <a href="s_searchCompanies.php">Companies</a>
                            <a href="s_searchStudents.php">Students</a>
                            </div>
                            </div> |
                            <a href="../Controller/s_logout.php" style="color:#558fd2">LogOut</a>
			             </td>
                         ';
                }
                else
                {
                    echo '<td align="right">
                            <a href="s_index.php" style="color:#558fd2">Home</a> |
				            <a href="s_login.php" style="color:#558fd2">LogIn</a> |
                            <a href="s_registration.php" style="color:#558fd2">SignUp</a>
			              </td>
                          ';
                }
            ?>

		</tr>
	</table>
    <p><hr></p>
</body>
</html>
