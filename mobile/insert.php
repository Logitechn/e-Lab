<?php
    require_once('database.php');
    require_once('functions.php');
    if (empty($_POST['rules'])) {
        die ('Nesutikote su žaidimo taisyklėmis');
    }
    if (empty($_POST['name']) || empty($_POST['surname'])) 
    {
        die('Vardas and/or Pavardė !');
    }
    if (empty($_POST['car_nr']))
    {
        die('Valstybinis automobilio numeris neivestas');
        
    }
    if (!empty($_POST['mobile_nr']))
    {
        if (!is_numeric($_POST['mobile_nr']) || $_POST['mobile_nr'] < 0)
        {
            die('Kontaktinio telefono numeris blogai įvestas/neivestas');
        }
        
    }
    if (!empty($_POST['email'])) 
    {
        $email = ($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die ('Blogai įvestas Elektroninis paštas');
        }
    }
    if (empty($_POST['city'])) 
    {
        die('Nepasirinkote miesto');
    }
  
    $nams = mysqli_real_escape_string($link, strip_tags($_POST['name']));
    $surns = mysqli_real_escape_string($link, strip_tags($_POST['surname']));
    $cars = mysqli_real_escape_string($link, strip_tags(strtoupper($_POST['car_nr'])));
    $mobiles = mysqli_real_escape_string($link, strip_tags($_POST['mobile_nr']));
    $emails = mysqli_real_escape_string($link, strip_tags($_POST['email']));
    $cities = mysqli_real_escape_string($link, strip_tags($_POST['city']));
    
    $sql = "INSERT INTO players (vardas, pavarde, automobilio_nr, telefono_nr, email, miestas, registracijos_data) VALUES 
    ('".$nams."', '".$surns."', '".$cars."', '".$mobiles."', '".$emails."', '".$cities."', now())";
    
    if (!$link->query($sql)) 
    {
         die('error: ' . mysqli_error($link));
    }else{
        header("Location:index.php"); 
    }
    $link->close();