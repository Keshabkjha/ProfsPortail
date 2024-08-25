<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsuid'] == 0)) {
    header('location:logout.php');
} else {
    // Fetch today's tasks
    $dayOfWeek = date('l'); // Get the current day
    $teacherId = $_SESSION['trmsuid'];
    
    $sql = "SELECT taskName, taskDescription, taskTime FROM tbltaskschedule WHERE teacherId = :teacherId AND taskDay = :dayOfWeek";
    $query = $dbh->prepare($sql);
    $query->bindParam(':teacherId', $teacherId, PDO::PARAM_INT);
    $query->bindParam(':dayOfWeek', $dayOfWeek, PDO::PARAM_STR);
    $query->execute();
    $tasks = $query->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>Professor Dashboard</title>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php include_once('includes/sidebar.php');?>
    <div id="right-panel" class="right-panel">
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>My Tasks</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Tasks</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-sm-6 col-lg-12">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h3 class="mb-0">
                            <span>Welcome back :  <?php echo htmlentities($row->Name);?></span>
                        </h3>
                        <hr />
                        <?php if($row->isPublic=='1'):?>                       
                            <p class="text-light">Your Profile is Public. Students can see your profile.</p>
                        <?php else: ?>  
                            <p class="text-light">Your Profile is not Public. Students can't see your profile.</p>  
                        <?php endif;?>                   

                        <h4 class="text-light">Today's Task Schedule</h4>
                        <?php if (count($tasks) > 0): ?>
                            <ul>
                                <?php foreach ($tasks as $task): ?>
                                    <li>
                                        <strong><?php echo htmlentities($task->taskName); ?></strong> at <?php echo htmlentities($task->taskTime); ?>
                                        <br /><?php echo htmlentities($task->taskDescription); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-light">No tasks scheduled for today.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>
<?php } ?>
