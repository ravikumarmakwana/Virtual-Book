<?php 
    include "header.php"; 
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Materials</title>
</head>
<body>
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Materials</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <?php
                                    $sem=$_REQUEST['sem']; 
                                    $sub=$_REQUEST['sub'];
                                ?>
                                <li class="breadcrumb-item" aria-current="page"><a href="student_subject.php?sem=<?php echo $sem; ?>"> Subject List</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="student_units.php?sem=<?php echo $sem; ?>&sub=<?php echo $sub; ?>"> Unit Lists</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Materials</li>
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
                    $sub=$_REQUEST['sub'];
                    $unit=$_REQUEST['unit'];
                    $sql="SELECT * FROM material WHERE sub LIKE '%$sub%' and unit='$unit'";
                    $result=mysqli_query($con,$sql);
                ?>
                <div class="col-lg-6">
                    <h2 style="color: teal;"><?php echo $sub; ?></h2>
                </div>
                <div class="col-lg-6">
                    <h3 style="color: teal;">Unit : <?php echo $unit; ?></h3>
                </div>
                <div style="overflow-x: auto;" class="col-lg-12">
                <table class="table">
                    <tr bgcolor="#efefef">
                        <th>Sr No.</th>
                        <th>File Name</th>
                        <th>File Type</th>
                        <th>File Description</th>
                        <th>Download File</th>
                    </tr>

                    <?php
                        $c=1; 
                        while($data=mysqli_fetch_array($result))
                        {
                            $file_path=$data['file_path'];
                            echo "<tr>";
                            echo "<td>".($c++)."</td>";
                            echo "<td>".$data['file_name']."</td>";
                            echo "<td>".$data['file_type']."</td>";
                            echo "<td>".$data['file_desc']."</td>";
                            $id=$data['id'];
                            echo "<td><a class='btn btn-outline-success' href='downloade.php?id=$id'>Download</a></td>";
                            echo "</tr>";
                        }
                   ?>
                </table>
            </div>
        </div>
    </section>
    <!-- ***** Services Area End ***** -->
</body>
</html>
<?php include "footer.php" ?>