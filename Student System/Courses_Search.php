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
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand"></a>
            <a class="btn btn-outline-danger my-2 my-sm-0" type="button" href="Logout.php">Sign out</a>
        </nav>
        <div class="row mt-4">
            <div class="col-6 col-md-3">
                <div class="container">
                    <div class="list-group">
                        <a href="Profile.php" class="list-group-item list-group-item-action">Home</a>
                        <a href="Student_Search.php" class="list-group-item list-group-item-action">Search Student</a>
                        <a href="Courses_Search.php" class="list-group-item list-group-item-action active">Search Courses</a>
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
                            <nav class="navbar navbar-light bg-light justify-content-between">
                                <a class="navbar-brand">Search Courses</a>
                                <form class="form-inline" method="POST">
                                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="course_search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="SearchBtn">Search</button>
                                </form>
                            </nav>
                        </div>
                        <div class="card-body">
                            <?php
                                 if(isset($_POST['SearchBtn'])) {
                                      //convert $_POST variables into simple PHP variables
                                     $course_search = trim($_POST['course_search']);

                                    $sql = "SELECT * FROM courses
                                                
                                            WHERE course_name LIKE'%$course_search%' OR course_code LIKE'%$course_search%' ORDER BY course_name ASC";
                                    $query = mysqli_query($connect, $sql);
                            ?>
                        
                                <table class="table table-striped">
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Course Description</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th
                            >	</tr>
                            <?php
                                    while($fetch = mysqli_fetch_array($query)) {
                                        echo "<tr>";
                                        echo "<td>" . $fetch['course_code'] . "</td>";
                                        echo "<td>" . $fetch['course_name'] . "</td>";
                                        echo "<td>" . $fetch['course_desc'] . "</td>";
                                        echo "<td><a type='button' class='btn btn-primary'  href='Courses_Edit.php?course_code={$fetch['course_code']}'>Edit</a>"; 
                                        echo "<td><a type='button' class='btn btn-primary'  href='View_Enrolles.php?course_code={$fetch['course_code']}'>View Enrollees</a>";
                                        echo "</tr>";
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