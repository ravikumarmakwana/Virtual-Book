<?php 
    include "header.php"; 
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Subject List</title>
</head>
<body>
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Subject List</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Subject List</li>
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
                <?php
                    $sem=$_REQUEST['sem'];
                    $sql="SELECT * FROM subject WHERE sem='$sem'";
                    $result=mysqli_query($con,$sql);
                    while($data=mysqli_fetch_array($result))
                    {
                        $sub=$data['sub'];
                        ?>
                        <div class="form-group col-lg-12">
                        <a class="btn btn-outline-primary col-lg-5 form-control" href="student_units.php?sub=<?php echo $sub; ?>&sem=<?php echo $sem;?>"><?php echo $sub; ?></a>
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