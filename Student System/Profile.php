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
        <div class="row mt-4">
            <div class="col-6 col-md-3">
                <div class="container">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                            Home
                        </a>
                        <a href="Student_Search.php" class="list-group-item list-group-item-action">Search Student</a>
                        <a href="Courses_Search.php" class="list-group-item list-group-item-action">Search Courses</a>
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
                            <div class="alert alert-dark" role="alert">
                                Welcome Teacher!
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    
                                        $sql = "SELECT * FROM courses";
                                                        
                                        $query = mysqli_query($connect, $sql);
                                    ?>
                                
                                    <table class="table table-striped">
                                    <tr>
                                        <th>Course Name</th>
                                    </tr>
                                    <?php
                                            while($fetch = mysqli_fetch_array($query)) {
                                                echo "<tr>";
                                                echo "<td>" . $fetch['course_name'] . "</td>";
                                                echo "</tr>";
                                            }
                                    ?>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>&nbsp;</th>
                                        </tr>
                                    <?php
		
                                            $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                            WHERE course_code = 'ABM';";
                                            
                                            $query = mysqli_query($connect, $sql);


                                            echo "<tr>";
                                            echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                    <?php
		
                                            $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                            WHERE course_code = 'CA';";
                                            
                                            $query = mysqli_query($connect, $sql);
                                            
                                            echo "<tr>";
                                            echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                    <?php
		
                                            $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                            WHERE course_code = 'CE';";
                                            
                                            $query = mysqli_query($connect, $sql);


                                            echo "<tr>";
                                            echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                    <?php

                                            $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                            WHERE course_code = 'GAS';";
                                            
                                            $query = mysqli_query($connect, $sql);
                                            
                                            echo "<tr>";
                                            echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                    <?php
		
                                            $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                            WHERE course_code = 'HRM';";
                                            
                                            $query = mysqli_query($connect, $sql);


                                            echo "<tr>";
                                            echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                    <?php

                                            $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                            WHERE course_code = 'HUMMS';";
                                            
                                            $query = mysqli_query($connect, $sql);
                                            
                                            echo "<tr>";
                                            echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                    <?php
		
                                            $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                            WHERE course_code = 'IT';";
                                            
                                            $query = mysqli_query($connect, $sql);


                                            echo "<tr>";
                                            echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                    <?php

                                            $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                            WHERE course_code = 'OM';";

                                            $query = mysqli_query($connect, $sql);

                                            echo "<tr>";
                                            echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                    <?php

                                            $sql = "SELECT * FROM student_course
                                                INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                            WHERE course_code = 'PN';";
                                            
                                            $query = mysqli_query($connect, $sql);
                                            
                                            echo "<tr>";
                                            echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                    <?php

                                        $sql = "SELECT * FROM student_course
                                            INNER JOIN student_info ON `student_course`.`student_lrn` = student_info.student_lrn

                                        WHERE course_code = 'STEM';";

                                        $query = mysqli_query($connect, $sql);

                                        echo "<tr>";
                                        echo "<td><strong> Number of students enrolled: ". mysqli_num_rows($query) . "</strong></td>";
                                    ?>
                                </div>    
                            </div>    
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