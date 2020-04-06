<?php
    include('config/db_connect.php');

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
    
</body>
</html>