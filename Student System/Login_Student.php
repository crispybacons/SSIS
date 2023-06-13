<?php
    include("connect.php");
    session_start();
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
        <div class="container mt-5">
            <div class="col align-self-center">
                <h1 class="page-header">Login</h1>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label>Learners Reference Number</label>
                        <input type="text" class="form-control" placeholder="Learners Reference Number" name="LRN_Number">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="FirstPassword">
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-block" name="LoginBtn">Submit</button>
                </form>
            </div>
            <?php
                if(isset($_POST['LoginBtn'])) {
                    $username = mysqli_real_escape_string($connect, trim($_POST['LRN_Number']));
                    $password = mysqli_real_escape_string($connect, trim($_POST['FirstPassword']));

                    //create a sql statement to check if the username and password are correct, if not correct, show an error message, if correct, redirect the user to the profile page.
                    $sql = "SELECT * FROM student_info  WHERE student_lrn = '$username';";

                            $query = mysqli_query($connect, $sql);
                            $fetch = mysqli_fetch_array($query);

                    if($fetch['student_lrn'] != $username && $fetch['student_lastname'] != $password) {
                        echo "<hr><p class='alert alert-danger' role='alert'> Invalid username/password combination. Please try again </p>";
                    } else {
                        $_SESSION['student_lrn'] = $fetch['student_lrn'];
                        echo "<script> window.location = 'Student_Input_Profile.php?student_lrn={$fetch['student_lrn']}'; </script>";
                    }
                }
            ?>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>