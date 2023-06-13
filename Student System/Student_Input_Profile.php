<?php
	// only logged in users can access this page

	// create an if-else statement that checks the $_SESSION['username'];
	session_start();
	if(!isset($_SESSION['student_lrn'])) {
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
            <a class="btn btn-outline-danger my-2 my-sm-0" type="submit" href="Logout_student.php">Sign out</a>
        </nav>
        <div class="row mt-4 mb-4">
            <div class="col-11 col-md-12">
               <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
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
                                    <label for="inputAddress">Learners Reference Number</label>
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
                                    echo "<a type='button' class='btn btn-warning' href='Student_Input_School.php?student_lrn={$fetch['student_lrn']}'>Add Information</a>";   
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