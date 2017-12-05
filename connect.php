

<?php
	$connection = mysqli_connect("localhost", "root", "", "student database");
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
?>