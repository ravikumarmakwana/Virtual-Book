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
    <title>Maintain Materials</title>
</head>
<body>
    
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Maintain Materials</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="staff_semester.php"> Select Semester</a></li>
                                <?php $sem=$_REQUEST['sem'];?>
                                <li class="breadcrumb-item" aria-current="page"><a href="staff_subject.php?sem=<?php echo $sem; ?>"> Maintain Subject</a></li>
                                <?php $sub=$_REQUEST['sub'];?>
                                <li class="breadcrumb-item" aria-current="page"><a href="staff_units.php?sem=<?php echo $sem; ?>&sub=<?php echo $sub; ?>"> Maintain Units</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Maintain Materials</li>
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
        $file_name=$_REQUEST['file_name'];
        $file_desc=$_REQUEST['file_desc'];
        $sub=$_REQUEST['sub'];
        $unit=$_REQUEST['unit'];
        $file_Type=$_REQUEST['file_type'];
        
        $dirpath="Files/";
        $fileName=$dirpath.basename($_FILES['file']['name']);
        $fileSize=$_FILES['file']['size'];
        $fileType=$_FILES['file']['type'];
        $fileTemp=$_FILES['file']['tmp_name'];
        $msg="";
        $c=1;

        $part=explode("/", $fileType);
        $fileType=$part[1];
        ini_set('upload_max_filesize','100M');
        ini_set('post_max_size','100M');
        ini_set('max_input_time',500);
        ini_set('max_excution_time',500);
        if($c==1 && file_exists($fileName))
        {
            $c=0;
            $msg+="File is already exist<br/>";
        }
        if($c==1)
        {
            if(move_uploaded_file($fileTemp, $fileName))
            {
                $sql="INSERT INTO material (sub,unit,file_type,file_name,file_desc,file_path) VALUES ('$sub','$unit','$file_Type','$file_name','$file_desc','$fileName')";
                if(mysqli_query($con,$sql))
                {
                    ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> File added Successfully.
                    </div>
                    <?php
                }
            }
            else
                $msg+="Some of Error Occure.<br/>";
        }
        if($c==0)
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
                    <h1>Materials</h1>
                </div>
                <?php
                $sub=$_REQUEST['sub'];
                $unit=$_REQUEST['unit'];
                $sql="SELECT * FROM material WHERE sub LIKE '%$sub%' AND unit='$unit'";
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
                        <th>Remove File</th>
                    </tr>

                    <?php
                        $c=1; 
                        while($data=mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>".($c++)."</td>";
                            echo "<td>".$data['file_name']."</td>";
                            echo "<td>".$data['file_type']."</td>";
                            echo "<td>".$data['file_desc']."</td>";
                            $id=$data['id'];
                            echo "<td><a class='btn btn-outline-danger' href='remove.php?id=$id&sub=$sub&unit=$unit&sem=$sem'>Remove</a></td>";
                            echo "</tr>";
                        }
                   ?>
                </table>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h2>Add New Materials</h2>
                    <div class="col-lg-6">
                    <form enctype="multipart/form-data" method="post">
                        <input type="hidden" name="sub" value="<?php echo $sub; ?>"/>
                        <input type="hidden" name="unit" value="<?php echo $unit; ?>"/>
                        <div class="form-group">
                            <input type="text" name="file_name" placeholder="Please enter the name of file" class="form-control col-lg-12" />                            
                        </div>
                        <div class="form-group">
                            <textarea class="form-control col-lg-12"  name="file_desc" placeholder="Please enter the file Description" rows="5"></textarea>                   
                        </div>
                        <div class="form-group">
                            <input type="text" name="file_type" placeholder="File types like video, ppt, pdf, xlsx, pptx, docs, etc" class="form-control col-lg-12" />     
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" class="form-control col-lg-12" placeholder="Please enter the file"/>                    
                        </div>
                        <input type="hidden" name="sem" value="<?php echo $_REQUEST['sem']; ?>">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-outline-success col-lg-6"/>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
    </section>
    <!-- ***** Services Area End ***** -->
</body>
</html>
<?php include "footer.php" ?>