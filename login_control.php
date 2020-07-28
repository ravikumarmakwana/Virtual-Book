<?php

    include 'dbconnect.php';
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    echo $username;
    echo $password;
    $sql="SELECT * FROM staff WHERE username='$username' AND password='$password'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $_SESSION['username']=$username;
        header("Location:staff_semester.php");
    }
    else
    {
        header("Location:login.php?msg='Please try again'");
    }
?>