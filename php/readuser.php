<?php

include "connection.php";

$sql = "SELECT * FROM users ORDER BY userid DESC";
$result = mysqli_query($con, $sql);
