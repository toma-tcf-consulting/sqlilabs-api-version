<?php
//including the Mysql connect parameters.
include("../sql-connections/sql-connect.php");
error_reporting(0);
// take the variables 
if(isset($_GET['id']))
{
$id=$_GET['id'];
//logging the connection parameters to a file for analysis.
$fp=fopen('result.txt','a');
fwrite($fp,'ID:'.$id."\n");
fclose($fp);

$sql="SELECT * FROM users WHERE id='$id' LIMIT 0,1";
$result=mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

if($row) {
	$data = array('username' => $row['username'], 'password' => $row['password']);
}
else
{
	$data = array('error' => mysqli_error($con));
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
?>