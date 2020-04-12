<?php
    include('config/db_connect.php');

    //create and set newProduct values to empty
    $newProductName = $newProductPrice = $newProductCountry = '';

    //check for submission of form
    if(isset($_POST['submit'])){
        //want to make sure inserted data is protected and check for correct data here

        //assign input to variables
        $newProductName = ucfirst(mysqli_real_escape_string($conn, $_POST['product_name']));
		$newProductPrice = mysqli_real_escape_string($conn, $_POST['price']);
        $newProductCountry = ucfirst(mysqli_real_escape_string($conn, $_POST['country']));
        
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
    <div style = 'width: 400px' class = 'mx-auto mt-5'>
        <h1 class = 'lead'>NEW PRODUCT</h1>
        <form action = "add.php" method = "POST">
    
            <div class = 'input-group mb-3'>
                <input class="form-control" placeholder = 'Product name' type = "text" name = "product_name" value = "<?php echo $newProductName ?>" autocomplete = "off">
            </div>
            
            <div class = 'input-group mb-3'>
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input class="form-control" placeholder = 'Amount (to hundredth of a dollar)' type = "number" step="0.01" name = "price" value = "<?php echo $newProductPrice ?>" autocomplete = "off">
            </div>
            
           
            <div class = 'input-group mb-3'>
                <input class="form-control" placeholder = 'Country of origin' type = "text" name = "country" value = "<?php echo $newProductCountry ?>" autocomplete = "off">
            </div>
            
            <input class = 'btn btn-info' type = "submit" name = "submit" value = "PRESS TO SUBMIT">

        </form>
    </div>

</body>
</html>