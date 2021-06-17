<?php

$connection = mysqli_connect("localhost", "root", "", "job-solutions-test"); 
     
	  
    // Check connection 
    if (mysqli_connect_errno()) 
    { 
        echo "Database connection failed."; 
    }	
?>	