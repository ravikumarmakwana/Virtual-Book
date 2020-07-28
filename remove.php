<?php
	include 'dbconnect.php';
	$id=$_REQUEST['id'];
	$sub=$_REQUEST['sub'];
	$unit=$_REQUEST['unit'];
	$sem=$_REQUEST['sem'];
	$sql="SELECT file_path FROM material WHERE id='$id'";
	$data=mysqli_query($con,$sql);
	$data=mysqli_fetch_array($data);
	$file=$data['file_path'];
	$r=unlink($file);
	$sql="DELETE FROM material WHERE id='$id'";
	$result=mysqli_query($con,$sql);
	header("Location:material.php?unit=$unit&sub=$sub&sem=$sem");
?>