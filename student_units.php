<?php 
    include "header.php"; 
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Unit Lists</title>
</head>
<body>
    
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Unit Lists</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <?php $sem=$_REQUEST['sem']; ?>
                                <li class="breadcrumb-item" aria-current="page"><a href="student_subject.php?sem=<?php echo $sem; ?>"> Subject List</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Unit Lists</li>
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
                    <h1>Update Units</h1>
                </div>            
                <?php
                $sub=$_REQUEST['sub'];
                $sql="SELECT * FROM units WHERE sub LIKE '%$sub%'";
                $result=mysqli_query($con,$sql);
                ?>
                <table class="table" style="overflow-x:auto; ">
                    <tr style="background-color: #efefef;">
                        <th>Units</th>
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
                    <a href="student_material.php?sub=<?php echo $sub; ?>& unit=<?php echo $unit; ?>& sem=<?php echo $sem; ?>"><?php echo $data['unit_name']; ?></a>
                <?php
                    echo "</td>";
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