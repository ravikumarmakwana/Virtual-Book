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
    <title>Maintain Subject</title>
</head>
<body>
    
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Maintain Subject</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="staff_semester.php"> Select Semester</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Maintain Subject</li>
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
                    <?php
                        if(isset($_REQUEST['submit']))
                        {
                            $sem=$_REQUEST['sem'];
                            $sub=$_REQUEST['sub'];
                            $sql="INSERT INTO subject (sem,sub) VALUES ('$sem','$sub')";
                            if(mysqli_query($con,$sql))
                            {
                                ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Success!</strong> Subject added Successfully.
                                </div>
                                <?php
                            }   
                            else
                            {
                                ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Failed!</strong> Please try again.
                                </div>
                                <?php
                            }     
                        }
                    ?>
                <h1>Update Subject</h1>
                </div><?php
                    $sem=$_REQUEST['sem'];
                    $sql="SELECT * FROM subject WHERE sem='$sem'";
                    $result=mysqli_query($con,$sql);
                    while($data=mysqli_fetch_array($result))
                    {
                        $sub=$data['sub'];
                        ?>
                        <div class="form-group col-lg-6">
                            <a class="btn btn-outline-primary col-lg-12" href="staff_units.php?sub=<?php echo $sub; ?>&sem=<?php echo $sem; ?>" style="overflow-x:auto;"><?php echo $sub; ?></a>
                            
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1>Add New Subject</h1>
                </div>
                <div class="col-lg-6">
                    <form>
                        <input type="hidden" name="sem" value="<?php echo $sem; ?>"/>
                        <div class="form-group">
                            <input type="text" placeholder="Please enter the new subject name" class="form-control col-lg-12" name="sub"/><br/>    
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-success col-lg-6" name="submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Services Area End ***** -->
</body>
</html>
<?php include "footer.php" ?>