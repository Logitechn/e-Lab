<!DOCTYPE html>
<html>
<head>
    <title>Admin panel</title>
    <link rel="stylesheet" type="text/css" href="css/style_admin.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
    <?php require_once('connect.php');
        require_once('functions.php');
        require_once('title_bar.php'); ?>
    
    <h3> Admin pannel</h3>

   
    <p><a href='admin.php?type=players'>Show Players</a></p>
    

        <?php
            if(isset($_GET['type']) && !empty($_GET['type'])){
        ?>
            <table id="table2" class="PlayersListTable" >
            <tr><td>Vardas</td><td>Pavardė</td><td>Valstybinis automobilio registracijos nr.</td><td>Kontaktinis telefonas</td>
            <td>Elektroninis paštas</td><td>Miestas</td><td>Registravimosi data</td></tr>
        <?php
            $list = $link->query("Select * from players");
            while($run_list = mysqli_fetch_array($list)){
                $u_name = $run_list['vardas'];
                $u_surname = $run_list['pavarde'];
                $u_auto_nr = $run_list['automobilio_nr'];
                $u_mobile_nr = $run_list['telefono_nr'];
                $u_email = $run_list['email'];
                $u_city = $run_list['miestas'];
                $u_registration_date = $run_list['registracijos_data'];
        ?>
        <tr><td><?php echo $u_name; ?></td><td><?php echo $u_surname; ?></td><td><?php echo $u_auto_nr; ?></td>
        <td><?php echo $u_mobile_nr; ?></td><td><?php echo $u_email; ?></td><td><?php echo $u_city; ?></td>
        <td><?php echo $u_registration_date; ?></td></tr>
        <?php
            }
        ?>
            </table>
        <?php
            }else{
                echo ("Select Option");
            }
        ?>

</body>
</html>