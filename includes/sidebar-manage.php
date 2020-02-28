<?php

  if ($_SESSION["usertype"] == "Area Center"){
   	 	include ('includes/sidebar-admin.php');
  }
  else 
  	if ($_SESSION["usertype"] == "Stock Officer"){
    	include ('includes/sidebar-stock-officer.php');
  }
  else 
  	if ($_SESSION["usertype"] == "Stockist"){
    	include ('includes/sidebar-stockist.php');
  } else {
    	header('location: logout.php');
    exit;
  }

  ?>