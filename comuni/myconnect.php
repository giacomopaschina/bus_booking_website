<?php 

function myconnect()
{
	$db_conn = NULL;
	$db_conn=mysqli_connect("localhost","root","root","iit_bus");
	if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
            }
	
	return $db_conn;
}
?>