<?php
    session_start();
    $reg_no = $_SESSION['reg_no'];
    $fname = "";
    $lname = "";
    $year = "";
    $semester = "";
    
    $roll = $reg_no % 1000;
    $code = array();
    $codename = array();
    if( isset($_POST['down_btn'])){
    
    //collect form data
    

    $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_info where reg_no = '$reg_no'");

    while( $row = mysqli_fetch_array( $user_query ) ){
        
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        
    }

    
    $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_semester where reg_no = '$reg_no'");
    
    while( $row = mysqli_fetch_array( $user_query ) ){
        $semester = $row[ 'lavel'] . ' - ' . $row['term'];
    }

    $year = 2020;
    
    }
    //if no errors carry on
    if(!isset($error)){

        //create html of the data
        ob_start();
    
?>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

    </style>
</head>

<body>
    <h1 align="center" style="color:black;" margin-top: 33px;><img style="width: 80px; height: 80px; margin-top: 60px; margin-right: 10px; " src="css/images/logo.png">UNIVERSITY OF ASIA PACIFIC<img style="width: 80px; height: 80px; margin-top: 60px; margin-left:10px; " src="css/images/logo.png"></h1>
    <p align="center" style="color:black;">74/A Green Road, Farmgate Dhaka - 1215</p>

    <hr align="center" width="80%">

    <p align="center" style="color:black;">Form for the students of Repeat Examination (Spring -2018)</p>

    <div style="margin-left: 75px;">
        <p>Name of the Student :
            <?php echo $fname.' '.$lname;?>
        </p>
        <p>Year :
            <?php echo $year;?>
        </p>
        <p>Semester :
            <?php echo $semester;?>
        </p>
        <p>Registration :
            <?php echo $reg_no;?>
        </p>
        <p>Roll :
            <?php echo $roll;?>
        </p>
    </div>

    <br>
    <br>
    <p align="center" style="color:black;">Mention the Course No. and Course Titles of the repeat exams that you want to appear:</p>
    <table align="center" style="border:1px solid black;'" cellpadding="5px" width="80%">
        <tr>
            <th>Course Code</th>
            <th>Course Name</th>
        </tr>
        <?php
            $user_query = mysqli_query(mysqli_connect('localhost','root','','repeat'),"Select * from student_reg where reg_no = '$reg_no'");
                                                
            while( $row = mysqli_fetch_array( $user_query ) )
            {
                echo '<tr>';
                echo '<td>'.$row['course_code'].'</td>';
                echo '<td>'.$row['course_name'].'</td>';
                echo '</tr>';
            }
        ?>
        
    </table>
    <br>
    <br>
    <div style="margin-left: 75px;">
        <p>Date :................................</p>
        <p>Advisor Signature :...................</p>
    </div>
</body>

</html>
<?php 
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);

        //output pdf
        $mpdf->Output($reg_no.'.pdf','D');

        //save to server
        //$mpdf->Output("mydata.pdf",'F');

    }


?>
