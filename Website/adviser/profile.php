<?php
    session_start();
    $reg_no = $_SESSION['reg_no'];
    $first_name = "";
    $last_name = "";
    $email = "";
    $dept = "";
    $contact = "";
    
    
    $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"select * from advisor_info where ad_id = '$reg_no'");
    while ($row=mysqli_fetch_array($user_query))
                {
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $dept = $row['dept'];
                $contact = $row['contact_no'];
                }


    
    if(isset($_POST['logout_btn']))
    {
        
        session_destroy();
        header('Location: ../user/index.php');
    }  

        $sname = "";
        $s_rn = "";
      if( isset($_POST['approve_btn']) )
      {
        $s_rn = $_POST['approve_btn'];
        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"UPDATE student_reg SET status = 'approved' WHERE reg_no = '$s_rn'");
        $n_id = 0;
        if( $user_query )
        {
            $query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_notification");
            while( $row = mysqli_fetch_array( $query ) ){
            
            $n_id = $n_id + 1;
        }
        $n_id = $n_id + 1;
            $msg = "Your Request Has Been Approved By Your Advisor ".$first_name." ".$last_name." ";
            $query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Insert into student_notification(n_id ,    reg_no , notification   , stat ) values ('$n_id' , '$s_rn' , '$msg' , 'no')");
            // echo '<script>alert("'.$query.'");</script>';

        }
      }

      if( isset($_POST['reject_btn']) )
      {
        $s_rn = $_POST['reject_btn'];
        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"UPDATE student_reg SET status = 'rejected' WHERE reg_no = '$s_rn'");
        $n_id = 0;
        if( $user_query )
        {
            $query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_notification");
            while( $row = mysqli_fetch_array( $query ) ){
            
            $n_id = $n_id + 1;
        }
        $n_id = $n_id + 1;
            $msg = "Your Request Has Been Rejected By Your Advisor ".$first_name." ".$last_name." ";
            $query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Insert into student_notification(n_id ,    reg_no , notification   , stat ) values ('$n_id' , '$s_rn' , '$msg' , 'no')");
            // echo '<script>alert("'.$query.'");</script>';

        }
      }


      if( isset($_POST['view_btn'])){
        $s_rn = $_POST['s_rn'];
        // echo '<script>alert("YES");</script>';
         // echo '<script>alert("'.$s_rn.'");</script>';
        $sname = $_POST['s_name'];
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
            <div class="col-sm-3 leftside">
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
                                    echo '<h5>Email : '.$email.'</h5>';
                                    echo '<h5>Contact : '.$contact.'</h5>';
                                echo '</div>';   
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


            <div class="col-sm-6">
                <!-- right -->
                <br>

                        <h3 class="text-center">Registered Student List</h3><br>

                        <?php    
                            
                        $result = mysqli_query( mysqli_connect("localhost", "root", "", "repeat") , "SELECT * from student_info as si , student_advisor as sa where si.reg_no = sa.reg_no and sa.ad_id = '$reg_no' group by si.reg_no" );


                        while($row = mysqli_fetch_array( $result ) ) {
                        echo '<form class="form-inline" action="" method = "post">';
                            echo '<div class="form-group">';
                                echo '<input type="text" class="form-control" name="s_rn" value="'.$row['reg_no'].'" readonly>';
                                echo '</div>';
                            echo '<div class="form-group">';
                                echo '<input type="text" class="form-control" name="s_name" value="'.$row['first_name'].' '.$row['last_name'].'" readonly>';
                                echo '</div>';
                            echo '<button type="submit" class="btn btn-default" name = "view_btn">View</button>';
                            echo '</form>';
                        }
                        ?>
            </div>

            <div class="col-sm-3">
                <br>
                <h3 class="text-center">Course List</h3><br>
                <?php 
                    if( $s_rn != "" )
                    {
                        echo '<div style="background-color: #588c7e; border-radius: 4px;padding: 15px 20px;">';
                            echo '<h4>'.$sname.'</h4>';
                            echo '<h4>'.$s_rn.'</h4>';
                        echo '</div><hr>';

                        echo '<table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                </tr>
                            </thead>';
                        echo '<tbody style="color: black;">';

                                            
                        $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_reg where reg_no = '$s_rn'");
                                                
                        while( $row = mysqli_fetch_array( $user_query ) ){
                            if( $row['status'] == "unread" ){
                            echo '<tr>';
                            echo '<td>'.$row['course_code'].'</td>';
                            echo '<td>'.$row['course_name'].'</td>';
                            echo '</tr>';
                        }
                        }
                                                    
                        echo '</tbody>
                        </table>';

                        echo '<form action = "" method = "post" class="text-center">';
                            echo '<button type="submit" class="btn btn-success" name="approve_btn" value = "'.$s_rn.'">Approve</button>';
                            echo '<button type="submit" class="btn btn-danger" name="reject_btn" value = "'.$s_rn.'"">Reject</button>';
                        echo '</form>';
                    }
    
                ?>
            </div>
        </div>
    </div>
</body>

</html>
