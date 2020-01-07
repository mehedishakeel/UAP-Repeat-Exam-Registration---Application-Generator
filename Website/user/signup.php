<?php
    session_start();
    $reg_no = "";
    $s_password = "";
    $c_password = "";
    $Error_No = 0;

    if( isset( $_POST['login_btn'] ) )
    {
        if( !empty( $_POST['reg_no'] ) && !empty( $_POST[ 's_password'] ) && !empty( $_POST['c_password'] ) )
        {
            $reg_no = $_POST['reg_no'];
            $s_password = $_POST['s_password'];
            $c_password = $_POST['c_password'];
            
            if( strcmp( $c_password , $s_password ) == 0 ){
                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Insert into student_login(reg_no,s_password) values ('$reg_no','$s_password')");
                $_SESSION['reg_no'] = $reg_no;
                header('Location: information.php');
            }
            else
            {
                $Error_No = -2; // Error -2 Means That Password And Confirm Password Didn't matched
            }
        }
        else
        {
            $Error_No = -1; // Error -1 Means one or more field are empty
        }
    }
?>
<html>

<head>
    <title>Uap Repeat Exam</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Gelasio&display=swap" rel="stylesheet">
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">

                <!-- Logo -->
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 text-center">
                        <img src="css/images/logo.png" height="130px" width="130px" style="margin-top: 120px;">
                    </div>
                </div>
                <!-- Title -->
                <div class="row">
                    <div class="col-sm-12 text-center title">
                        <h3>Repeat Exam Registration</h3>
                    </div>
                </div>

                <br>
                <div class = "row">
                    <div class = "col-sm-4 col-sm-offset-4">
                        <?php
                            if( $Error_No == -1  ){
                                echo '<div class="alert alert-warning text-center">
                                          All fields are required
                                </div>';
                            }
                            else if( $Error_No == -2  ){
                                echo '<div class="alert alert-warning text-center">
                                          Password did not matched
                                </div>';
                            }
                        ?>
                    </div>
                </div>
                <br>
                <!-- Sign Up -->
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 text-center">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="reg_no" placeholder="Registration No">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="s_password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="c_password">
                            </div>
                            <p>Already have an account?<span><a href="index.php"> Sign In</a></span></p>

                            <button type="submit" class="btn btn-primary" name="login_btn">Sign Up</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>
