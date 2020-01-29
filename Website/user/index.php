<?php 
    session_start();
    $reg_no = "";
    $s_password = "";
    $Error_No = 0;
    if (isset($_POST['login_btn']))
    {
        if(!empty($_POST['reg_no']) && !empty($_POST['s_password']))
        {
            $reg_no = $_POST['reg_no'];
            $s_password = $_POST['s_password'];
            $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"select * from student_login where reg_no = '$reg_no'");
            while ($row=mysqli_fetch_array($user_query))
            {
                if($row['s_password']==$s_password)
                {
                    $Error_No = 1;
                        break;
                }
            }
            if ($Error_No == 1)
            {
                $_SESSION['reg_no'] = $reg_no;
                header('Location: profile.php');
            }
            else
            {
                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"select * from advisor_login where ad_id = '$reg_no'");
                while ($row=mysqli_fetch_array($user_query))
                {
                    if($row['a_password']==$s_password)
                    {
                        $Error_No = 1;
                            break;
                    }
                }
                if ($Error_No == 1)
                {
                    $_SESSION['reg_no'] = $reg_no;
                    header('Location: ../adviser/profile.php');
                } 
                else{
                    $Error_No = -2;
                }
            }
            
                
        }
        else {
            $Error_No = -1;
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
                                          Username & Password did not matched
                                </div>';
                            }
                        ?>
                    </div>
                </div>
                <br>
                <!-- Login -->
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 text-center">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="reg_no" placeholder="Registration No">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="s_password">
                            </div>
                            <p>Don't have an account?<span><a href="signup.php"> Sign Up</a></span></p>

                            <button type="submit" class="btn btn-primary" name="login_btn">Sign In</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>
