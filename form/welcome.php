<?php
    session_start();

    
    if(!isset($_SESSION['Name'])){
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>
<body>
    <h1 class="m-5">AJAO seekh gye tm <?php echo $_SESSION['username']; ?></h1>
    
    <button><a href="logout.php">Logout</a></button>
</body>
</html>