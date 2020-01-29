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
    $success = 0;
    $sub_code = "";
    
    $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_info where reg_no = '$reg_no'");
    if(mysqli_num_rows($user_query) > 0)
    {
        while( $row = mysqli_fetch_array( $user_query) )
        {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $dept = $row['dept'];
            $contact = $row['contact_no'];
        }
    }

    $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_semester where reg_no = '$reg_no'");
    if(mysqli_num_rows($user_query) > 0)
    {
        while( $row = mysqli_fetch_array( $user_query) )
        {
            $lavel = $row['lavel'];
            $term = $row['term'];
        }
    }

    if(isset($_POST['logout_btn']))
    {
        
        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Delete from temp_add where reg_no = '$reg_no'");
        session_destroy();
        header('Location: index.php');
    }

    
    if( isset($_POST['add_btn']) )
    {
        $sub_code = $_POST['sub_code'];
        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from course_list where dept = '$dept' and course_code = '$sub_code'");
        
        $row = mysqli_fetch_array( $user_query );
        $c_t = $row[ 'course_title' ];
        $c_c = $_POST['sub_code'];
        
        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"INSERT INTO temp_add( reg_no , course_code , course_name ) VALUES ('$reg_no' , '$c_c','$c_t')");
                                                        
    }

    if( isset($_POST['submit_btn']) )
    {
        if( !empty( $_POST['sub_code'] ) ){
            $sub_code = $_POST['sub_code'];
        }
        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from temp_add");
        
        
        while( $row = mysqli_fetch_array( $user_query ) ){
            $c_n = $row['course_name'];
            $c_c = $row['course_code'];
            $query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"INSERT INTO student_reg( reg_no , course_code , course_name , status) VALUES ('$reg_no' , '$c_c','$c_n' , 'unread')");
            $success = 1;
            
            
        }
        $query1 = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Delete from temp_add where reg_no = '$reg_no'");
        
                                                        
    }


    
    $succ = 0;
    $err = 0;
     if( isset($_POST['edit_btn']) && !empty( $_POST['e_pass'] ) )
    {
         $user_query =  mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_login where reg_no = '$reg_no'");
         
         $row = mysqli_fetch_array( $user_query );
         
         $p = $row['s_password'];
         
        if( $_POST['e_pass'] ==$p )
        {
            if( !empty($_POST['e_fname'] ) )
            {
                $a = $_POST['e_fname'];
                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Update student_info set first_name='$a' where reg_no='$reg_no'");
                if( $user_query )
                {
                    $succ = 1; // First Name Changed
                }
                else
                {
                    $err = 1;   // First Name Update Failed
                }
            }
            if( !empty($_POST['e_lname'] ) )
            {
                $b = $_POST['e_lname'];
                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Update student_info set last_name='$b' where reg_no='$reg_no'");
                if( $user_query )
                {
                    $succ = 2; // Last name
                }
                else
                {
                    $err = 2; // Failed Last NAME
                }
            }
            if( !empty($_POST['e_email'] ) )
            {
                $c = $_POST['e_email'];
                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Update student_info set email='$c' where reg_no='$reg_no'");
                if( $user_query )
                {
                    $succ = 3; // Email
                }
                else
                {
                    $err = 3; // Failed Email
                }
            }
            if( !empty($_POST['e_contact'] ) )
            {
                $d = $_POST['e_contact'];
                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Update student_info set contact_no='$d' where reg_no='$reg_no'");
                if( $user_query )
                {
                    $succ = 4; // Phone Number
                } 
                else
                {
                    $err = 4; // Failed Phone No
                }
            }
            
            if( !empty($_POST['en_pass'] ) && !empty($_POST['enr_pass'] ) )
            {
                $h = $_POST['en_pass'];
                $i = $_POST['enr_pass'];
                
                if( $h == $i ){
                    $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Update student_login set s_password='$h' where reg_no='$reg_no'");
                    if( $user_query )
                    {
                        
                        $succ = 5; // New Password
                    }
                    else
                    {
                        $err = 5; // Failed
                    }
                }
            }
            if( $succ== 5 )
                exit(header("Location: index.php"));
        }
         else
         {
             $err = -12;
         }
         
        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_info where reg_no = '$reg_no'");
        if(mysqli_num_rows($user_query) > 0)
        {
            while( $row = mysqli_fetch_array( $user_query) )
            {
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $dept = $row['dept'];
                $contact = $row['contact_no'];
            }
        }

        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_semester where reg_no = '$reg_no'");
        if(mysqli_num_rows($user_query) > 0)
        {
            while( $row = mysqli_fetch_array( $user_query) )
            {
                $lavel = $row['lavel'];
                $term = $row['term'];
            }
        }
     }
    else if( isset($_POST['edit_btn']) && empty( $_POST['e_pass'] )  )
    {
        $err = -10; // Current Password empty
    }


   
?>
<html>

