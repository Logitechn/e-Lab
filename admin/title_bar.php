<div>
    <?php
    if(loggedin()){
    ?>
        <a href='index.php'>Home</a> |
        <a href='profile.php'>Profile</a> |
        <a href='logout.php'>Log Out</a>
    <?php
    }else{
    ?>
        <a href='index.php'>Home</a> |
        <a href='login.php'>Log in</a> 
    <?php
    }
        
    ?>
</div>