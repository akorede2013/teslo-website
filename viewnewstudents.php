<!DOCTYPE html>
<html>
<head>
<title>newstudents Information </title>
 <link rel="icon" href="pic.jpg" type="image/icon type">
</head>
<style>
body {background-color: powderblue;}
</style>
<body>

<a href="viewnewstudent.php">newstudents </a></li>
<center><h1>newstudents DETAILS</h1></center>
   <center>
 <div class="panel-body">
 <div class="table-responsive table-bordered">
   <table class="table">
      <thead>
	  
     <tr>
 <th>#</th>
  <th>ID</th>
 <th>Name </th>
 <th>Age </th>
 <th>class</th>
 <th>address</th>
 <th>email</th>
 <th>Action</th>
 </tr>
 </thead>
 
<tbody>

<?php
include 'connect.php';
$sql=mysqli_query($db_con,"select *from students");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
											<td><?php echo htmlentities($row['id']);?></td>
                                            <td><?php echo htmlentities($row['name']);?></td>
                                            <td><?php echo htmlentities($row['age']);?></td>
                                            <td><?php echo htmlentities($row['class']);?></td>
											<td><?php echo htmlentities($row['address']);?></td>
											<td><?php echo htmlentities($row['email']);?></td>
                                            <td>
                    
                    <a href="editchildren.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="viewstudents.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">view</a>
                </td>
                                            <td>
                                            
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
								</center>
								
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
                </div>
            </div>





        </div>
    </div>
   
   
</body>
</html>

