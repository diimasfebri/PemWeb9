<?php
	//inisialisasi nama server maupun database 
	$servername ="localhost";
	$username = "root";
	$password = "";
	$dbname = "db_siswa";

	//meng-koneksikan ke database myDB
	$conn = mysqli_connect($servername,$username,$password,$dbname);
?>