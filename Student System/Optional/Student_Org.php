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
                                    <li class="breadcrumb-item active" aria-current="page">Educational Background</li>
                                    <li class="breadcrumb-item active" aria-current="page">Organization/Extra - Curricular Involvements</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h2>Organization/Extra - Curricular Involvements</h2>
                               <i><p>(Put none if none)</p></i>
                            </div>    
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Name of Organization (Inside school)</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Name of Organization (Inside school)" name="OrganizationInside">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Position / Title</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Position / Title" name="PositionInside">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Name of Organization (Outside school)</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Name of Organization (Outside school)" name="OrganizationOutside">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Position / Title</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Position / Title" name="PositionOutside">
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
                                    $OrganizationInside = trim($_POST['OrganizationInside']);
                                    $PositionInside = trim($_POST['PositionInside']);  
                                    $OrganizationOutside = trim($_POST['OrganizationOutside']);
                                    $PositionOutside = trim($_POST['PositionOutside']); 
                                    

                                    if(empty($OrganizationInside)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Name of Organization (Inside School)</p>";
                                    }elseif(empty($PositionInside)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the Position / Title</p>";
                                    }elseif(empty($OrganizationOutside)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Name of Organization (Outside School) </p>";
                                    }elseif(empty($PositionOutside)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the Position / Title</p>";
                                    }else {
                                        
                                                                            
                                        $sql = "INSERT INTO student_Organization (Org_inside_name, Org_inside_position	, Org_outside_name, Org_outside_position, student_lrn)";
                                        $sql .= " VALUES ('$OrganizationInside', '$PositionInside', '$OrganizationOutside', '$PositionOutside', '$Confirmation');";
                                        
                                        
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