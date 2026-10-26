<?php
include('connect.php');

	$name=$_POST['name'];
    $age=$_POST['age'];
    $class=$_POST['class'];
	$address=$_POST['address'];
   $email=$_POST['email'];
    

if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($db_con, $_POST["name"]);
    $age = mysqli_real_escape_string($db_con, $_POST["age"]);
	 $class = mysqli_real_escape_string($db_con, $_POST["class"]);
    $address = mysqli_real_escape_string($db_con, $_POST["address"]);
	$email = mysqli_real_escape_string($db_con, $_POST["email"]);
	 
    $sqlInsert = "INSERT INTO students(name , age , class , address , email) VALUES ('$name','$age','$class','$address','$email')";
    if(mysqli_query($db_con,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "students Added Successfully!";
        header("Location:viewstudent.php");
    }else{
        die("Something went wrong");
    }
}


    


?>