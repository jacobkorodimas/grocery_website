
<?php
    include('config/db_connect.php');

    $sql = 'SELECT product_name, price, country FROM grocerytable';

    $result = mysqli_query($conn, $sql);

    $groceries = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Grocery Website</title>
</head>

<body>
    <h1>Safe ayy Grocery Store</h1>
    <!--Link to add new item  -->
    <a href="add.php">Add an item</a>

    <h3>Grocery Items:</h3>

    <!-- List Grocery Items -->
    <div class ='groceriesDiv'>
        
         <?php foreach($groceries as $grocery_item): ?>
            <div class = 'groceryDiv'>
            <!-- product name -->
            <p><?php echo $grocery_item['product_name']; ?></p>
            <!-- product price -->
            <p>$<?php echo $grocery_item['price']; ?></p>
            <!-- product country -->
            <p><?php echo $grocery_item['country']; ?></p>

            <a href="details.php">More Information</a>
            </div>
        <?php endforeach; ?> 
        
    </div>

</body>
</html>