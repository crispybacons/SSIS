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
        <?php
            $sql = "SELECT * FROM `student_education_background`                                          
                    INNER JOIN student_info ON `student_education_background`.`student_lrn` = student_info.student_lrn
                    WHERE student_education_background.student_lrn = '$student_lrn';";

                        $query = mysqli_query($connect, $sql);
                        $fetch = mysqli_fetch_array($query);
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
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Student_Search.php">Search Student</a></li>
                                    <?php                                           
                                        echo "<li class='breadcrumb-item'><a href='Student_School.php?student_lrn={$fetch['student_lrn']}'>Student Profile</a></li>";   
                                    ?> 
                                    <li class="breadcrumb-item active" aria-current="page">About School</li>
                                    <li class="breadcrumb-item active" aria-current="page">Additional Info</li>
                                    <li class="breadcrumb-item active" aria-current="page">Family Background</li>
                                    <li class="breadcrumb-item active" aria-current="page">Educational Background</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h2>Student Educational Background</h2>
                                <hr>
                            </div>    
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">School <i><small>(Elementary Level)</small></i></label>
                                        <input type="text" class="form-control" id="inputEmail4" value="<?php echo $fetch['Elementary']; ?>" name="School1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Year Graduated <i><small>(Elementary Level)</small></i></label>
                                        <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fetch['Elementary_year']; ?>" name="Graduated1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Honors/Awards <i>(Put none if none)</i> <i><small>(Elementary Level)</small></i></label>
                                        <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fetch['Elementary_awards']; ?>" name="Honors1">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">School <i><small>(Junior-High Level)</small></i></label>
                                        <input type="text" class="form-control" id="inputEmail4" value="<?php echo $fetch['Junior_high']; ?>" name="School2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Year Graduated <i><small>(Junior-High Level)</small></i></label>
                                        <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fetch['Junior_high_year']; ?>" name="Graduated2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Honors/Awards <i>(Put none if none)</i> <i><small>(Junior-High Level)</small></i></label>
                                        <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fetch['Junior_high_awards']; ?>" name="Honors2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <?php
                                            $sql = "SELECT * FROM student_info";
                                            $query = mysqli_query($connect, $sql);
                                            while($fetch = mysqli_fetch_array($query)) {
                                        ?>
                                        <input class="form-check-input" type="radio" id="gridCheck" value="<?php echo $fetch['student_lrn']; ?>" name="Confirmation" required>
                                        <?php
                                            }
                                        ?>
                                        <label class="form-check-label" for="gridCheck">
                                            Confirm informations
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="SubmitBtn">Edit Information</button>
                                </form> 
                            <?php
                                if(isset($_POST['SubmitBtn'])) {  
                                    
                                    $Confirmation = trim($_POST['Confirmation']);
                                    $School1 = trim($_POST['School1']);
                                    $Graduated1 = trim($_POST['Graduated1']);  
                                    $Honors1 = trim($_POST['Honors1']);
                                    $School2 = trim($_POST['School2']);
                                    $Graduated2 = trim($_POST['Graduated2']);  
                                    $Honors2 = trim($_POST['Honors2']);
                                    

                                    if(empty($School1)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the school name</p>";
                                    }elseif(empty($Graduated1)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the year graduated</p>";
                                    }elseif(empty($Honors1)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter none if you don't have award </p>";
                                    }else {
                                        
                                        $sql = "UPDATE student_education_background SET Elementary = '$School1', Junior_high = '$School2', Elementary_year = '$Graduated1', Junior_high_year = '$Graduated2', Elementary_awards = '$Honors1', Junior_high_awards = '$Honors2', student_lrn = '$Confirmation'";
                                        
                                        
                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Information successfully Submited'); 
                                                window.location='About_Five.php?student_lrn={$Confirmation}';</script>";
                                        } else {
                                            echo "<script> alert('Failed to Submit information'); </script>";
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