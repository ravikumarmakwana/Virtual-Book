<?php
	include 'dbconnect.php';
	$sub=$_REQUEST['sub'];
	$sem=$_REQUEST['sem'];
	$sql="DELETE FROM subject WHERE sub LIKE '%$sub%'";
	$result1=mysqli_query($con,$sql);
	$sql="DELETE FROM units WHERE sub LIKE '%$sub%'";
	$result2=mysqli_query($con,$sql);
	$sql="SELECT file_path FROM material WHERE sub LIKE '%$sub%'";
	$result4=mysqli_query($con,$sql);
	while($data=mysqli_fetch_array($result4))
	{
		$file=$data['file_path'];
		$r=unlink($file);
	}
	$sql="DELETE FROM material WHERE sub LIKE '%$sub%'";
	$result3=mysqli_query($con,$sql);
	header("Location:staff_subject.php?sem=$sem");
?>