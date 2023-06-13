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
                        <a href="Courses_Search.php" class="list-group-item list-group-item-action">Search Courses</a>
                        <a href="Student_Register.php" class="list-group-item list-group-item-action">Register Student</a>
                        <a href="Add_Courses.php" class="list-group-item list-group-item-action">Add Course</a> 
                        <a href="Student_Enroll.php" class="list-group-item list-group-item-action active">Enroll Student</a>
                        </div>
                    </div>
            </div>
            <div class="col-11 col-md-9">
               <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <nav class="navbar navbar-light bg-light justify-content-between">
                                <a class="navbar-brand">Enroll Student</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect02" name="Courses" required>
                                        <option selected> -- SELECT BELOW --</option>
                                        <?php
                                            $sql = "SELECT * FROM courses";
                                            $query = mysqli_query($connect, $sql);
                                            while($fetch = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value='<?php echo $fetch['course_code']; ?>'> <?php echo $fetch['course_name']; ?> - <?php echo $fetch['course_desc']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">Course</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect02" name="Student" required>
                                        <option selected> -- SELECT BELOW --</option>
                                        <?php
                                            $sql = "SELECT * FROM student_info";
                                            $query = mysqli_query($connect, $sql);
                                            while($fetch = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value='<?php echo $fetch['student_lrn']; ?>'> <?php echo $fetch['student_firstname']; ?> - <?php echo $fetch['student_lastname']; ?>, <?php echo $fetch['student_contact']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">Student</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-md btn-block" name="Enroll_Student">Enroll student</button>
                                <?php
                                    if(isset($_POST['Enroll_Student'])) {
                                        //convert $_POST[] variables into simple PHP variables
                                        $student = $_POST['Student'];
                                        $course = $_POST['Courses'];

                                        $sql = "INSERT INTO `student_course` (student_lrn, course_code, date_enrolled) ";
                                        $sql .= " VALUES ('$student', '$course', '$currentdatetime');";

                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Student has been successfuly enrolled'); </script>";
                                        } else {
                                            echo "<script> alert('Failed to enroll student'); </script>";
                                        }
                                    }
                                ?>
                            </form>    
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