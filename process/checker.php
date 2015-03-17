<?php
include 'config.php'; // include the library for database connection
if(isset($_POST['action']) && $_POST['action'] == 'item_availability'){ // Check for the username posted
	$item		= htmlentities($_POST['item']); // Get the username values
	$check_query	= mysqli_query($con,'SELECT item FROM stock WHERE item LIKE"'.$item.'%" '); // Check the database
	// echo mysqli_num_rows($check_query); // echo the num or rows 0 or greater than 0
	if (mysqli_num_rows($check_query) > 0){
		while ($row = mysqli_fetch_array($check_query)){	
			echo "<span class= success>".$row['item']."</span>";
			echo "<br/>";
		}
		// echo"</span>";
	}
	else echo 0;
}
?>