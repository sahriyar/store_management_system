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
    <title>Add Category</title>
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
                    <div class="container p-4 m-4">  <!--Starting of Container-->
                        <?php
                            if(isset($_GET['category_name'])){
                                $category_name = $_GET['category_name'];
                                $category_entrydate = $_GET['category_entrydate'];

                                $sql = "INSERT INTO category (category_name, category_entrydate) 
                                        VALUES ('$category_name', '$category_entrydate')";

                                if($conn->query($sql) == TRUE){
                                    echo 'Data Inserted!';
                                }else{
                                    echo 'Data not Inserted!';
                                }
                            }
                        
                        ?>

                        <form action="add_category.php" method="GET">
                            Category : <br>
                            <input type="text" name="category_name"><br><br>
                            Category Entry Date : <br>
                            <input type="date" name="category_entrydate"><br><br>
                            <input type="submit" value="submit" class="btn btn-primary">
                        </form>
                </div>      <!--Ending of Right side-->
            </div>          <!--End of Row-->
        </div>
        <div class="container-foulid border-top border-primary">
            <?php include('bottom_bar.php'); ?>
        </div>
    </div>  <!--Ending of Container-->
</body>
</html>

<?php 
    }else{
       header('location:login.php'); 
    }
?>