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
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Student_Search.php">Search Student</a></li>
                                    <?php                                           
                                        echo "<li class='breadcrumb-item'><a href='Student_School.php?student_lrn={$fetch['student_lrn']}'>Student Profile</a></li>";   
                                    ?> 
                                    <li class="breadcrumb-item active" aria-current="page">About School</li>
                                    <li class="breadcrumb-item active" aria-current="page">Additional Info</li>
                                    <li class="breadcrumb-item active" aria-current="page">Family Background</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h2>Father's Information</h2>
                                <hr>
                            </div>    
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Father's name" name="FatherName">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Age</label>
                                        <input type="number" class="form-control" id="inputPassword4" placeholder="Age" name="FatherAge">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Place of Birth</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Place of birth" name="FatherBirth">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Current Address</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Current address" name="FatherCurrent">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Contact Number</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Contact number" name="FatherContact">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Highest Educational Attainment</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Ex. College" name="FatherEducational">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Occupation</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Occupation" name="FatherOccupation">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Business/Company Address</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="123 Street" name="FatherBusiness">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Religion</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Ex. Roman Catholic" name="FatherReligion">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Number of Siblings</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Number of siblings" name="FatherSiblings">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Health Condition</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="FatherHealth">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="Excellent">Excellent</option>
                                            <option value="Very good">Very good</option>
                                            <option value="Good">Good</option>
                                            <option value="Poor">Poor</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Health Problem/s <i>(Put none if none)</i></label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Health problem" name="FatherHealthProblem">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Monthly Income</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="FatherMonthly">
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
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="123 Street . ." name="FatherAddress">
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
                                 <?php
                                        if(isset($_GET['student_lrn']) && !empty($_GET['student_lrn'])) {

                                            $student_lrn = $_GET['student_lrn'];

                                            $sql = "SELECT * FROM student_info WHERE student_lrn = '$student_lrn';";
                                            $query = mysqli_query($connect, $sql);
                                            $fetch = mysqli_fetch_array($query);
                                        }
                                ?>
                                <?php                                           
                                    echo "<a type='button' class='btn btn-success' href='Student_Mother.php?student_lrn={$fetch['student_lrn']}'>Next</a>";   
                                ?>
                                <button type="submit" class="btn btn-primary" name="SubmitBtn">Submit Information</button>
                                </form> 
                            <?php
                                if(isset($_POST['SubmitBtn'])) {  
                                    
                                    $Confirmation = trim($_POST['Confirmation']);
                                    $FatherName = trim($_POST['FatherName']);
                                    $FatherAddress = trim($_POST['FatherAddress']);  
                                    $FatherAge = trim($_POST['FatherAge']);
                                    $FatherBirth = trim($_POST['FatherBirth']);
                                    $FatherCurrent = trim($_POST['FatherCurrent']);
                                    $FatherContact = trim($_POST['FatherContact']);
                                    $FatherEducational = trim($_POST['FatherEducational']);
                                    $FatherOccupation = trim($_POST['FatherOccupation']);
                                    $FatherBusiness = trim($_POST['FatherBusiness']);
                                    $FatherReligion = trim($_POST['FatherReligion']);
                                    $FatherSiblings = trim($_POST['FatherSiblings']);
                                    $FatherHealthProblem = trim($_POST['FatherHealthProblem']);
                                    $FatherMonthly = trim($_POST['FatherMonthly']);
                                    $FatherHealth = trim($_POST['FatherHealth']);
                                    

                                    if(empty($FatherName)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's name </p>";
                                    }elseif(empty($FatherAge)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the Student's father's age </p>";
                                    }elseif(empty($FatherCurrent)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's current address </p>";
                                    }elseif(empty($FatherContact)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's contact number</p>";
                                    }elseif(empty($FatherEducational)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's highest educational attainment </p>";
                                    }elseif(empty($FatherOccupation)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's occupation </p>";
                                    }elseif(empty($FatherBusiness)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's company/business address </p>";
                                    }elseif(empty($FatherReligion)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's religion</p>";
                                    }elseif(empty($FatherSiblings)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's siblings number </p>";
                                    }elseif(empty($FatherHealthProblem)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's health problems </p>";
                                    }elseif(empty($FatherMonthly)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's monthly income </p>";
                                    }elseif(empty($FatherHealth)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's health condition </p>";
                                    }elseif(empty($FatherBirth)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's father's health condition </p>";
                                    }else {
                                        
                                                                            
                                        $sql = "INSERT INTO student_family_father (Name, Age, Birthplace, Current_add, Permanent_add, Contact_number, Highest_edu, Occupation, Company_add, Religion, Sibling_num, Health_condition, Health_problem, Monthly_income, student_lrn)";
                                        $sql .= " VALUES ('$FatherName', '$FatherAge', '$FatherBirth', '$FatherCurrent', '$FatherAddress', '$FatherContact', '$FatherEducational', '$FatherOccupation', '$FatherBusiness', '$FatherReligion', '$FatherSiblings', '$FatherHealth', '$FatherHealthProblem', '$FatherMonthly', '$Confirmation');";
                                        
                                        
                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Information successfully Submited');</script>";
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