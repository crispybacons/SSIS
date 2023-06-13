<?php
	// only logged in users can access this page

	// create an if-else statement that checks the $_SESSION['username'];
	session_start();
	if(!isset($_SESSION['Username'])) {
		echo "<script> alert('ACCESS DENIED! Login credentials required'); window.location='login.php' </script>";
		exit();
	}
    
    include("Connect.php");
    date_default_timezone_set("Asia/Manila");
	$currentdatetime = date("Y-m-d H:i:s", time());
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
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand"></a>
            <a class="btn btn-outline-danger my-2 my-sm-0" type="submit" href="Logout.php">Sign out</a>
        </nav>
        <div class="row mt-4 mb-4">
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
                                    <li class="breadcrumb-item active" aria-current="page">Student Profile</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($_GET['student_lrn']) && !empty($_GET['student_lrn'])) {

                                    $student_lrn = $_GET['student_lrn'];

                                    $sql = "SELECT * FROM student_info WHERE student_lrn = '$student_lrn';";
                                    $query = mysqli_query($connect, $sql);
                                    $fetch = mysqli_fetch_array($query);
                                }
                            ?>
                            <form>
                                <img src="<?php echo $fetch['student_picture']; ?>" class="rounded mx-auto d-block" alt="...">
                                <hr>
                                <div class="form-group">
                                    <label for="inputAddress">Student Number</label>
                                    <input class="form-control" type="text" placeholder="<?php echo $fetch['student_lrn']; ?>" readonly>
                                </div>
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
                                <div class="form-group">
                                    <label for="inputAddress">Contact Number</label>
                                    <input class="form-control" type="text" placeholder="<?php echo $fetch['student_contact']; ?>" readonly>
                                </div>
                                <?php                                           
                                    echo "<a type='button' class='btn btn-success' href='About_One.php?student_lrn={$fetch['student_lrn']}'>View Complete Information</a>";   
                                ?>
                                <?php
                                    echo "<td><a type='button' class='btn btn-primary' href='Student_Edit_One.php?student_lrn={$fetch['student_lrn']}'>Edit</a>";
                                ?>    
                                <hr>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Warning!</strong> -- Complete your student profile.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
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