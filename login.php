<?php 
    include "header.php"; 
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login for Staff Only</title>
</head>
<body>
    
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Login</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
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
            <div class="col-lg-12">
                <?php
                if(isset($_REQUEST['msg']))
                {
                    ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Login Failed!</strong> Please try again.
                    </div>
                    <?php
                }
                ?>
            </div>
            <p>(for staff only)</p>
            <div class="row">
                <form method="post" action="login_control.php">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" placeholder="username" name="username" class="form-control col-lg-12">
                           </div>
                            <div class="form-group col-lg-6">
                                <input type="password" name="password" placeholder="password" class="form-control col-lg-12">
                            </div>
                          <div class="form-group col-lg-12">
                                <input type="submit" name="submit" value="Login" class="btn btn-outline-danger col-lg-12">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ***** Services Area End ***** -->
</body>
</html>
<?php include "footer.php" ?>