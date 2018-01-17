<?php
  $servername = "localhost";
  $username = "";
  $password = "";//pass should be clear before git push
  $dbname="add_todo";
  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }else{
      // echo "Connected successfully"."\n";
  }
?>
