<?php
	
	include 'dbconnect.php';
	$id=$_REQUEST['id'];

	$sql="SELECT * FROM material WHERE id='$id'";
	$result=mysqli_query($con,$sql);
	$data=mysqli_fetch_array($result);
	
	$sub=$data['sub'];
	$unit=$data['unit'];
	$file=$data['file_path'];
    $filetype=filetype($file);
	$filename=basename($file);
	header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header ("Content-Type: application/".$filetype);
    header ("Content-Length: ".filesize($file));
    header ("Content-Disposition: attachment; filename=".$filename);
    readfile($file);

//    header("Location:student_material.php?sub=$sub&unit=$unit");
?>