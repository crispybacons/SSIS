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
                                <h2>Student Educational Background</h2>
                                <hr>
                            </div>    
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">School <i><small>(Elementary)</small></i></label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Name of School" name="School1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Year Graduated <i><small>(Elementary)</small></i></label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Year Graduated" name="Graduated1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Awards <i>(Put none if none)</i> <i><small>(Elementary)</small></i></label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Honors/Awards" name="Honors1">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">School <i><small>(Junior-High)</small></i></label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Name of School" name="School2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Year Graduated <i><small>(Junior-High)</small></i></label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Year Graduated" name="Graduated2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Awards <i>(Put none if none)</i> <i><small>(Junior-High)</small></i></label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="Honors/Awards" name="Honors2">
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
                                    $School1 = trim($_POST['School1']);
                                    $Graduated1 = trim($_POST['Graduated1']);  
                                    $Honors1 = trim($_POST['Honors1']);
                                    $School2 = trim($_POST['School2']);
                                    $Graduated2 = trim($_POST['Graduated2']);  
                                    $Honors2 = trim($_POST['Honors2']);
                                    

                                    if(empty($School1)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter the school name</p>";
                                    }elseif(empty($Graduated1)) {
                                        echo "<hr><p class='alert alert-danger' role='alert''> Please enter the year graduated</p>";
                                    }elseif(empty($Honors1)) {
                                        echo "<hr><p class='alert alert-danger' role='alert'> Please enter none if you don't have award </p>";
                                    }else {
                                        
                                                                            
                                        $sql = "INSERT INTO student_education_background (Elementary, Junior_high, Elementary_year, Junior_high_year, Elementary_awards, Junior_high_awards, student_lrn)";
                                        $sql .= " VALUES ('$School1', '$School2', '$Graduated1', '$Graduated2', '$Honors1', '$Honors2', '$Confirmation');";
                                        
                                        
                                        if(mysqli_query($connect, $sql)) {
                                            echo "<script> alert('Information successfully Submited'); window.location = 'Student_Input_Org.php?student_lrn={$Confirmation}';</script>";
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