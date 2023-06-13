<?php
	// only logged in users can access this page

	// create an if-else statement that checks the $_SESSION['username'];
	session_start();
	if(!isset($_SESSION['student_lrn'])) {
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
            <a class="btn btn-outline-danger my-2 my-sm-0" type="submit" href="Logout_student.php">Sign out</a>
        </nav>
        <div class="row mt-4">
            <div class="col-11 col-md-12">
               <div class="container">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h2>Siblings Information</h2>
                                <h5><small>(Please name below the siblings from eldest to youngest inculding yourself)</small></h5>
                                <hr>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Enter none if you do not have any sibling
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <hr>
                            </div>    
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Siblings name" name="SiblingsName1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="School / Place of work" name="SiblingsPlace1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Age" name="SiblingsAge1">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Siblings name" name="SiblingsName2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="School / Place of work" name="SiblingsPlace2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Age" name="SiblingsAge2">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Siblings name" name="SiblingsName3">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="School / Place of work" name="SiblingsPlace3">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Age" name="SiblingsAge3">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Siblings name" name="SiblingsName4">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="School / Place of work" name="SiblingsPlace4">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Age" name="SiblingsAge4">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Siblings name" name="SiblingsName5">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">School/Place of Work</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="School / Place of work" name="SiblingsPlace5">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Age</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Age" name="SiblingsAge5">
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
                                <button type="submit" class="btn btn-primary" name="SubmitBtn">Submit Information</button>
                                </form> 
                            <?php
                                if(isset($_POST['SubmitBtn'])) {  
                                    
                                    $Confirmation = trim($_POST['Confirmation']);
                                    $SiblingsName1 = trim($_POST['SiblingsName1']);
                                    $SiblingsPlace1 = trim($_POST['SiblingsPlace1']);  
                                    $SiblingsAge1 = trim($_POST['SiblingsAge1']);
                                    $SiblingsName2 = trim($_POST['SiblingsName2']);
                                    $SiblingsPlace2 = trim($_POST['SiblingsPlace2']);  
                                    $SiblingsAge2 = trim($_POST['SiblingsAge2']);
                                    $SiblingsName3 = trim($_POST['SiblingsName3']);
                                    $SiblingsPlace3 = trim($_POST['SiblingsPlace3']);  
                                    $SiblingsAge3 = trim($_POST['SiblingsAge3']);
                                    $SiblingsName4 = trim($_POST['SiblingsName4']);
                                    $SiblingsPlace4 = trim($_POST['SiblingsPlace4']);  
                                    $SiblingsAge4 = trim($_POST['SiblingsAge4']);
                                    $SiblingsName5 = trim($_POST['SiblingsName5']);
                                    $SiblingsPlace5 = trim($_POST['SiblingsPlace5']);  
                                    $SiblingsAge5 = trim($_POST['SiblingsAge5']);
                                    

                                    if(empty($SiblingsName1)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the None if you do not have any sibling</p>";
                                    }elseif(empty($SiblingsName1)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the Student's Siblings school/place of work </p>";
                                    }elseif(empty($SiblingsAge1)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Siblings age </p>";
                                    }else {
                                        
                                                                            
                                        $sql = "INSERT INTO student_ranking (Sibling_name, Sibling_name_2, Sibling_name_3, Sibling_name_4, Sibling_name_5, School_work, School_work_2, School_work_3, School_work_4, School_work_5, Age, Age_2, Age_3, Age_4, Age_5, student_lrn)";
                                        $sql .= " VALUES ('$SiblingsName1', '$SiblingsName2', '$SiblingsName3', '$SiblingsName4', '$SiblingsName5', '$SiblingsPlace1', '$SiblingsPlace2', '$SiblingsPlace3', '$SiblingsPlace4', '$SiblingsPlace5', '$SiblingsAge1', '$SiblingsAge2', '$SiblingsAge3', '$SiblingsAge4', '$SiblingsAge5', '$Confirmation');";
                                        
                                        
                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Information successfully Submited'); window.location = 'Student_Input_Education.php?student_lrn={$Confirmation}';</script>";
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