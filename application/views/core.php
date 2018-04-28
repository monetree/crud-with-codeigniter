<?php
$con=mysqli_connect('localhost','root','','code');
$output = array();
$select = "select * from country_tbl";
$query=mysqli_query($con,$select);
$outp = "";
while($row=mysqli_fetch_array($query)){
	$outp.='{"country_name":"' .$row["country_name"] . '",';
	$outp.='{"country_id":"' .$row["country_id"] . '",';
}
$outp='{"records":['.$outp.']}';
echo $outp;
?>
