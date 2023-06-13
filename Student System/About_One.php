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
                        <a href="Student_Search.php" class="list-group-item list-group-item-action active">Search Student</a>
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
                            <h3>Student Full Information</h3>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($_GET['student_lrn']) && !empty($_GET['student_lrn'])) {

                                    $student_lrn = $_GET['student_lrn'];

                                    $sql = "SELECT * FROM student_info WHERE student_lrn = '$student_lrn';";
                                    $query = mysqli_query($connect, $sql);
                                    $fetch = mysqli_fetch_array($query);
                                }
                            ?>
                            <?php
                                    $sql = "SELECT * FROM `school`                                          
                                            INNER JOIN student_info ON `school`.`student_lrn` = student_info.student_lrn
                                            WHERE school.student_lrn = '$student_lrn';";

                                    $query = mysqli_query($connect, $sql);
                                    $fetch = mysqli_fetch_array($query);
                            ?>
                            <form>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Firstname</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['student_firstname']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Lastname</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['student_lastname']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4">Where did you hear about ICI?</label>
                                    <input class="form-control" type="text" placeholder="<?php echo $fetch['Advertisement']; ?>" readonly>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Who finance your studies?</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['Student_finance']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Student Enrollment Status</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['Student_status']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Student School Status</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['Finance']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Student School Status</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['Student_status']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Where do you currently stay?</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['Student_lodge']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Is this your own choice?</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['Student_choice']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Why did you choose ICI to study?</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['Choice_why']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Contact Number</label>
                                    <input class="form-control" type="text" placeholder="<?php echo $fetch['student_contact']; ?>" readonly>
                                </div>
                                <?php                                           
                                    echo "<a type='button' class='btn btn-success' href='About_Eight.php?student_lrn={$fetch['student_lrn']}'>Next</a>";   
                                ?> 
                                <?php                                           
                                    echo "<a type='button' class='btn btn-primary' href='Student_Edit_Two.php?student_lrn={$fetch['student_lrn']}'>Edit</a>";   
                                ?>  
                                <hr>    
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