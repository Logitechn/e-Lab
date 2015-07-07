<!DOCTYPE html>
<html>
<head>
    <title>Profile - Admin panel</title>
    <meta charset="utf-8">
</head>
<body>
    <?php require_once('connect.php');
        require_once('functions.php');
        require_once('title_bar.php'); 
    ?>
    
    <h3> Profile - Admin panel system </h3>

    <p>You are logged as admin</p>

    <?php
        echo ("<a href='admin.php'>Admin panel</a>");
    ?>
</body>
</html>