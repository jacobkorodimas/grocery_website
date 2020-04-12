
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
    <h1 class = 'display-1 mb-4'>Safe way Grocery Store</h1>
    
    <div class = 'row'>

        <!-- Filler column -->
        <div class = col-8></div>
        
        <!-- Dropdown menu -->
        <div class="dropdown  col-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Product Details
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php foreach($groceries as $grocery_item): ?>
                <a class="dropdown-item" href="details.php?id=<?php echo $grocery_item['id']; ?>">
                    <?php echo $grocery_item['product_name']; ?> details
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <!--Link to add new item  -->
        <a class = 'col-1 btn btn-info'  href="add.php">Add an item</a>

    </div>

    <hr style = 'border: 3px solid black;'>

    <h3 class = 'display-4'>Grocery Items:</h3>

    <!-- List Grocery Items -->
    <div class ='container'>
        <div class = 'row'>
            <!-- spacer div -->
            <?php $rowNum = -1; ?>

            <?php foreach($groceries as $grocery_item): ?>
                
                <?php $rowNum += 1;?>
                <?php if($rowNum % 3 == 0): ?>
                    <div class = 'col-0 m-5'></div>
                <?php endif; ?>

                <div class = 'mb-3 col-3 border rounded-pill'>
                    <!-- product name -->
                    <p class = 'font-weight-bold text-monospace'><u><?php echo $grocery_item['product_name']; ?></u></p>
                    <!-- product price -->
                    <p class = 'text-info'>$<?php echo $grocery_item['price']; ?></p>
                    <!-- product country -->
                    <p class = 'text-info'><?php echo $grocery_item['country']; ?></p>

                    <a class = 'badge badge-info' href="details.php?id=<?php echo $grocery_item['id']; ?>">More Information</a>
                </div>

                <!-- spacer div -->
                <div class = 'col-0 m-3'></div>
            <?php endforeach; ?> 
        </div>
    </div>
</body>
</html>