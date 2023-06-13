<?php
	// only logged in users can access this page

	// create an if-else statement that checks the $_SESSION['username'];
	session_start();
	if(!isset($_SESSION['Username'])) {
		echo "<script> alert('ACCESS DENIED! Login credentials required'); window.location='login.php' </script>";
		exit();
	}
    
    include("Connect.php");
	date_default_timezone_set("Asia/Manila");
	$currentdatetime = date("Y-m-d H:i:s", time());
?>
<!Doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand"></a>
            <a class="btn btn-outline-danger my-2 my-sm-0" type="submit" href="Logout.php">Sign out</a>
        </nav>
        <div class="row mt-4 mb-4">
            <div class="col-6 col-md-3">
                <div class="container">
                    <div class="list-group">
                        <a href="Profile.php" class="list-group-item list-group-item-action">Home</a>
                        <a href="Student_Search.php" class="list-group-item list-group-item-action">Search Student</a>
                        <a href="Courses_Search.php" class="list-group-item list-group-item-action active">Search Courses</a>
                        <a href="Student_Register.php" class="list-group-item list-group-item-action">Register Student</a>
                        <a href="Add_Courses.php" class="list-group-item list-group-item-action">Add Course</a> 
                        <a href="Student_Enroll.php" class="list-group-item list-group-item-action">Enroll Student</a>
                        </div>
                    </div>
            </div>
            <div class="col-11 col-md-9">
               <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <nav class="navbar navbar-light bg-light justify-content-between">
                                <a class="navbar-brand">Enrolled Student</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Courses_Search.php">Search Course</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Enrolled Student</li>
                                </ol>
                            </nav>
                            <table class="table table-striped">
                                <tr>
                                    <th>Learners Reference Number</th>
                                    <th>Student Name</th>
                                     <th>Date Enrolled</th>
                                </tr>    
                                <?php
                                    if(isset($_GET['course_code']) && !empty($_GET['course_code'])) {

                                        $course_code = $_GET['course_code'];


                                        $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                        WHERE course_code = '$course_code';";
                                        
                                        $query = mysqli_query($connect, $sql);


                                        
                                        echo "Number of records: " . mysqli_num_rows($query);
                                            while($fetch = mysqli_fetch_array($query)) {

                                                echo "<tr>";
                                                echo "<td>" . $fetch['student_lrn'] . "</td>";
                                                echo "<td>" . $fetch['student_lastname'] . ", " . $fetch['student_firstname'] . "</td>";
                                                echo "<td>" . $fetch['date_enrolled'] . "</td>";
                                                echo "</tr>";
                                                
                                        }

                                    }
                                ?>  	
                            </table>
                        </div>
                    </div>
               </div>
            </div>
        </div>                          
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>