<head>
    <title>Repeat Exam Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css?family=Gelasio&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 leftside">
                <!-- Left -->
                <div class="continer-fluid">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 text-center">
                            <!-- Image -->
                            <img src="css/images/dummy.png" width="120px" height="120px" style="margin-top: 20px; border: 2px solid white; border-radius: 50%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-center info">
                            <!-- Info -->
                            <hr style="opacity: 0.5;">
                            <?php
                                echo '<div>';
                                    echo '<h4>'.$first_name.' '.$last_name.'</h4>';
                                    echo '<h5>Reg No : '.$reg_no.'</h5>';
                                    echo '<h5>Department : '.$dept.'</h5>';
                                    echo '<h5>Semester : '.$lavel.'-'.$term.'</h5>';
                                    echo '<h5>Email : '.$email.'</h5>';
                                    echo '<h5>Contact : '.$contact.'</h5>';
                                echo '</div>';   
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 notification">
                            <!-- Notification -->
                            <?php
                                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_notification where reg_no = '$reg_no'");
                                
                                while( $row = mysqli_fetch_array( $user_query ) )
                                {
                                    echo '<div class = "notif-content">';
                                    echo '<p>'.$row['notification'].'</p>';
                                    echo '<a style = "margin-left: 70%;">mark as read</a>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <br>
                        <div class="col-sm-4 col-sm-offset-4 text-center">
                            <!-- Logout -->

                            <form action="" method="post">
                                <button type="submit" class="btn btn-primary" name="logout_btn">Log out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <!-- right -->
                <br>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#menu1">Form Submission</a></li>
                    <li><a data-toggle="tab" href="#menu2">Edit Profile</a></li>
                    <span><img src="css/images/logo.png" width="35px" height="35px" style="float: right; display: block;"></span>
                </ul>

                <div class="tab-content">
                    <div id="menu1" class="tab-pane fade in active">

                        <h3 class="text-center">Registration Form Submission</h3><br>

                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-3">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="sub_code" style="color: white; letter-spacing: 2px;">Course Code</label>
                                        <select class="form-control" id="sub_code" name="sub_code">
                                            <!-- php code -->
                                            <?php
                                                $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from course_list where dept = '$dept' and course_code not in (select course_code from student_reg where reg_no = '$reg_no') and course_code not in (select course_code from temp_add where reg_no = '$reg_no') ");

                                                while( $row = mysqli_fetch_array( $user_query ) )
                                                {
                                                    echo '<option>'.$row['course_code'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: black;">

                                            <?php
                                                    $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from temp_add where reg_no = '$reg_no'");
                                                
                                                    while( $row = mysqli_fetch_array( $user_query ) )
                                                    {
                                                        echo '<tr>';
                                                        echo '<td>'.$row['course_code'].'</td>';
                                                        echo '<td>'.$row['course_name'].'</td>';
                                                        echo '</tr>';
                                                    }
                                                    
                                                ?>

                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-success" name="add_btn">Add</button>
                                    <button type="submit" class="btn btn-primary" name="submit_btn">Submit</button>
                                </form>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-3">
                                <form action="generate.php" method="post">
                                    <button type="submit" class="btn btn-warning" name="down_btn">Download</button>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                                <?php
                                if( $success == 1  ){
                                    echo '<div class="alert alert-success text-center">
                                              Sucessfully Generated. Press Download Button to Download Your Application.
                                    </div>';
                                }
                                else if( $success > 1 ){
                                    echo '<div class="alert alert-warning text-center">
                                              Error Occured.
                                    </div>';
                                }
                            ?>
                            </div>
                        </div>
                    </div>

                    <div id="menu2" class="tab-pane fade">


                        <!-- Edit Profile -->


                        <h3 class='text-center'>Edit Profile</h3>
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="e_fname" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="e_lname" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="e_email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="e_contact" placeholder="Contact No">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="e_pass" placeholder="Current Password *">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="New Password" name="en_pass">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Retype New Password" name="enr_pass">
                                    </div>

                                    <p>* Current Password is required to update an information</p>

                                    <button type="submit" class="btn btn-warning" name="edit_btn">Update Profile</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                                    <?php
                                            if( $err > 0 && $err <= 5 ){
                                                echo '<div class="alert alert-danger text-center">
                                                          <strong>Error</strong> Can not Possible to update
                                                </div>';
                                            }
                                            else if( $err == -10 )
                                            {
                                              echo '<div class="alert alert-warning text-center">
                                                        Current Password Field Is Empty 
                                              </div>';
                                            }
                                            else if( $err == -12 )
                                            {
                                                echo '<div class="alert alert-warning text-center">Password Did not matched
                                                </div>';
                                            }
                                            else if( $succ > 0 )
                                            {
                                                echo '<div class="alert alert-success text-center">
                                                        Information Updated Successfully
                                              </div>';
                                            }
                                            
                                        ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
