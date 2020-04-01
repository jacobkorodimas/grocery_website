<?php
    include('config/db_connect.php');

    //create and set newProduct values to empty
    $newProductName = $newProductPrice = $newProductCountry = '';

    //check for submission of form
    if(isset($_POST['submit'])){
        //want to make sure inserted data is protected and check for correct data here

        //assign input to variables
        $newProductName = mysqli_real_escape_string($conn, $_POST['product_name']);
		$newProductPrice = mysqli_real_escape_string($conn, $_POST['price']);
        $newProductCountry = mysqli_real_escape_string($conn, $_POST['country']);
        
        //create sql
        $sql = "INSERT INTO grocerytable(product_name, price, country) VALUES('$newProductName', '$newProductPrice', '$newProductCountry')";

        // save to db
		mysqli_query($conn, $sql);
		header('Location: index.php');		
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Website</title>
</head>
<body>
    <!-- Input Form -->
    <form action = "add.php" method = "POST">
        <label>Product name:</label>
        <input type = "text" name = "product_name" value = "<?php echo $newProductName ?>" autocomplete = "off">
        <label>Product price:</label>
        <input type = "number" step="0.01" min="0" max="10" name = "price" value = "<?php echo $newProductPrice ?>" autocomplete = "off">
        <label>Product country:</label>
        <input type = "text" name = "country" value = "<?php echo $newProductCountry ?>" autocomplete = "off">

        <input type = "submit" name = "submit" value = "PRESS TO SUBMIT">
    </form>
</body>
</html>