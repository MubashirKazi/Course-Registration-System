<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
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
    <title>Student Dashboard</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="assets/css/modern-ui.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
   
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line text-gradient animate-enter">Student Dashboard</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="glass-card p-6 animate-enter" style="animation-delay: 0.1s;">
                        <h4 class="">My Profile</h4>
                        <div class="text-center mt-4">
                            <i class="fa fa-user fa-5x text-gradient"></i>
                            <h3 style="margin-top:15px;"><?php echo htmlentities($_SESSION['sname']);?></h3>
                            <p><?php echo htmlentities($_SESSION['login']);?></p>
                            <a href="my-profile.php" class="btn btn-modern btn-info">Edit Profile</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                     <div class="glass-card p-6 animate-enter" style="animation-delay: 0.2s;">
                        <h4>Current Enrollments</h4>
                         <div class="text-center mt-4">
                            <i class="fa fa-book fa-5x text-success"></i>
                            <?php 
                            $sql = mysqli_query($con, "SELECT * FROM courseenrolls WHERE studentRegno='".$_SESSION['login']."'");
                            $count = mysqli_num_rows($sql);
                            ?>
                             <h1 class="text-gradient" style="font-size: 4rem; margin: 10px 0;"><?php echo $count;?></h1>
                             <p>Active Courses</p>
                             <a href="enroll-history.php" class="btn btn-modern btn-success">View History</a>
                        </div>
                    </div>
                </div>
                
                 <div class="col-md-4">
                     <div class="glass-card p-6 animate-enter" style="animation-delay: 0.3s;">
                        <h4>Actions</h4>
                        <div class="list-group" style="margin-top: 20px;">
                            <a href="enroll.php" class="list-group-item" style="background: transparent; color: inherit; border: 1px solid rgba(255,255,255,0.1);">
                                <i class="fa fa-plus-circle"></i> Enroll in New Course
                            </a>
                            <a href="change-password.php" class="list-group-item" style="background: transparent; color: inherit; border: 1px solid rgba(255,255,255,0.1);">
                                <i class="fa fa-key"></i> Change Password
                            </a>
                             <a href="#" onclick="triggerConfetti(); return false;" class="list-group-item" style="background: transparent; color: inherit; border: 1px solid rgba(255,255,255,0.1);">
                                <i class="fa fa-magic"></i> Feel The Magic!
                            </a>
                        </div>
                    </div>
                </div>
            
            </div>
            
            <!-- Future Chart Section -->
            <div class="row mt-4">
                <div class="col-md-12">
                     <div class="glass-card p-6 animate-enter" style="animation-delay: 0.4s;">
                        <h4>Semester Progress</h4>
                        <div style="height: 200px; display: flex; align-items: flex-end; justify-content: space-around; padding-top: 20px;">
                            <!-- CSS Bar Chart (Mockup) -->
                            <div style="width: 10%; background: var(--primary); height: 40%; border-radius: 4px 4px 0 0; opacity: 0.6;"></div>
                            <div style="width: 10%; background: var(--primary); height: 70%; border-radius: 4px 4px 0 0; opacity: 0.8;"></div>
                            <div style="width: 10%; background: var(--secondary); height: 50%; border-radius: 4px 4px 0 0; opacity: 0.7;"></div>
                            <div style="width: 10%; background: var(--accent); height: 80%; border-radius: 4px 4px 0 0;"></div>
                            <div style="width: 10%; background: var(--glass-border); height: 30%; border-radius: 4px 4px 0 0;"></div>
                        </div>
                        <p class="text-center text-muted mt-2">Participation Activity</p>
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
        // Trigger confetti on load
        window.onload = function() {
            setTimeout(triggerConfetti, 500);
        }
    </script>
</body>
</html>
<?php } ?>
