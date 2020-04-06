
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
    <!-- Bootstrap Style Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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


            <!-- Bootstrap Javascript Links -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
