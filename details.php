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
		
			<div class = 'mx-auto mt-5 col-3 border rounded-pill'>
                <!-- product name -->
                <p class = 'font-weight-bold text-monospace'><u><?php echo $grocery_item['product_name']; ?></u></p>
                <!-- product price -->
                <p class = 'text-info'>$<?php echo $grocery_item['price']; ?></p>
                <!-- product country -->                    
				<p class = 'text-info'><?php echo $grocery_item['country']; ?></p>

				<div class = 'row'>
					<div class='col-4'></div>
					<a class="col-2 btn btn-outline-info" href="edit.php?id=<?php echo $grocery_item['id'] ?>">EDIT</a>
					<!-- DELETE FORM -->
					<form class = 'col-2' action="details.php" method="POST">
						<input type="hidden" name="id_to_delete" value="<?php echo $grocery_item['id']; ?>">
						<input type="submit" name="delete" value="DELETE" class="btn btn-outline-warning">
					</form>
					<div class='col-4'></div>
				</div>
                
			</div>

		<?php else: ?>
			<h5>This item does not exist.</h5>
		<?php endif ?>
</body>
</html>