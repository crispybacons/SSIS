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
                                    <li class="breadcrumb-item active" aria-current="page">About School</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-body">
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
                            <form method="POST">
                                <div class="form-group">
                                    <label for="inputAddress">Student LRN</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Student LRN" name="StudentLRN">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Where did you hear about ICI?</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="AboutICI">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="Radio">Radio</option>
                                            <option value="Poster or Tarpulin">Poster or Tarpulin</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="ICI Website">ICI Website</option>
                                            <option value="Friends">Friends</option>
                                            <option value="School Campaign">School Campaign</option>
                                            <option value="Text Campaign">Text Campaign</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Who finance your studies?</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Ex. Parents" name="Finance">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Are you?</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="StatusStudent">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="New">New</option>
                                            <option value="Old">Old</option>
                                            <option value="Transferee">Transferee</option>
                                            <option value="Second Courser">Second Courser</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Are you?</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="StatusWork">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="Working Student">Working Student</option>
                                            <option value="Full-time Student">Full-time Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Where do you currently stay?</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="Living">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="Boarding & Lodging">Boarding & Lodging</option>
                                            <option value="Staying with parents">Staying with parents</option>
                                            <option value="Staying with own house">Staying with own house</option>
                                            <option value="Staying with relative or guardian">Staying with relative or guardian</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Is this your own choice?</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="SchoolChoice">
                                            <option selected> -- SELECT BELOW --</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Why did you choose ICI to study?</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="WhyICI">
                                        <option selected> -- SELECT BELOW --</option>
                                        <option value="Best Quality Education">Best Quality Education</option>
                                        <option value="Low Tuition Fees">Low Tuition Fees</option>
                                        <option value="Updated Facilities">Updated Facilities</option>
                                        <option value="Accessibility to your home">Accessibility to your home</option>
                                    </select>
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
                                    echo "<a type='button' class='btn btn-success' href='Student_Personal.php?student_lrn={$fetch['student_lrn']}'>Next</a>";   
                                ?>
                                <button type="submit" class="btn btn-primary" name="SubmitBtn">Submit Information</button>                 
                            </form>    
                            <?php
                                if(isset($_POST['SubmitBtn'])) {  
                                    
                                    $Confirmation = trim($_POST['Confirmation']);  
                                    $StudentLRN = trim($_POST['StudentLRN']);  
                                    $AboutICI = trim($_POST['AboutICI']);
                                    $StatusStudent = trim($_POST['StatusStudent']);
                                    $StatusWork = trim($_POST['StatusWork']);
                                    $Finance = trim($_POST['Finance']);
                                    $Living = trim($_POST['Living']);
                                    $SchoolChoice = trim($_POST['SchoolChoice']);
                                    $WhyICI = trim($_POST['WhyICI']);

                                    if(empty($StudentLRN)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's LRN </p>";
                                    }elseif(empty($AboutICI)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the Student's Choice </p>";
                                    }elseif(empty($StatusStudent)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Choice </p>";
                                    }elseif(empty($StatusWork)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Choice </p>";
                                    }elseif(empty($Finance)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Choice </p>";
                                    }elseif(empty($Living)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Choice </p>";
                                    }elseif(empty($SchoolChoice)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Choice </p>";
                                    }elseif(empty($WhyICI)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Student's Choice </p>";
                                    }   else {
                                                                            
                                        $sql = "INSERT INTO school (LRN_number, Student_status, Student_finance, Finance, Advertisement, Student_lodge, Student_choice, Choice_why, student_lrn)";
                                        $sql .= " VALUES ('$StudentLRN', '$StatusStudent', '$Finance', '$StatusWork', '$AboutICI', '$Living', '$SchoolChoice', '$WhyICI', '$Confirmation');";
                                        
                                        
                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Information successfully Submited'); </script>";
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