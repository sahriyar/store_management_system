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
    <title>Edit Product</title>
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
                        if(isset($_GET['id'])){
                            $getid = $_GET['id'];

                            $sql = "SELECT * FROM product WHERE product_id=$getid";

                            $query = $conn->query($sql);
                            $data = mysqli_fetch_assoc($query);

                            $product_id= $data['product_id'];
                            $product_name = $data['product_name'];
                            $product_category = $data['product_category'];
                            $product_code = $data['product_code'];
                            $product_entry_date	 = $data['product_entry_date'];
                        }

                        if(isset($_GET['product_name'])){
                            $new_product_name = $_GET['product_name'];
                            $new_product_category = $_GET['product_category'];
                            $new_product_code = $_GET['product_code'];
                            $new_product_entry_date = $_GET['product_entry_date'];
                            $new_product_id = $_GET['product_id'];

                            $sql1 = "UPDATE product SET product_name='$new_product_name', product_category='$new_product_category', 
                                        product_code='$new_product_code', product_entry_date='$new_product_entry_date'
                                        WHERE product_id = $new_product_id";

                            if($conn->query($sql1) == TRUE){
                                echo 'Update Successful!';
                            }else{
                                echo "Error!";
                            }
                        }
                    
                    ?>

                    <?php 
                        $sql = "SELECT * FROM category";
                        $query = $conn->query($sql);
                        
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                        Product : <br>
                        <input type="text" name="product_name" value="<?php echo $product_name ?>"><br><br>
                        Product Category : <br>
                        <select name="product_category">
                            <?php
                                while($data = mysqli_fetch_assoc($query)){;
                                    $category_id = $data['category_id'];
                                    $category_name = $data['category_name'];
                                
                                ?>
                                <option value='<?php echo $category_id ?>' <?php if($category_id ==  $product_category){ echo 'Selected';} ?> >
                                    <?php echo $category_name?>
                                </option>
                                <?php } ?>
                            
                        </select><br><br>
                        Product Code : <br>
                        <input type="text" name="product_code" value="<?php echo $product_code ?>"><br><br>
                        Product Entry Date : <br>
                        <input type="date" name="product_entry_date" value="<?php echo $product_entry_date ?>"><br><br>
                        <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden>
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