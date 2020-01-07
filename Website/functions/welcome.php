<?php include "functions/connect.php" 
If(isset($_REQUEST['submit'])!='')
{

$sql="insert into studinfo(regid,pwd,Conpwd) values('".$_REQUEST['regid']."', '".$_REQUEST['pwd']."', '".$_REQUEST['Conpwd']."')";
$res=mysql_query($sql);
If($res)
{
Echo "Record successfully inserted";
}
}
?>