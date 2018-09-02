<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$conn= mysqli_connect('localhost','root','','customer')or die("Unable to connect database !".mysqli_connect_error());

?>