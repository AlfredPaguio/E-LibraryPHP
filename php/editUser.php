<?php

if (isset($_GET['id'])) {
        include "connection.php";

        function clean($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $id = clean($_GET['id']);

        $sql = "SELECT * FROM users WHERE userid=$id";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        } else {
                header("Location: ../manageUsers.php");
        }
} else if (isset($_POST['edituser'])) {
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
        $id = $_POST['id'];
        $role = $_POST['role'];

        if (empty($name)) {
                header("Location: ../manageUsers.php?id=$id&error=Name is required");
        } else {

                $sql = "UPDATE users
               SET username='$name', password='$password', role='$role'
               WHERE userid=$id ";
                $result = mysqli_query($con, $sql);
                if ($result) {
                        header("Location: ../manageUsers.php?success=Successfully Updated");
                } else {
                        header("Location: ../manageUsers.php?id=$id&error=unknown error occurred&$user_data");
                }
        }
} else {
        header("Location: ../manageUsers.php");
}
