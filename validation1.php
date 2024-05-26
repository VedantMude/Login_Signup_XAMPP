<?php
$servername='localhost';
$username='root';
$password='';
$databasename='myapp';

$connection=new mysqli($servername,$username,$password,$databasename);

if($connection->connect_error){
    die("Connection failed:".$connection->connect_error);
}

$email=$_POST['exampleInputEmail1'];
$pass=$_POST['exampleInputPassword1'];

$sql="INSERT INTO myusers values('$email','$pass')";

$result=$connection->query($sql);


header('\myfun\validation1.php');
exit;

?>