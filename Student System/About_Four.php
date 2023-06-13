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
                                <h2>Siblings Information</h2>
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
                                    $sql = "SELECT * FROM `student_ranking`                                          
                                            INNER JOIN student_info ON `student_ranking`.`student_lrn` = student_info.student_lrn
                                            WHERE student_ranking.student_lrn = '$student_lrn';";

                                    $query = mysqli_query($connect, $sql);
                                    $fetch = mysqli_fetch_array($query);
                            ?>  
                            <form>
                            <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Sibling_name']; ?>" name="SiblingsName1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['School_work']; ?>" name="SiblingsPlace1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Age']; ?>" name="SiblingsAge1">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Sibling_name_2']; ?>" name="SiblingsName2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['School_work_2']; ?>" name="SiblingsPlace2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Age_2']; ?>" name="SiblingsAge2">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Sibling_name_3']; ?>" name="SiblingsName3">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['School_work_3']; ?>" name="SiblingsPlace3">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Age_3']; ?>" name="SiblingsAge3">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Sibling_name_4']; ?>" name="SiblingsName4">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['School_work_4']; ?>" name="SiblingsPlace4">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Age_4']; ?>" name="SiblingsAge4">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Sibling_name_5']; ?>" name="SiblingsName5">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['School_work_5']; ?>" name="SiblingsPlace5">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Age_5']; ?>" name="SiblingsAge5">
                                    </div>
                                </div>
                                <?php                                           
                                    echo "<a readonly type='button' class='btn btn-success' href='About_Five.php?student_lrn={$fetch['student_lrn']}'>Next</a>";   
                                ?>
                                 <?php                                           
                                    echo "<a type='button' class='btn btn-primary' href='Student_Edit_Five.php?student_lrn={$fetch['student_lrn']}'>Edit</a>";   
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