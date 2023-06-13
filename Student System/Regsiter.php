<?php
	include("connect.php");
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
                <h1 class="page-header">Registration</h1>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label validationTooltip01>Firstname</label>
                        <input type="text" class="form-control" placeholder="Firstname" name="Firstname">
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" placeholder="Lastname" name="Lastname">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="FirstPassword">
                    </div>
                    <div class="form-group">
                        <label>Repeat password</label>
                        <input type="password" class="form-control" placeholder="Repeat password" name="SecondPassword">
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-block" name="RegisterBtn">Submit</button>
                </form>
            </div>
            <?php
				if(isset($_POST['RegisterBtn'])) {

					$username = mysqli_real_escape_string($connect, trim($_POST['Username']));

					//create a sql statement that checks the username in the database, if found, display an error message, if not, consider the username

					$sql = "SELECT Username FROM accounts WHERE Username = '$username'";
					$query = mysqli_query($connect, $sql);

					if(mysqli_num_rows($query) == 1) {
                        echo "
                            <hr>
                            <div class='alert alert-danger' role='alert'>
                                Username already taken!
                            </div>
                        ";
					} else {
						$password = mysqli_real_escape_string($connect, trim($_POST['FirstPassword']));
						$rpassword = mysqli_real_escape_string($connect, trim($_POST['SecondPassword']));

						//create a sql statement that checks the password fields, if not,  display an error message, if match, continue registration

						if($password != $rpassword) {
                            echo "
                                <hr>
                                <div class='alert alert-danger' role='alert'>
                                    Password does not match!
                                </div>
                            ";
						} else {
                            //insert the registration information to the database
                            $password = password_hash($password, PASSWORD_DEFAULT);
							
							$lastname = mysqli_real_escape_string($connect, trim($_POST['Lastname']));
							$firstname = mysqli_real_escape_string($connect, trim($_POST['Firstname']));

							$sql = " INSERT INTO accounts (Username, Password, Lastname, Firstname) ";
							$sql .= " VALUES ('$username', '$password', '$lastname', '$firstname')";

							if(mysqli_query($connect, $sql)) {
								echo "<script> alert('Account registration completed! You may now login'); window.location='Login.php' </script>";
							} else {
								echo "<script> alert('Account registration failed! Please try again'); window.location='Register.php' </script>";
							}
						}
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