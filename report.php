<?php
    require('connection.php');

    session_start();

    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if(!empty($user_first_name) && !empty($user_last_name)){

    $sql3 = "SELECT * FROM product";
    $query3 = $conn->query($sql3);

    $data_list = array();

    while($data3 = mysqli_fetch_assoc($query3)){
        $product_id = $data3['product_id'];
        $product_name = $data3['product_name'];

        $data_list[$product_id] = $product_name;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>

    <?php

    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        Select Product Name :
        <select name="product_name">
        <?php
            $sql = "SELECT * FROM product";

            $query = $conn->query($sql);
            while ($data = mysqli_fetch_assoc($query)){
                $product_id = $data['product_id'];
                $product_name = $data['product_name'];
        ?>

            <option value="<?php echo $product_id ?> "><?php $product_name ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Generate Report">
    </form>
    <h1>Store Prodict</h1>
    <?php 
        if(isset($_GET['product_name'])){
            $product_name = $_GET['product_name'];

            $sql1 = "SELECT * FROM store_product WHERE store_product_name = $product_name";

            $query1 = $conn->query($sql1);

            while($data1 = mysqli_fetch_array($query1)){

            $store_product_quentity = $data1['store_product_quentity'];
            $store_product_entry_date = $data1['store_product_entry_date'];
            $store_product_name = $data1['store_product_name'];
            
            echo "<h2>$data_list[$store_product_name]</h2>";
            echo "<table border='1'><tr><td>Store Date</td><td>Ammount</td></tr>";
            echo "<tr><td>$store_product_entry_date</td><td>$store_product_quentity</td></tr>";
            echo "</table>";
            }
        }
    ?>
    <h1>Spand Prodict</h1>
    <?php 
        if(isset($_GET['product_name'])){
            $product_name = $_GET['product_name'];

            $sql4 = "SELECT * FROM spend_product WHERE spend_product_name = $product_name";

            $query4 = $conn->query($sql4);

            while($data4 = mysqli_fetch_array($query4)){

            $spend_product_quentity = $data4['spend_product_quentity'];
            $spend_product_entry_date = $data4['spend_product_entry_date'];
            $spend_product_name = $data4['spend_product_name'];
            
            echo "<h2>$data_list[$spend_product_name]</h2>";
            echo "<table border='1'><tr><td>Spend Date</td><td>Ammount</td></tr>";
            echo "<tr><td>$spend_product_entry_date</td><td>$spend_product_quentity</td></tr>";
            echo "</table>";
            }
        }
    ?>
</body>
</html>

<?php 
    }else{
       header('location:login.php'); 
    }
?>
