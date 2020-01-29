<?php
    session_start();
    $reg_no = $_SESSION['reg_no'];
    $first_name = "";
    $last_name = "";
    $email = "";
    $dept = "";
    $contact = "";
    $lavel = "";
    $term = "";
    $advisor = "";
    $Error_No = "";

    if( isset( $_POST['cont_btn'] ) )
    {
        if( !empty( $_POST['first_name'] ) && !empty( $_POST[ 'last_name'] ) && !empty( $_POST['email'] ) && !empty( $_POST['dept'] ) && !empty( $_POST[ 'contact'] ) )
        {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $dept = $_POST['dept'];
            $contact = $_POST['contact'];
               
            if( !empty( $_POST['lavel'] ) && !empty( $_POST[ 'term'] ) )
            {
                
                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Insert into student_info(reg_no,first_name,last_name,email,dept,contact_no) values ('$reg_no','$first_name' ,'$last_name' ,'$email' , '$dept' , '$contact' )");
                
                $lavel = $_POST['lavel'];
                $term = $_POST['term'];

                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Insert into student_semester(reg_no,lavel, term) values ('$reg_no','$lavel' ,'$term' )");
                
                if( !empty($_POST['advisor']) ){
                    $advisor = $_POST['advisor'];
                    $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Insert into student_advisor(reg_no,ad_id) values ('$reg_no','$advisor' )");
                }
                else
                    $Error_No = -1;
                header('Location: profile.php');

            }
            else
            {
                $Error_No = -1; // Error -1 Means one or more field are empty
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
    <title>Information Update</title>

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
                        <img src="css/images/logo.png" height="100px" width="100px" style="margin-top: 30px;">
                    </div>
                </div>
                <!-- Title -->
                <div class="row">
                    <div class="col-sm-12 text-center title">
                        <h3>Basic Information</h3>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <?php
                            if( $Error_No == -1  ){
                                echo '<div class="alert alert-warning text-center">
                                          All fields are required
                                </div>';
                            }
                        ?>
                    </div>
                </div>
                <!-- Information -->
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="sel_dept" style="color: white; letter-spacing: 2px;">Department</label>
                                <select class="form-control" id="sel_dept" name="dept">
                                    <option>CSE</option>
                                    <option>EEE</option>
                                    <option>CE</option>
                                    <option>PHAR</option>
                                    <option>ARCH</option>
                                    <option>BBA</option>
                                    <option>LAW</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel_lavel" style="color: white; letter-spacing: 2px;">Lavel</label>
                                <select class="form-control" id="sel_lavel" name="lavel">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel_term" style="color: white; letter-spacing: 2px;">Term</label>
                                <select class="form-control" id="sel_term" name="term">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel_advisor" style="color: white; letter-spacing: 2px;">Advisor</label>
                                <select class="form-control" id="sel_advisor" name="advisor">
                                    <!-- php code -->
                                    <?php
                                        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from advisor_info");
                                        
                                        while( $row = mysqli_fetch_array( $user_query ) )
                                        {
                                            echo '<option value = "'.$row['ad_id'].'">'.$row['first_name'].' '.$row['last_name'].'( '.$row['dept'].' ) '.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Contact No" name="contact">
                            </div>

                            <div class="text-center">
                                <p style="color: white; letter-spacing: 2px;">All infromation must be provided.</p>

                                <button type="submit" class="btn btn-success" name="cont_btn">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>
