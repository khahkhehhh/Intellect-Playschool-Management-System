<?php 
include 'smartsession.php';
if(!session_id())
{
     session_start();
}


include ('dbconnect.php');
if(isset($_GET['id']))
{
    $funvakid = $_GET['id'];
}


//SQL DELETE 
$sql = "DELETE FROM tb_explorer  WHERE exp_id = '$funvakid' ";

$result = mysqli_query ($con,$sql);

mysqli_close($con);



header ('location: funkindyvakmanage.php');

?>