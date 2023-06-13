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
                        <a href="#" class="list-group-item list-group-item-action active">Register Student</a>
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
                                <a class="navbar-brand">Register student</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputAddress">Learners Reference Number</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Learners Reference Number" name="StudentNum">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Firstname</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Firstname" name="StudentFirst">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Lastname</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Lastname" name="StudentLast">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Contact number</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Contact number" name="StudentContact">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="StudentPicture" accept="image/*" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="RegisterBtn">Register</button>
                            </form> 
                            <?php
                                if(isset($_POST['RegisterBtn'])) {  
                                    
                                    $StudentNum = trim($_POST['StudentNum']);
                                    $StudentFirst = trim($_POST['StudentFirst']);
                                    $StudentLast = trim($_POST['StudentLast']);
                                    $StudentContact = trim($_POST['StudentContact']);
                                    
                                    $Filename = $_FILES['StudentPicture']['name'];
                                    $Temp_name = $_FILES['StudentPicture']['tmp_name'];
                                    $Filetype = $_FILES['StudentPicture']['type'];
                                    $Allowed_types = array("image/jpeg", "image/png", "image/gif");

                                    $Destination = "student_image/".time()."-"."$StudentLast-$StudentFirst-".$Filename;

                                    if(empty($StudentNum)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Number </p>";
                                    }elseif(empty($StudentFirst)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the Student's Firstname </p>";
                                    }elseif(empty($StudentLast)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Lastname </p>";
                                    }elseif(empty($StudentContact)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Contact Number </p>";
                                    } elseif(!in_array($Filetype, $Allowed_types)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> File not valid. Only accepts JPEG, JPG, PNG and GIF </p>";
                                    } else {
                                        
                                        $sql = "INSERT INTO student_info (student_lrn, student_firstname, student_lastname, student_contact, student_picture)";
                                        $sql .= " VALUES ('$StudentNum', '$StudentFirst', '$StudentLast', '$StudentContact', '$Destination');";

                                        move_uploaded_file($Temp_name, $Destination);
                                        
                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Student successfully registered'); </script>";
                                        } else {
                                            echo "<script> alert('Failed to register student'); </script>";
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