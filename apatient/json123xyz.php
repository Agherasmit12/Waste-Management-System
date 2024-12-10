<?php
header('Content-Type: application/json');
$response = array();
if (isset($_GET['transport_category'])){

$con=mysqli_connect("localhost","root","","medcarehospital");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$qry = "SELECT * FROM transport WHERE transport_category = '".$_GET['transport_category']."'";

$result = mysqli_query($con, $qry);  //mysql_query($qry);

while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    array_push($response, $row);
}

echo json_encode($response);
} 
?>