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
                        <a href="Courses_Search.php" class="list-group-item list-group-item-action active">Search Courses</a>
                        <a href="#" class="list-group-item list-group-item-action">Register Student</a>
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
                                <a class="navbar-brand">Edit courses</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Courses_Search.php">Search Course</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                                </ol>
                             </nav>
                            <?php
                                if(isset($_GET['course_code']) && !empty($_GET['course_code'])) {

                                    $course_code = $_GET['course_code'];

                                    $sql = "SELECT * FROM courses WHERE course_code = '$course_code';";
                                    $query = mysqli_query($connect, $sql);
                                    $fetch = mysqli_fetch_array($query);
                                }
                            ?>	
                            <form method="POST">
                                <div class="form-group">
                                    <label for="inputAddress">Course Description</label>
                                    <input type="text" class="form-control" id="inputAddress" value="<?php echo $fetch['course_desc']; ?>" name="CourseDesc">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Course Name</label>
                                        <input type="text" class="form-control" id="inputEmail4" value="<?php echo $fetch['course_name']; ?>" name="CourseName">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Course Code</label>
                                        <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fetch['course_code']; ?>" name="CourseCode">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="EditBtn">Edit</button>
                            </form> 
                            <?php
                                if(isset($_POST['EditBtn'])) {
                                    //convert $_POST variables into simple variables
                                    $course_code = trim($_POST['CourseCode']);
                                    $course_name = trim($_POST['CourseName']);
                                    $course_desc = trim($_POST['CourseDesc']);

                                    if(empty($course_code)) {
                                        echo "<hr><p class='alert alert-danger' role='alert' style='color:red'> Please enter the Course Code </p>";
                                    }elseif(empty($course_name)) {
                                        echo "<hr><p class='alert alert-danger' role='alert' style='color:red'> Please enter the Course Name </p>";
                                    }elseif(empty($course_desc)) {
                                        echo "<hr><p class='alert alert-danger' role='alert' style='color:red'> Please enter the Course Description </p>";
                                    } else {
                                        
                                        $sql = "UPDATE courses SET course_code = '$course_code', course_name = '$course_name', course_desc = '$course_desc'  ";
                                        
                                        $sql .= " WHERE course_code = '{$course_code}'";
                                        

                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Courses successfully updated'); window.location= 'Courses_Search.php'; </script>"
                                            ;
                                        } else {
                                            echo "<script> alert('Failed to update Courses'); window.location= 'showCourse.php'; </script>";
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