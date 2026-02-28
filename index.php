<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $regno=$_POST['regno'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM students WHERE StudentRegno='$regno' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="dashboard.php";//
$_SESSION['login']=$_POST['regno'];
$_SESSION['id']=$num['studentRegno'];
$_SESSION['sname']=$num['studentName'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(studentRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid Reg no or Password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Student Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="assets/css/modern-ui.css" rel="stylesheet" />
</head>
<body>
    <?php include('includes/header.php');?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Please Login To Enter </h4>

                </div>

            </div>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <div class="row">
                <div class="col-md-6">
                    <div class="glass-card animate-enter p-6">
                        <h3 class="text-gradient" style="margin-top:0;">Student Login</h3>
                        <p class="text-muted">Enter your credentials to access the portal.</p>
                        <form name="admin" method="post">
                            <div class="form-group">
                                <label>Registration No.</label>
                                <input type="text" name="regno" class="form-control" placeholder="Enter Registration No." required />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required />
                            </div>
                            <hr />
                            <button type="submit" name="submit" class="btn btn-info btn-block btn-lg"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>
                        </form>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="glass-card animate-enter p-6" style="animation-delay: 0.1s;">
                        <div class="alert alert-info" style="background:none; border:none; color:inherit; padding:0;">
                            <h3 class="text-gradient" style="margin-top:0;">Welcome to the Portal</h3>
                            <p class="mb-4">Access your personalized dashboard, enroll in courses, and track your academic journey in one place.</p>
                            <ul style="padding-left: 20px; line-height: 1.8;">
                                <li>Smart course discovery and quick enrollment</li>
                                <li>Clean, modern interface built for focus</li>
                                <li>Secure student access and activity tracking</li>
                                <li>Responsive design for desktop and mobile</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
