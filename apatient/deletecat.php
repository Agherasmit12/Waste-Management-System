<?php 
  include 'connect.php';
    

$id=$_GET['id'];
$delete=mysqli_query($con,"delete from gabbage_type where id='$id'");
if ($delete) {
	header("location:users6.php");
   echo "deleted";
}
else{
 echo "not deleted".mysqli_error();

}

 ?>