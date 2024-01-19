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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library Signup</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/modal.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left text-dark"></i>
            </div>

            <div class="sidebar-header">
                <h3>E-Library</h3>
            </div>

            <ul class="list-unstyled components">

                <li>

                    <a href="index.php"><i class="fas fa-home mr-2"></i>Home</a>
                </li>



                <?php if (($_SESSION['login_userrole'] == "Administrator")) { ?>
                    <li>

                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-users-cog mr-2"></i>Manage Users</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="signup.php"><i class="fas fa-user-plus mr-2"></i>Create User</a>
                            </li>
                            <li>
                                <a href="manageUsers.php"><i class="fas fa-users mr-2"></i>User List</a>
                            </li>

                        </ul>
                    </li>
                <?php } ?>

            </ul>



        </nav>

        <!-- Page Content  -->

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-dark navbardarkerthanblack">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <button type="button" id="sidebarCollapse" class="btn btn-light">
                            <i class="fas fa-align-left"></i>

                        </button>
                        <span>E-Library</span>
                    </a>
                    <?php if (isset($_SESSION['login_user'])) { ?>
                        <div class="d-flex ">

                            <h4 class="mr-3 align-middle text-white"><i class="fas fa-user mr-1 "></i><?php echo $_SESSION['login_user'], " , ",  $_SESSION['login_userrole']; ?></h4>
                            <a href="#" class="btn btn-danger text-white" data-toggle="modal" data-target="#logoutmodal"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    <?php } else { ?>

                        <!--a href="#" class="btn btn-primary text-white" data-toggle="modal" data-target="#loginBackdrop"><i class="fas fa-sign-in-alt mr-2"></i>Login</a -->
                        <a href="loginForm.php" class="btn btn-primary text-white"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                    <?php } ?>
                </div>
            </nav>
            <div class="container-fluid h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="php/adduser.php" id="register_form" method="POST" enctype="multipart/form-data">

                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" />
                                        <label class="form-label" for="username">Userame</label>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="repeatpassword" class="form-control form-control-lg" />
                                        <label class="form-label" for="repeatpassword">Repeat password</label>
                                    </div>



                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="register" id="registerbutton">Create user</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>



<div class="modal fade" id="loginBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Member Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Log in</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
</div>



<div id="logoutmodal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">

            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to logout?.</p>
            </div>
            <div class="modal-footer">
                <form action="php/logoutsession.php" method="">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>


</html>