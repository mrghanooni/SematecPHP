<?php

function getconnected ()
{
	$conn = new mysqli ("localhost", "root", "","mrdb");
	if ($conn->connect_error){
		return null;
	}
	else {
		return $conn;
	}
}

?>