<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="assets/css/modern-ui.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
   
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line text-gradient animate-enter">Admin Overview</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="glass-card p-6 animate-enter" style="animation-delay: 0.1s;">
                         <div class="text-center">
                            <i class="fa fa-users fa-5x text-primary"></i>
                            <?php 
                            $sql = mysqli_query($con, "SELECT id FROM students");
                            $cnt = mysqli_num_rows($sql);
                            ?>
                             <h1 class="text-gradient" style="font-size: 4rem; margin: 10px 0;"><?php echo $cnt;?></h1>
                             <p>Registered Students</p>
                             <a href="manage-students.php" class="btn btn-modern btn-primary">Manage Students</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                     <div class="glass-card p-6 animate-enter" style="animation-delay: 0.2s;">
                         <div class="text-center">
                            <i class="fa fa-book fa-5x text-secondary"></i>
                            <?php 
                            $sql = mysqli_query($con, "SELECT id FROM course");
                            $cnt = mysqli_num_rows($sql);
                            ?>
                             <h1 class="text-gradient" style="font-size: 4rem; margin: 10px 0;"><?php echo $cnt;?></h1>
                             <p>Available Courses</p>
                             <a href="course.php" class="btn btn-modern btn-info">Manage Courses</a>
                        </div>
                    </div>
                </div>
                
                 <div class="col-md-4">
                     <div class="glass-card p-6 animate-enter" style="animation-delay: 0.3s;">
                        <div class="text-center">
                             <i class="fa fa-bars fa-5x text-warning"></i>
                             <?php 
                            $sql = mysqli_query($con, "SELECT session FROM session");
                            $cnt = mysqli_num_rows($sql);
                            ?>
                             <h1 class="text-gradient" style="font-size: 4rem; margin: 10px 0;"><?php echo $cnt;?></h1>
                             <p>Active Sessions</p>
                             <a href="session.php" class="btn btn-modern btn-warning">Manage Sessions</a>
                        </div>
                    </div>
                </div>
            
            </div>
            
            <div class="row mt-4" style="margin-top: 30px;">
                 <div class="col-md-12">
                     <div class="glass-card p-6 animate-enter" style="animation-delay: 0.4s;">
                        <h4>System Health & Quick Links</h4>
                        <div class="list-group" style="display:flex; flex-wrap:wrap; gap: 10px;">
                            <a href="student-registration.php" class="btn glass-card p-4" style="flex:1;">
                                <i class="fa fa-plus"></i> Register Student
                            </a>
                            <a href="department.php" class="btn glass-card p-4" style="flex:1;">
                                <i class="fa fa-building"></i> Departments
                            </a>
                            <a href="user-log.php" class="btn glass-card p-4" style="flex:1;">
                                <i class="fa fa-history"></i> User Logs
                            </a>
                            <a href="#" onclick="triggerConfetti(); return false;" class="btn glass-card p-4" style="flex:1;">
                                <i class="fa fa-magic"></i> Celebrate!
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
  
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/modern-ui.js"></script>
    <script>
        window.onload = function() {
            setTimeout(triggerConfetti, 500);
        }
    </script>
</body>
</html>
<?php } ?>
