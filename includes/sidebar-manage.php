<?php

  if($_SESSION["usertype"] == "Area Center"){
    include ('includes/sidebar-admin.php');
  } else {
    header('location: logout.php');
    exit;
  }

  ?>