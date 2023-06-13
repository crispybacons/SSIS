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
                    <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Student_Search.php">Search Student</a></li>
                                    <?php                                           
                                        echo "<li class='breadcrumb-item'><a href='Student_School.php?student_lrn={$fetch['student_lrn']}'>Student Profile</a></li>";   
                                    ?> 
                                    <li class="breadcrumb-item active" aria-current="page">About School</li>
                                    <li class="breadcrumb-item active" aria-current="page">Student Personal Info</li>
                                </ol>
                            </nav>
                        <div class="card-body">
                            <?php
                                $sql = "SELECT * FROM `student_personal`                                          
                                        INNER JOIN student_info ON `student_personal`.`student_lrn` = student_info.student_lrn
                                        WHERE student_personal.student_lrn = '$student_lrn';";

                                $query = mysqli_query($connect, $sql);
                                $fetch = mysqli_fetch_array($query);
                            ?> 
                            <form method="POST" enctype="multipart/form-data">
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
                                <hr>    
                                <div class="form-group">
                                    <label for="inputAddress">Middlename</label>
                                    <input readonly type="text" class="form-control" id="inputAddress" placeholder="<?php echo $fetch['Surname']; ?>" name="Middlename">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Sex</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['Gender']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Nickname</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Nickname']; ?>" name="Nickname">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Civil Status</label>
                                        <input readonly type="text" class="form-control" id="inputAddress" placeholder="<?php echo $fetch['Civil_status']; ?>" name="CivilStatus">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Birth Rank (from <i>Eldest</i>)</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php echo $fetch['Birth_rank']; ?>" name="BirthRank">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Age</label>
                                        <input readonly type="number" class="form-control" id="inputAddress" placeholder="<?php echo $fetch['Age']; ?>" name="Age">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="example-date-input">Date of Birth</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $fetch['Birthday']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Emergency Contact Number</label>
                                        <input readonly type="text" class="form-control" id="inputAddress" placeholder="<?php echo $fetch['Emergency_contact']; ?>" name="EmergencyNumber">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Parents Marital Status</label>
                                    <input class="form-control" type="text" placeholder="<?php echo $fetch['Parents_marital_status']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Place of Birth</label>
                                    <input readonly type="text" class="form-control" id="inputAddress" placeholder="<?php echo $fetch['Birthplace']; ?>" name="PlaceBirth">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Current Address</label>
                                    <input readonly type="text" class="form-control" id="inputAddress" placeholder="<?php echo $fetch['Current_add']; ?>" name="CurrentAdd">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Permanent Address</label>
                                    <input readonly type="text" class="form-control" id="inputAddress" placeholder="<?php echo $fetch['Permanent_add']; ?>" name="PermanentAdd">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Name of Company <i>(to be filled up by employed students only)</i></label>
                                    <input readonly type="text" class="form-control" id="inputAddress" placeholder="<?php if (empty($fetch['Company_name'])) {
                                        echo "Student not employed";
                                    }else {
                                        echo $fetch['Company_name'];
                                    } ?>" name="CompanyName">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Company Address</label>
                                        <input readonly type="text" class="form-control" id="inputAddress" placeholder="<?php if (empty($fetch['Company_add'])) {
                                        echo "Student not employed";
                                    }else {
                                        echo $fetch['Company_add'];
                                    } ?>" name="CompanyAddress">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Designation / Position</label>
                                        <input readonly type="text" class="form-control" id="inputPassword4" placeholder="<?php if (empty($fetch['Company_position'])) {
                                        echo "Student not employed";
                                    }else {
                                        echo $fetch['Company_position'];
                                    } ?>" name="Position">
                                    </div>
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
                                    echo "<a type='button' class='btn btn-success' href='About_Two.php?student_lrn={$fetch['student_lrn']}'>Next</a>";   
                                ?>
                                <?php                                           
                                    echo "<a type='button' class='btn btn-primary' href='Student_Edit_Eight.php?student_lrn={$fetch['student_lrn']}'>Edit</a>";   
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