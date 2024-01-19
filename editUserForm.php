<?php
session_start();

if (!isset($_SESSION['login_user'])) {
  header("Location: loginForm.php");
  die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/signup.css">

  <!-- Font Awesome JS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <title>E-Library Edit User</title>
</head>

<body>
  <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $_GET['error']; ?>
    </div>
  <?php } ?>
  <?php if (isset($_GET['id'])) {
    include "php/connection.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE userid=" . $id . "";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) != 0) {
      $rows = mysqli_fetch_assoc($result);
    } else {
      header("Location: editUserForm.php");
    }
  ?>
    <section class="vh-100 bg-image" style="background-color: #039be5;">
      <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                  <h2 class="text-uppercase text-center mb-5">Edit info for <?php echo $rows['username'] ?></h2>

                  <form action="php/editUser.php" id="edit_form" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                      <label>Username</label>
                      <input type="hidden" name="id" value="<?php echo $rows['userid'] ?>" />
                      <input type="text" name="username" value="<?php echo $rows['username'] ?>" class="form-control" required="required" />
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" value="<?php echo $rows['password'] ?>" class="form-control" required="required" />
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                      <input type="text" name="role" value="<?php echo $rows['role'] ?>" class="form-control" required="required" />
                    </div>


                    <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="edituser" id="edituserbutton">Edit User</button>
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

</body>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</html>