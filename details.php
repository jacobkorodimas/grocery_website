<?php
    include('config/db_connect.php');

    if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM grocerytable WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM grocerytable WHERE id = $id";

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
	<?php if($grocery_item): ?>
			<!-- product name -->
        	<p><?php echo $grocery_item['product_name']; ?></p>
        	<!-- product price -->
        	<p>$<?php echo $grocery_item['price']; ?></p>
        	<!-- product country -->
        	<p><?php echo $grocery_item['country']; ?></p>
			<a class="brand-text" href="edit.php?id=<?php echo $grocery_item['id'] ?>">click to edit</a>

			<!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $grocery_item['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>

		<?php else: ?>
			<h5>This item does not exist.</h5>
		<?php endif ?>
</body>
</html>