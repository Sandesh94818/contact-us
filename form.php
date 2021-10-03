<?php
$server="localhost";
$username="root";
$password="";
// replace the database name with your database
$db="contactform"; 

$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

$conn=mysqli_connect($server,$username,$password,$db) or die("error establishing database connection due to ".mysqli_connect_error());

if($_SERVER['REQUEST_METHOD']=='POST' and isset($name)){
  $query="SELECT * FROM `form` WHERE email='$email'";
  $res=mysqli_query($conn,$query) or die('Query Failed');
  if(mysqli_num_rows($res)==0){
      $sql="INSERT INTO `form` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
      $result=mysqli_query($conn,$sql) or die("Query Failed");
    
      if($result)
        echo "submission successful.";
  }else{
    echo "User with same email ID already Exists."
  }
  
}else{
  echo "Access Denied."
}




?>

