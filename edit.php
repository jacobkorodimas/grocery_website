<?php
    include('config/db_connect.php');

    if(isset($_POST['submit'])){
        //want to make sure inserted data is protected and check for correct data here

        //assign input to variables
        $editedId = mysqli_real_escape_string($conn, $_POST['id']);
        $editedProductName = mysqli_real_escape_string($conn, $_POST['product_name']);
		$editedProductPrice = mysqli_real_escape_string($conn, $_POST['price']);
        $editedProductCountry = mysqli_real_escape_string($conn, $_POST['country']);
        
        //create sql
        $sql = "UPDATE grocerytable SET product_name = '$editedProductName', price = '$editedProductPrice', country = '$editedProductCountry' WHERE id = $editedId";

        // save to db
		mysqli_query($conn, $sql);
		header('Location: index.php');		
    }

    if(isset($_GET['id'])){
        $id_to_edit = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM grocerytable WHERE id = $id_to_edit";

        // get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$grocery_item = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);
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
        <h1 class = 'lead'>EDIT PRODUCT</h1>
        <form action = "edit.php" method = "POST">
    
            <input type="hidden" name="id" value="<?php echo $grocery_item['id']; ?>">

            <div class = 'input-group mb-3'>
                <input class="form-control" placeholder = 'Product name' type = "text" name = "product_name" value = "<?php echo $grocery_item['product_name']; ?>" autocomplete = "off">
            </div>
            
            <div class = 'input-group mb-3'>
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input class="form-control" placeholder = 'Amount (to hundredth of a dollar)' type = "number" step="0.01" name = "price" value = "<?php echo $grocery_item['price']; ?>" autocomplete = "off">
            </div>
            
           
            <div class = 'input-group mb-3'>
                <input class="form-control" placeholder = 'Country of origin' type = "text" name = "country" value = "<?php echo $grocery_item['country']; ?>" autocomplete = "off">
            </div>
            
            <input class = 'btn btn-info' type = "submit" name = "submit" value = "PRESS TO SUBMIT EDITS">

        </form>
    </div>
</body>
</html>