<?php 

	$con = mysqli_connect("localhost", "root", "", "learn") or die("cannot connect to database");
	function mres($con, $data) {
		return mysqli_real_escape_string($con, rtrim(ltrim($data)));
	}

 ?>