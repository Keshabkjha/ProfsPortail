<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['trmsuid'] == 0)) {
    header('location:logout.php');
} else {
    // Fetch courses for the logged-in professor
    $teacherId = $_SESSION['trmsuid'];
    $sql = "SELECT courseName, coursePlatform, courseLink, courseStatus FROM tblcourses WHERE teacherId = :teacherId ORDER BY courseName ASC";
    $query = $dbh->prepare($sql);
    $query->bindParam(':teacherId', $teacherId, PDO::PARAM_INT);
    $query->execute();
    $courses = $query->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>My Courses</title>
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
                        <h1>My Courses</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Courses</strong>
                    </div>
                    <div class="card-body">
                        <?php if (count($courses) > 0): ?>
                            <ul>
                                <?php foreach ($courses as $course): ?>
                                    <li>
                                        <strong><?php echo htmlentities($course->courseName); ?></strong>
                                        (<?php echo htmlentities($course->coursePlatform); ?>)
                                        - <a href="<?php echo htmlentities($course->courseLink); ?>" target="_blank">Access Course</a>
                                        <br />Status: <?php echo htmlentities($course->courseStatus); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>No courses found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>
