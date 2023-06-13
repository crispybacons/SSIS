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
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Middlename" name="Middlename">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Sex</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="Gender">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Nickname</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Nickname" name="Nickname">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Civil Status</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Civil status" name="CivilStatus">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Birth Rank (from <i>Eldest</i>)</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Birth rank" name="BirthRank">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Age</label>
                                        <input type="number" class="form-control" id="inputAddress" placeholder="Age" name="Age">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="example-date-input">Date of Birth</label>
                                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input" name="Birthday">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Emergency Contact Number</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Emergency contact number" name="EmergencyNumber">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Parents Marital Status</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="ParentsStatus">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="Living Together">Living Together</option>
                                            <option value="Permanently Separated">Permanently Separated</option>
                                            <option value="Legally Separated">Legally Separated</option>
                                            <option value="Father with another partner">Father with another partner</option>
                                            <option value="Mother with another partner">Mother with another partner</option>
                                            <option value="Temporay Separated">Temporay Separated</option>
                                            <option value="Parents Remarried">Parents Remarried</option>
                                            <option value="Widow/Widower">Widow/Widower</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Place of Birth</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Place of birth" name="PlaceBirth">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Current Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Current address" name="CurrentAdd">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Permanent Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Permanent address" name="PermanentAdd">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Name of Company <i>(to be filled up by employed students only)</i></label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Name of company" name="CompanyName">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Company Address</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Company address" name="CompanyAddress">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Designation / Position</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Designation / Position" name="Position">
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
                                    $Middlename = trim($_POST['Middlename']);
                                    $Gender = trim($_POST['Gender']);
                                    $Nickname = trim($_POST['Nickname']);
                                    $CivilStatus = trim($_POST['CivilStatus']);
                                    $BirthRank = trim($_POST['BirthRank']);
                                    $Age = trim($_POST['Age']);
                                    $Birthday = trim($_POST['Birthday']);
                                    $PlaceBirth = trim($_POST['PlaceBirth']);
                                    $CurrentAdd = trim($_POST['CurrentAdd']);
                                    $PermanentAdd = trim($_POST['PermanentAdd']);
                                    $CompanyName = trim($_POST['CompanyName']);
                                    $CompanyAddress = trim($_POST['CompanyAddress']);
                                    $Position = trim($_POST['Position']);
                                    $EmergencyNumber = trim($_POST['EmergencyNumber']);
                                    $ParentsStatus = trim($_POST['ParentsStatus']);
                                    
                                    if(empty($Middlename)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Nickname </p>";
                                    }elseif(empty($Gender)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the Student's Middlename </p>";
                                    }elseif(empty($Nickname)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Gender </p>";
                                    }elseif(empty($CivilStatus)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Civil status </p>";
                                    }elseif(empty($BirthRank)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Birth rank </p>";
                                    }
                                    elseif(empty($Birthday)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the Student's Birthdate </p>";
                                    }elseif(empty($CurrentAdd)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Current Address </p>";
                                    }elseif(empty($PermanentAdd)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Permanent Address </p>";
                                    }elseif(empty($EmergencyNumber)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Emergency contact number </p>";
                                    }else 
                                        
                                        $sql = "INSERT INTO student_personal (Surname, Gender, Nickname, Civil_status, Age, Birthday, Birthplace, Parents_marital_status, Emergency_contact, student_lrn)";
                                        $sql .= " VALUES ('$Middlename', '$Gender', '$Nickname', '$CivilStatus', '$Age', '$Birthday', '$PlaceBirth', '$ParentsStatus', '$EmergencyNumber', '$Confirmation');";
                                        
                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Information successfully Submited'); window.location = 'Student_Input_Father.php?student_lrn={$Confirmation}';</script>";
                                        } else {
                                            echo "<script> alert('Failed to register student'); </script>";
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