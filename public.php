<?php

function getCleanText ($data) 
{
$data = stripslashes($data)	;
$data = htmlspecialchars($data);
$data = trim($data);
return $data;
}

if (session_status()==PHP_SESSION_NONE) 
{
session_start();	
}

?>