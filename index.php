
<?php
    include('config/db_connect.php');

    $sql = 'SELECT product_name, price, country, id FROM grocerytable';

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
    <title>Grocery Website</title>
</head>

<body>
    <h1 class = 'display-1'>Safe way Grocery Store</h1>
    <!--Link to add new item  -->
    <a class = 'lead border rounded-circle border-primary p-2' href="add.php">Add an item</a>

    <h3 class = 'display-3'>Grocery Items:</h3>

    <!-- List Grocery Items -->
    <div class ='container'>
        <div class = 'row'>
            <?php foreach($groceries as $grocery_item): ?>
                <div class = 'col-4 mb-3 border border-primary rounded-pill'>
                    <!-- product name -->
                    <p class = 'display-4'><?php echo $grocery_item['product_name']; ?></p>
                    <!-- product price -->
                    <p class = lead>$<?php echo $grocery_item['price']; ?></p>
                    <!-- product country -->
                    <p><?php echo $grocery_item['country']; ?></p>

                    <a class = 'badge badge-secondary' href="details.php?id=<?php echo $grocery_item['id']; ?>">More Information</a>
                </div>
            <?php endforeach; ?> 
        </div>
    </div>
</body>
</html>