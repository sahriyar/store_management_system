<?php
    require('connection.php');
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        if(isset($_POST['user_email'])){
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];

            $sql = "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password'";

            $query = $conn->query($sql);

            if(mysqli_num_rows($query) > 0 ){

                $data = mysqli_fetch_array($query);

                $user_first_name = $data['user_first_name'];
                $user_last_name = $data['user_last_name'];

                $_SESSION['user_first_name'] = $user_first_name;
                $_SESSION['user_last_name'] = $user_last_name;

                header('location:index.php');
            }else{
                echo 'Error!';
            }
        }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Email : <br>
        <input type="email" name="user_email" required><i class="bx bxs-user"></i><br><br>
        Password : <br>
        <input type="password" name="user_password" required><i class="bx bx-lock-alt"></i><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>