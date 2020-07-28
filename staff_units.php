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
    <title>Maintain Units</title>
</head>
<body>
    
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Maintain Units</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="staff_semester.php"> Select Semester</a></li>
                                <?php $sem=$_REQUEST['sem'];?>
                                <li class="breadcrumb-item" aria-current="page"><a href="staff_subject.php?sem=<?php echo $sem; ?>"> Maintain Subject</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Maintain Units</li>
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
                    $sub=$_REQUEST['sub'];
                    $unit=$_REQUEST['unit'];
                    $unit_name=$_REQUEST['unit_name'];
                    $sql="INSERT INTO units (sub,unit,unit_name) VALUES ('$sub','$unit','$unit_name')";
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
                            <button type="button" class="close" data-dismiss="alert">&  times;</button>
                            <strong>Failed!</strong> Please try again.
                        </div>
                        <?php
                   }   
                }
                ?>
                    <h1>Update Units</h1>
                </div>            
                <?php
                    $sub=$_REQUEST['sub'];
                    $sql="SELECT * FROM units WHERE sub LIKE '%$sub%'";
                    $result=mysqli_query($con,$sql);
                ?>
                <div style="overflow-x: auto;" class="col-lg-12">
                <table class="table">
                    <tr style="background-color: #efefef;">
                        <th>Unit Number</th>
                        <th>Name of Units</th>
                    </tr>
                <?php
                while($data=mysqli_fetch_array($result))
                {
                    $unit=$data['unit'];
                    echo "<tr>";
                    echo "<td>".$data['unit']."</td>";
                    echo "<td>";
                    ?>
                    <a href="material.php?sub=<?php echo $sub; ?>& unit=<?php echo $unit; ?>&sem=<?php echo $sem; ?>"><?php echo $data['unit_name']; ?></a>
                <?php
                    echo "</td>";
                    echo "</tr>";
               }
                ?>
                </table>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1>Add new Subjects</h1>
                </div>
                <div class="col-lg-6">
                    <form>
                    <input type="hidden" name="sub" value="<?php echo $sub; ?>"/>
                    <div class="form-group">
                        <input type="number" class="form-control col-lg-12" placeholder="Please enter the unit number" name="unit"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control col-lg-12" placeholder="Please enter the name unit" type="text" name="unit_name"/>
                    </div>
                    <input type="hidden" name="sem" value="<?php echo $_REQUEST['sem']; ?>"/>
                    <input type="hidden" name="sub" value="<?php echo $_REQUEST['sub']; ?>"/>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-outline-success col-lg-6" />
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