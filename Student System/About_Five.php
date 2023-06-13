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
    

<!Do readonlyctype html>
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
        <?php
                if(isset($_GET['student_lrn']) && !empty($_GET['student_lrn'])) {

                    $student_lrn = $_GET['student_lrn'];

                    $sql = "SELECT * FROM student_info WHERE student_lrn = '$student_lrn';";
                    $query = mysqli_query($connect, $sql);
                    $fetch = mysqli_fetch_array($query);
                }
        ?>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand"></a>
            <a class="btn btn-outline-danger my-2 my-sm-0" readonly type="submit" href="Logout.php">Sign out</a>
        </nav>
        <div class="row mt-4">
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
                            <h2>Student Full Information</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h2>Student Educational Background</h2>
                            </div>
                            <?php
                                if(isset($_GET['student_lrn']) && !empty($_GET['student_lrn'])) {

                                    $student_lrn = $_GET['student_lrn'];

                                    $sql = "SELECT * FROM student_info WHERE student_lrn = '$student_lrn';";
                                    $query = mysqli_query($connect, $sql);
                                    $fetch = mysqli_fetch_array($query);
                                }
                            ?>
                            <?php
                                    $sql = "SELECT * FROM `student_education_background`                                          
                                            INNER JOIN student_info ON `student_education_background`.`student_lrn` = student_info.student_lrn
                                            WHERE student_education_background.student_lrn = '$student_lrn';";

                                    $query = mysqli_query($connect, $sql);
                                    $fetch = mysqli_fetch_array($query);
                            ?>  
                            <form>
                            <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">School</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Elementary']; ?>" name="School1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Year Graduated</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Elementary_year']; ?>" name="Graduated1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Honors/Awards <i>(Put none if none)</i></label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Elementary_awards']; ?>" name="Honors1">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">School</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Junior_high']; ?>" name="School2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Year Graduated</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Junior_high_year']; ?>" name="Graduated2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Honors/Awards <i>(Put none if none)</i></label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Junior_high_awards']; ?>" name="Honors2">
                                    </div>
                                </div>
                                <?php                                           
                                    echo "<a readonly type='button' class='btn btn-success' href='About_Six.php?student_lrn={$fetch['student_lrn']}'>Next</a>";   
                                ?>
                                <?php                                           
                                    echo "<a type='button' class='btn btn-primary' href='Student_Edit_Six.php?student_lrn={$fetch['student_lrn']}'>Edit</a>";   
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