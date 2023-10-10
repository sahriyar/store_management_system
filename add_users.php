<?php
    require('connection.php');

    session_start();

    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if(!empty($user_first_name) && !empty($user_last_name)){

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
</head>
<body>

    <?php
        if(isset($_GET['user_first_name'])){
            $user_first_name = $_GET['user_first_name'];
            $user_last_name = $_GET['user_last_name'];
            $user_email = $_GET['user_email'];
            $user_password = $_GET['user_password'];

            $sql = "INSERT INTO users (user_first_name, user_last_name, user_email, user_password) 
                    VALUES ('$user_first_name', ' $user_last_name', '$user_email', ' $user_password')";

            if($conn->query($sql) == TRUE){
                echo 'Data Inserted!';
            }else{
                echo 'Data not Inserted!';
            }
        }
    
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        First Name : <br>
        <input type="text" name="user_first_name"><br><br>
        Last Name : <br>
        <input type="text" name="user_last_name"><br><br>
        Email : <br>
        <input type="email" name="user_email"><br><br>
        Password : <br>
        <input type="password" name="user_password"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>

<?php 
    }else{
       header('location:login.php'); 
    }
?>