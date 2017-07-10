<?php 
$dataBase=mysqli_connect("127.0.0.1", "root", "", "common");
$connection=mysqli_connect_error();
echo $connection;
if ($connection==true) {
	echo "somthing wrong bad";
};

 ?>