<?php 
    
    include 'dbconnect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:login.php");
    }
    include "header.php"; 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Semester</title>
</head>
<body>
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Select Semester</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Select Semester</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Curve -->
        <div class="breadcrumb-bg-curve">
            <img src="./img/core-img/curve-5.png" alt="">
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->

    <!-- ***** Services Area Start ***** -->
    <section class="uza-services-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <h1>Select Semester</h1>
                    </div><?php
                        $sql="SELECT * FROM semester";
                        $result=mysqli_query($con,$sql);
                        while($data=mysqli_fetch_array($result))
                        {
                            ?>
                            <div class="col-lg-4">
                            <?php $sem=$data['sem']; ?>
                            <a class="btn btn-outline-primary col-lg-12 form-group" href="staff_subject.php?sem=<?php echo $sem; ?>"><?php echo "Semester ".$sem; ?></a>    
                            </div>
                        <?php    
                        }
                    ?>
            </div>
        </div>
    </section>
    <!-- ***** Services Area End ***** -->
</body>
</html>
<?php include "footer.php" ?>