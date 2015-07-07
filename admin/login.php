<!DOCTYPE html>
<html>
<head>
    <title>Admin panel</title>
    <meta charset="utf-8">
</head>
<body>
    <?php 
        require_once('connect.php');
        require_once('functions.php');
        require_once('title_bar.php'); 
    ?>
    
    <h3>Admin login:</h3>
    
    <form method='post'>
        <?php
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                if(empty($username) or empty($password)){
                    echo "<p> Fields empty!</p>";    
                }else {
                    $check_login = $link->query("Select id From admin where username='$username' and password='$password'");
                    if(mysqli_num_rows($check_login) == 1){
                        $run = mysqli_fetch_array($check_login);
                        $user_id = $run['id'];
                        $_SESSION['user_id'] = $user_id;
                        header('location: index.php');
                    }else{
                        echo ("<p>Username or password incorrect ! </p>");
                    }
                }
            }
        ?>
        Username: <br>
        <input type='text' name='username' /><br>
        <br/>
        Password: <br>
        <input type='password' name='password' /><br>
        <br>
        <input type='submit' name='submit' value='Login' />
    </form>
</body>
</html>