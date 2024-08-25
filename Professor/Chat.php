<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Check if the user is logged in
if (strlen($_SESSION['trmsuid'] == 0)) {
    header('location:logout.php');
    exit();
} else {
    // Function to load chat messages
    function loadMessages()
    {
        $messages = file_get_contents('chat.txt');
        $messages = explode("\n", $messages);
        $html = '';
        foreach ($messages as $message) {
            if (strpos($message, $_SESSION['username']) === 0) {
                $html .= "<div class='my-message'><strong>Me:</strong> " . substr($message, strlen($_SESSION['username']) + 2) . "</div>";
            } else {
                $html .= "<div class='other-message'>" . htmlentities($message) . "</div>";
            }
        }
        return $html;
    }

    // Function to save chat message
    function saveMessage($message)
    {
        $message = htmlentities($message); // Sanitize the message
        file_put_contents('chat.txt', $_SESSION['username'] . ": " . $message . "\n", FILE_APPEND | LOCK_EX);
    }

    // Function to save uploaded file information
    function saveFile($fileName)
    {
        $fileUrl = 'uploads/' . $fileName;
        file_put_contents('chat.txt', $_SESSION['username'] . ": <a href='$fileUrl' target='_blank'>" . htmlentities($fileName) . "</a>\n", FILE_APPEND | LOCK_EX);
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if a message is sent
        if (!empty($_POST['message'])) {
            saveMessage($_POST['message']);
        }

        // Check if a file is uploaded
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $fileName = basename($_FILES['file']['name']);
            $uploadFile = $uploadDir . $fileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                saveFile($fileName);
            }
        }

        header("Location: chat.php");
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

    <style>
        #chat-box {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
        }

        .my-message {
            text-align: right;
            background-color: #d9edf7;
            padding: 5px;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .other-message {
            text-align: left;
            background-color: #f5f5f5;
            padding: 5px;
            border-radius: 5px;
            margin-bottom: 5px;
        }
    </style>

</head>

<body>
    <!-- Left Panel -->
    <?php include_once('includes/sidebar.php'); ?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php'); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>HOD Chat</h1>
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
                                <form method="post" action="" enctype="multipart/form-data">
                                    <input type="text" name="message" placeholder="Type your message" autocomplete="on">
                                    <input type="file" name="file">
                                    <button type="submit">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>

    <!-- Auto-scroll to the bottom of the chat-box -->
    <script>
        var chatBox = document.getElementById("chat-box");
        chatBox.scrollTop = chatBox.scrollHeight;
    </script>

</body>

</html>
