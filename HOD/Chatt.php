<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid'] == 0)) {
    header('location:logout.php');
} else {
    function loadMessages()
    {
        $messages = file_get_contents('chatt.txt');
        $messages = explode("\n", $messages);
        $html = '';
        foreach ($messages as $message) {
            $html .= "<div>$message</div>";
        }
        return $html;
    }
    function saveMessage($message)
    {
        $message = htmlentities($message);
        file_put_contents('chatt.txt', $message . "\n", FILE_APPEND | LOCK_EX);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
        saveMessage($_SESSION['username'] . ": " . $_POST['message']);
        header("Location: chatt.php");
        exit();
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>ProfsPortail || Chat</title>

    <link rel="apple-touch-icon" href="apple-icon.png">
    <!-- Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    


</head>

<body>
    

    <?php include_once('includes/sidebar.php'); ?>

    <div id="right-panel" class="right-panel">


        <?php include_once('includes/header.php'); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Professor Chat</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Chat</strong>
                            </div>
                            <div class="card-body">
                                <div id="chat-box">
                                    <?php echo loadMessages(); ?>
                                </div>
                                <form method="post" action="">
                                    <input type="text" name="message" placeholder="Type your message" autocomplete="on" required>
                                    <button type="submit">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>
