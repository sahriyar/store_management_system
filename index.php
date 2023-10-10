<?php
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
    <title>Store Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container bg-light">
        <div class="container-foulid border-bottom border-primary">     <!--Starting of Topbar-->
            <?php include('top_bar.php'); ?>
        </div>            <!--Ending of Topbar-->

        <div class="container-foulid">
            <div class="row">
                <div class="col-sm-3 bg-light p-0 m-0">     <!--Starting of Left portion-->
                    <?php include('left_bar.php'); ?>
                </div>                   <!--Ending of Left portion-->

                <div class="col-sm-9 border-start border-primary">   <!--Starting of Right portion-->
                    <div class="row p-4">
                        <div class="col-sm-3">
                            <a href="add_category.php"><i class="fa-solid fa-folder-plus fa-2xl text-primary"></i></a>
                            <p>Add Category</p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_category.php"><i class="fa-solid fa-folder-open fa-2xl text-primary"></i></a>
                            <p>Category List</p>
                        </div>
                        <div class="col-sm-3">
                            <a href="add_product.php"><i class="fa-solid fa-cart-shopping fa-2xl text-primary"></i></a>
                            <p>Add Product</p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_product.php"><i class="fa-solid fa-clipboard-list fa-2xl text-primary"></i></a>
                            <p>Product List</p>
                        </div>
                    </div>
                    <hr/>
                    <div class="row p-4">
                        <div class="col-sm-3">
                            <a href="add_store_product.php"><i class="fa-solid fa-box fa-2xl text-primary"></i></a>
                            <p>Store Product</p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_product.php"><i class="fa-solid fa-list fa-2xl text-primary"></i></a>
                            <p>Store Product List</p>
                        </div>
                        <div class="col-sm-3">
                            <a href="add_spend_product.php"><i class="fa-solid fa-truck fa-2xl text-primary"></i></a>
                            <p>Spend Product</p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_spend_product.php"><i class="fa-solid fa-bars fa-2xl text-primary"></i></a>
                            <p>Spend Product List</p>
                        </div>
                    </div>
                    <hr/>
                    <div class="row p-4">
                        <div class="col-sm-3">
                            <a href="report.php"><i class="fa-solid fa-chart-pie fa-2xl text-primary"></i></a>
                            <p>Report</p>
                        </div>
                        <div class="col-sm-3">                           
                        </div>
                        <div class="col-sm-3">                            
                        </div>
                        <div class="col-sm-3">
                        </div>
                    </div>
                    <hr/>
                    <div class="row p-4">
                        <div class="col-sm-3">
                            <a href="add_users.php"><i class="fa-solid fa-user-plus fa-2xl text-primary"></i></a>
                            <p>Add User</p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_users.php"><i class="fa-solid fa-users-viewfinder fa-2xl text-primary"></i></a>
                            <p>User List</p>                           
                        </div>
                        <div class="col-sm-3">                            
                        </div>
                        <div class="col-sm-3">
                        </div>
                    </div>
                </div>      <!--Ending of Right side-->
            </div>          <!--End of Row-->
        </div>
        <div class="container-foulid border-top border-primary">
            <?php include('bottom_bar.php'); ?>
        </div>
    </div>
</body>
</html>

<?php 
    }else{
       header('location:login.php'); 
    }
?>