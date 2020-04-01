
<?php
    //connect to database in var $conn
    $conn = mysqli_connect('localhost', 'jacob', '1234', 'grocerydb');

    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>