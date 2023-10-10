<?php
    require('connection.php');
    require('myfunction.php');

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
    <title>Edit Spend Product</title>
</head>
<body>

    <?php
        if(isset($_GET['id'])){
            $getid = $_GET['id'];

            $sql = "SELECT * FROM spend_product WHERE spend_product_id=$getid";

            $query = $conn->query($sql);
            $data = mysqli_fetch_assoc($query);

            $spend_product_id= $data['spend_product_id'];
            $spend_product_name = $data['spend_product_name'];
            $spend_product_quentity = $data['spend_product_quentity'];
            $spend_product_entry_date = $data['spend_product_entry_date'];
        }

        if(isset($_GET['spend_product_name'])){
            $new_spend_product_name = $_GET['spend_product_name'];
            $new_spend_product_quentity = $_GET['spend_product_quentity'];
            $new_spend_product_entry_date = $_GET['spend_product_entry_date'];
            $new_spend_product_id = $_GET['spend_product_id'];

            $sql1 = "UPDATE spend_product SET spend_product_name='$new_spend_product_name', spend_product_quentity='$new_spend_product_quentity', 
                        spend_product_entry_date='$new_spend_product_entry_date'
                        WHERE spend_product_id = $new_spend_product_id";

            if($conn->query($sql1) == TRUE){
                echo 'Update Successful!';
            }else{
                echo "Error!";
            }
        }
    
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        
        Product : <br>
        <select name="spend_product_name">
            <?php
                $sql = "SELECT * FROM product";
                $query = $conn->query($sql);
    
                while($data = mysqli_fetch_assoc($query)){;
                    $data_id = $data['product_id'];
                    $data_name = $data['product_name'];
            ?>
                <option value='<?php echo $data_id ?>' <?php if($spend_product_name == $data_id) { echo 'Selected';} ?>>
                    <?php echo $data_name ?>
                </option>";
        <?php } ?>
            
        </select><br><br>
        Product Quentity : <br>
        <input type="number" name="spend_product_quentity" value="<?php echo $spend_product_quentity ?>"><br><br>
        Store Entry Date : <br>
        <input type="date" name="spend_product_entry_date" value="<?php echo $spend_product_entry_date ?>"><br><br>
        <input type="text" name="spend_product_id" value="<?php echo $spend_product_id ?>" hidden>
        <input type="submit" value="submit">
    </form>
</body>
</html>

<?php 
    }else{
       header('location:login.php'); 
    }
?>