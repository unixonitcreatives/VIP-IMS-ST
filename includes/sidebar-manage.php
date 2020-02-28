<?php

  if ($_SESSION["stockist_usertype"] == "Area Center"){
    include ('includes/sidebar-admin.php');
  }
  else 
  	if ($_SESSION["stockist_usertype"] == "Stockist"){
    include ('includes/sidebar-stockist.php');
  } else {
    header('location: logout.php');
    exit;
  }

  ?>