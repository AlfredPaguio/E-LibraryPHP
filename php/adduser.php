<?php

if (isset($_POST['register'])) {
    include "connection.php";
    function clean($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = clean($_POST['username']);
    $password = $_POST['password'];

    //$userdata = 'name='.$name.'&='.$email;
    if (empty($name)) {
        header("location: ../signup.php?error=Name is required");
    } else {

        $query = "INSERT INTO `users`(`username`, `password`, `role`) VALUES ('" . $name . "','" . $password . "','1')";

        if (!$result = mysqli_query($con, $query)) {
            header("location: ../signup.php?error=Unknown Error");
        } else {
            header("Location: ../manageusers.php?success=Account successfully created");
        }
    }
}
