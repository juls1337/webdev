<?php // Script connect.php

  // Set the database access information as constants...
  DEFINE ('DB_USER', 'root');
  DEFINE ('DB_PASSWORD', 'SQLroot');
  DEFINE ('DB_HOST', 'localhost');
  DEFINE ('DB_NAME', 'employee');

  // Make the connection...
  $db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  OR die ('Could not connect to MySQL! ' . mysqli_connect_error());

  // Set the encoding...
  mysqli_set_charset($db_connection, 'utf8');

?>
