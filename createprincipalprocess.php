<?php
include('connect.php');

	$name=$_POST['name'];
    $address=$_POST['address'];
    $age=$_POST['age'];
	$position=$_POST['position'];
   
    

if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($db_con, $_POST["name"]);
    $address = mysqli_real_escape_string($db_con, $_POST["address"]);
    $age = mysqli_real_escape_string($db_con, $_POST["age"]);
    $position = mysqli_real_escape_string($db_con, $_POST["position"]);
	
    $sqlInsert = "INSERT INTO principal(name , address , age , position) VALUES ('$name','$address','$age', '$position')";
    if(mysqli_query($db_con,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Principal Added Successfully!";
        header("Location:viewprincipal.php");
    }else{
        die("Something went wrong");
    }
}


    


?>