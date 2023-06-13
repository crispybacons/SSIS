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
                                <h2>Mother's Information</h2>
                                <hr>
                            </div>    
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Mother's name" name="MotherName">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Age</label>
                                        <input type="number" class="form-control" id="inputPassword4" placeholder="Age" name="MotherAge">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Place of Birth</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Place of birth" name="MotherBirth">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Current Address</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Current address" name="MotherCurrent">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Contact Number</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Contact number" name="MotherContact">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Highest Educational Attainment</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Ex. College" name="MotherEducational">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Occupation</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Occupation" name="MotherOccupation">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Business/Company Address</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="123 Street" name="MotherBusiness">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Religion</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Ex. Roman Catholic" name="MotherReligion">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Number of Siblings</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Number of siblings" name="MotherSiblings">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Health Condition</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="MotherHealth">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="Excellent">Excellent</option>
                                            <option value="Very good">Very good</option>
                                            <option value="Good">Good</option>
                                            <option value="Poor">Poor</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Health Problem/s <i>(Put none if none)</i></label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Health problem" name="MotherHealthProblem">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Monthly Income</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="MotherMonthly">
                                        <option selected> -- SELECT BELOW --</option>
                                        <option value="500-999">500-999</option>
                                        <option value="1000-1299">1000-1299</option>
                                        <option value="3000-4999">3000-4999</option>
                                        <option value="5000-6999">5000-6999</option>
                                        <option value="7000-9999">7000-9999</option>
                                        <option value="10000 Above">10000 Above</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label for="inputPassword4">Permanent Address</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="123 Street . ." name="MotherAddress">
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
                                    $MotherName = trim($_POST['MotherName']);
                                    $MotherAddress = trim($_POST['MotherAddress']);  
                                    $MotherAge = trim($_POST['MotherAge']);
                                    $MotherBirth = trim($_POST['MotherBirth']);
                                    $MotherCurrent = trim($_POST['MotherCurrent']);
                                    $MotherContact = trim($_POST['MotherContact']);
                                    $MotherEducational = trim($_POST['MotherEducational']);
                                    $MotherOccupation = trim($_POST['MotherOccupation']);
                                    $MotherBusiness = trim($_POST['MotherBusiness']);
                                    $MotherReligion = trim($_POST['MotherReligion']);
                                    $MotherSiblings = trim($_POST['MotherSiblings']);
                                    $MotherHealthProblem = trim($_POST['MotherHealthProblem']);
                                    $MotherMonthly = trim($_POST['MotherMonthly']);
                                    $MotherHealth = trim($_POST['MotherHealth']);
                                    

                                    if(empty($MotherName)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's name </p>";
                                    }elseif(empty($MotherAge)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the Student's Mother's age </p>";
                                    }elseif(empty($MotherCurrent)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's current address </p>";
                                    }elseif(empty($MotherContact)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's contact number</p>";
                                    }elseif(empty($MotherEducational)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's highest educational attainment </p>";
                                    }elseif(empty($MotherReligion)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's religion</p>";
                                    }elseif(empty($MotherSiblings)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's siblings number </p>";
                                    }elseif(empty($MotherHealthProblem)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's health problems </p>";
                                    }elseif(empty($MotherMonthly)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's monthly income </p>";
                                    }elseif(empty($MotherHealth)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's health condition </p>";
                                    }elseif(empty($MotherBirth)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Mother's health condition </p>";
                                    }else {
                                        
                                                                            
                                        $sql = "INSERT INTO student_family_Mother (Name, Age, Birthplace, Current_add, Permanent_add, Contact_number, Highest_edu, Occupation, Company_add, Religion, Sibling_num, Health_condition, Health_problem, Monthly_income, student_lrn)";
                                        $sql .= " VALUES ('$MotherName', '$MotherAge', '$MotherBirth', '$MotherCurrent', '$MotherAddress', '$MotherContact', '$MotherEducational', '$MotherOccupation', '$MotherBusiness', '$MotherReligion', '$MotherSiblings', '$MotherHealth', '$MotherHealthProblem', '$MotherMonthly', '$Confirmation');";
                                        
                                        
                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Information successfully Submited'); window.location = 'Student_Input_Siblings.php?student_lrn={$Confirmation}';</script>";
                                        } else {
                                            echo "<script> alert('Failed to Submit information');</script>";
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