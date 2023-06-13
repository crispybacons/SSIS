<?php
	// only logged in users can access this page

	// create an if-else statement that checks the $_SESSION['username'];
	session_start();
	if(!isset($_SESSION['Username'])) {
		echo "<script> alert('ACCESS DENIED! Login credentials required'); window.location='login.php' </script>";
		exit();
	}
    
    include("Connect.php");
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
                        <a href="Profile.php" class="list-group-item list-group-item-action">Home</a>
                        <a href="Student_Search.php" class="list-group-item list-group-item-action">Search Student</a>
                        <a href="Courses_Search.php" class="list-group-item list-group-item-action">Search Courses</a>
                        <a href="Student_Register.php" class="list-group-item list-group-item-action">Register Student</a>
                        <a href="#" class="list-group-item list-group-item-action active">Add Course</a>
                        <a href="Student_Enroll.php" class="list-group-item list-group-item-action">Enroll Student</a>
                        </div>
                    </div>
            </div>
            <div class="col-11 col-md-9">
               <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <nav class="navbar navbar-light bg-light justify-content-between">
                                <a class="navbar-brand">Add course</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="inputPassword4">Course name</label>
                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Course name" name="CourseName">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Course code</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Course code" name="CourseCode">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Course Description</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="CourseDesc">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="Academic Track">Academic Track</option>
                                            <option value="Technical-Vocational Track">Technical-Vocational Track</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="AddBtn">Add Course</button>
                            </form> 
                            <?php
                                if(isset($_POST['AddBtn'])) {  
                                    
                                    $CourseDesc = trim($_POST['CourseDesc']);
                                    $CourseCode = trim($_POST['CourseCode']);
                                    $CourseName = trim($_POST['CourseName']);
                                    
                                    if(empty($CourseDesc)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Course description </p>";
                                    }elseif(empty($CourseCode)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the Course code </p>";
                                    }elseif(empty($CourseName)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Course name </p>";
                                    } else {
                                        
                                        $sql = "INSERT INTO courses (course_code, course_name, course_desc)";
                                        $sql .= " VALUES ('$CourseCode', '$CourseName', '$CourseDesc');";

                                                      
                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Course successfully Added'); </script>";
                                        } else {
                                            echo "<script> alert('Failed to Add student'); </script>";
                                        }
                                    }
                                }
                            ?>
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