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
            <a class="btn btn-outline-danger my-2 my-sm-0" type="submit" href="Logout.php">Sign out</a>
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
                                <h2>Mother's Information</h2>
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
                                    $sql = "SELECT * FROM `student_family_mother`                                          
                                            INNER JOIN student_info ON `student_family_mother`.`student_lrn` = student_info.student_lrn
                                            WHERE student_family_mother.student_lrn = '$student_lrn';";

                                    $query = mysqli_query($connect, $sql);
                                    $fetch = mysqli_fetch_array($query);
                            ?>  
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Name</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Name']; ?>" name="motherName">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Age</label>
                                        <input readonly type="number" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Age']; ?>" name="motherAge">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Place of Birth</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Birthplace']; ?>" name="motherBirth">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Current Address</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Current_add']; ?>" name="motherCurrent">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Contact Number</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Contact_number']; ?>" name="motherContact">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Highest Educational Attainment</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Highest_edu']; ?>" name="motherEducational">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Occupation</label>
                                        <input  readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Occupation']; ?>" name="motherOccupation">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Business/Company Address</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Company_add']; ?>" name="motherBusiness">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Religion</label>
                                        <input readonly type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $fetch['Religion']; ?>" name="motherReligion">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Number of Siblings</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Sibling_num']; ?>" name="motherSiblings">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Health Condition</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Health_condition']; ?>" name="motherSiblings">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Health Problem/s <i>(Put none if none)</i></label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Health_problem']; ?>" name="motherHealthProblem">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Monthly Income</label>
                                    <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Monthly_income']; ?>" name="motherSiblings">
                                </div>
                                <div class="form-group">
                                        <label for="inputPassword4">Permanent Address</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Permanent_add']; ?>" name="motherAddress">
                                </div>
                                <?php                                           
                                    echo "<a type='button' class='btn btn-success' href='About_Four.php?student_lrn={$fetch['student_lrn']}'>Next</a>";   
                                ?>
                                <?php                                           
                                    echo "<a type='button' class='btn btn-primary' href='Student_Edit_Three.php?student_lrn={$fetch['student_lrn']}'>Edit</a>";   
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