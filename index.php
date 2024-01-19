<?php
include "php/connection.php";
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
    <title>E-Library - Index</title>
    <meta charset="UTF-8">
    <meta name="description" content="Project Website for IPT">
    <meta name="author" content="Alfred U. Paguio">
    <!-- <meta property="og:url" content="http://paguio-alfred.epizy.com/"> -->
    <meta property="og:description" content="Project Website for IPT" />
    <meta property="og:title" content="E-library" />
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="336" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
</head>

<body class="overflow-x-hidden container-fluid">
    <!-- Sidebar  -->
    <div class="wrapper">
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left text-dark"></i>
            </div>
            <div class="sidebar-header">
                <h3>E-Library</h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
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
                    <div>
                        <a class="navbar-brand">
                            <button type="button" id="sidebarCollapse" class="btn btn-light">
                                <i class="fas fa-align-left"></i>

                            </button>
                            <span>E-Library</span>
                        </a>
                    </div>
                    <?php if (isset($_SESSION['login_user'])) { ?>
                        <div class="d-flex ">

                            <h4 class="mr-3 align-middle text-white"><i class="fas fa-user mr-1 "></i><?php echo $_SESSION['login_user'], " , ",  $_SESSION['login_userrole']; ?></h4>
                            <a href="#" class="btn btn-danger text-white" data-toggle="modal" data-target="#logoutmodal"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    <?php } else { ?>

                        <a href="loginForm.php" class="btn btn-primary text-white" data-toggle="modal" data-target="#loginBackdrop"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                    <?php } ?>
                </div>
            </nav>
            <!--hero header-->
            <div class="py-7 py-md-0 bg-hero" id="home">
                <div class="container">
                    <div class="row vh-md-100">
                        <div class="col-md-8 col-sm-10 col-12 mx-auto my-auto text-center">
                            <h1 class="heading-black text-capitalize">E-library</h1>
                            <p class="lead py-3">An e-library or Digital library is a physical site and/ or website that provide
                                around the clock online access to digitized audio, video, and written material. <br> In our
                                case, it's focused on Anime and Manga</p>
                            <button class="btn btn-primary d-inline-flex flex-row align-items-center">
                                Get started now
                                <em class="ml-2" data-feather="arrow-right"></em>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- features section -->
            <div class="pt-6 pb-7" id="features">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center">
                            <h2 class="heading-black">E-library that offers everything you need for anime and manga.</h2>
                            <p class="text-muted lead">The world's largest anime and manga database and community.</p>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-10 mx-auto">
                            <div class="row feature-boxes">
                                <div class="col-md-6 box">
                                    <div class="icon-box box-primary">
                                        <div class="icon-box-inner">
                                            <span data-feather="edit-3" width="35" height="35"></span>
                                        </div>
                                    </div>
                                    <h5>What have you watched?</h5>
                                    <p class="text-muted">Create your personalized list from tens of thousands of titles on the
                                        world’s largest anime and manga database.</p>
                                </div>
                                <div class="col-md-6 box">
                                    <div class="icon-box box-success">
                                        <div class="icon-box-inner">
                                            <span data-feather="monitor" width="35" height="35"></span>
                                        </div>
                                    </div>
                                    <h5>Need to stay up to date?</h5>
                                    <p class="text-muted">Use your list to organize and track what titles you’ve completed, your
                                        current progress, what you plan to watch or read and so much more.</p>
                                </div>
                                <div class="col-md-6 box">
                                    <div class="icon-box box-danger">
                                        <div class="icon-box-inner">
                                            <span data-feather="layout" width="35" height="35"></span>
                                        </div>
                                    </div>
                                    <h5>Which titles do you like?</h5>
                                    <p class="text-muted">Our site are the best place to discuss your favorite series and keep
                                        up to date with anime and manga news and trends.</p>
                                </div>
                                <div class="col-md-6 box">
                                    <div class="icon-box box-info">
                                        <div class="icon-box-inner">
                                            <span data-feather="globe" width="35" height="35"></span>
                                        </div>
                                    </div>
                                    <h5>Who else is online?</h5>
                                    <p class="text-muted">Connect with millions of fans from over 200 countries worldwide in our
                                        active online community of over half a million users a day!.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-6">
                        <div class="col-md-6 mr-auto">
                            <h2>Top Anime/Manga Rankings</h2>
                            <p class="mb-5">The "Top Upcoming" and "Most Popular" rankings are ordered by the number of users
                                who have added the entry to their list. All other Top Anime and Top Manga rankings are ordered
                                by weighted score. </p>
                            <a href="https://myanimelist.net/topanime.php?type=bypopularity" class="btn btn-light">
                                See more
                            </a>
                        </div>
                        <div class="col-md-5">
                            <div class="slick-about">
                                <img src="https://cdn.myanimelist.net/images/anime/9/9453.jpg" class="img-fluid rounded d-block mx-auto h-auto" alt="Death Note" />
                                <img src="https://cdn.myanimelist.net/images/anime/11/39717.jpg" class="img-fluid rounded d-block mx-auto h-auto" alt="Sword Art Online" />
                                <img src="https://cdn.myanimelist.net/images/anime/5/73199.jpg" class="img-fluid rounded d-block mx-auto h-auto" alt="Steins;Gate" />
                                <img src="https://cdn.myanimelist.net/images/anime/1074/111944.jpg" class="img-fluid rounded d-block mx-auto h-auto" alt="No Game No Life" />
                                <img src="https://cdn.myanimelist.net/images/anime/1958/107912.jpg" class="img-fluid rounded d-block mx-auto h-auto" alt="Yahari Ore no Seishun Love Comedy wa Machigatteiru. Kan" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--faq section-->
            <div class="py-7" id="faq">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center">
                            <h2>Frequently asked questions</h2>
                            <p class="text-muted lead">Answers to most common questions.<br>While we do our best to support a
                                wide range of browsers and devices, please be aware that official technical support is limited.
                            </p>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-10 mx-auto">
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <h6>How can I see the full history of added/watched episodes/chapters?</h6>
                                    <p class="text-muted">The history page shows all updates for the current week and the last 3
                                        weeks. It's not possible to show more weeks.</p>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <h6>A manga title doesn't show up in the history.</h6>
                                    <p class="text-muted">When you add a manga title for the first time to your list or just
                                        change the volume count, it doesn't show up in the history. To force it to show up in
                                        the history list, you will have to change the chapter count.</p>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <h6>Help, I can’t log in! What should I do?</h6>
                                    <p class="text-muted">Have you tried clearing all your cookies for this site? If the issue
                                        persists, please do contact us.</p>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <h6>I made a mistake when creating my account, and typed the wrong username. How can I
                                        change it?</h6>
                                    <p class="text-muted">For the username, you can contact either the administrator in a
                                        private message on the site</p>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <h6>Can this site stream Anime?</h6>
                                    <p class="text-muted">No. Any project that calls itself the site name that supports anime is
                                        not affiliated with the main project.</p>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <h6>Why are some cover thumbnails corrupted, white, showing a broken page, or wrong?</h6>
                                    <p class="text-muted">The thumbnail download likely did not complete correctly. To fix this,
                                        clear your browser cache in settings.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--news section-->
            <div class="py-7 bg-dark section-angle top-left bottom-left" id="blog">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center">
                            <h2 class="heading-black">Top Upcoming Anime</h2>
                            <p class="text-muted lead">The Top 3</p>
                        </div>
                    </div>
                    <div class="card-deck">

                        <div class="card">
                            <a href="#">
                                <img class="card-img-top img-raised" src="https://cdn.myanimelist.net/images/anime/1989/116577.jpg" alt="Shingeki no Kyojin: The Final Season Part 2">
                            </a>
                            <div class="card-body">
                                <a href="#" class="card-title mb-2">
                                    <h5>Shingeki no Kyojin: The Final Season Part 2</h5>
                                </a>
                                <p class="text-muted small-xl mb-2">January 2022</p>
                                <p class="card-text">Second part of Shingeki no Kyojin: The Final Season. <a href="https://myanimelist.net/anime/48583/Shingeki_no_Kyojin__The_Final_Season_Part_2">Learn
                                        more</a></p>
                            </div>
                        </div>


                        <div class="card">
                            <a href="#">
                                <img class="card-img-top img-raised" src="https://cdn.myanimelist.net/images/anime/1245/111800.jpg" alt="Tate no Yuusha no Nariagari Season 2">
                            </a>
                            <div class="card-body">
                                <a href="#" class="card-title mb-2">
                                    <h5>Tate no Yuusha no Nariagari Season 2</h5>
                                </a>
                                <p class="text-muted small-xl mb-2">April 2022</p>
                                <p class="card-text">Second season of Tate no Yuusha no Nariagari. <a href="https://myanimelist.net/anime/40356/Tate_no_Yuusha_no_Nariagari_Season_2">Learn
                                        more</a></p>
                            </div>
                        </div>


                        <div class="card">
                            <a href="#">
                                <img class="card-img-top img-raised" src="https://cdn.myanimelist.net/images/anime/1908/120036.jpg" alt="Kimetsu no Yaiba: Yuukaku-hen">
                            </a>
                            <div class="card-body">
                                <a href="#" class="card-title mb-2">
                                    <h5>Kimetsu no Yaiba: Yuukaku-hen</h5>
                                </a>
                                <p class="text-muted small-xl mb-2">December 2021</p>
                                <p class="card-text">Tanjirou, Zenitsu, and Inosuke, aided by the Sound Hashira Tengen Uzui,
                                    travel to Yoshiwara red light district to hunt down a demon that has been terrorizing the
                                    town. <a href="https://myanimelist.net/anime/47778/Kimetsu_no_Yaiba__Yuukaku-hen">Learn
                                        more</a></p>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-6">
                        <div class="col-md-6 mx-auto text-center">
                            <a href="https://myanimelist.net/topanime.php" class="btn btn-primary">View all Top Anime Series</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--footer-->
            <footer class="py-6">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 mr-auto">
                            <h5>About E-library</h5>
                            <p class="text-muted">The world's largest anime and manga database and community.</p>
                            <ul class="list-inline social social-sm">
                                <li class="list-inline-item">
                                    <a><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a><i class="fa fa-google-plus"></i></a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-sm-2">
                            <h5>Legal</h5>
                            <ul class="list-unstyled">
                                <li><a>Privacy</a></li>
                                <li><a>Terms</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-2">
                            <h5>Partner</h5>
                            <ul class="list-unstyled">
                                <li><a>Refer a friend</a></li>
                                <li><a>Affiliates</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-2">
                            <h5>Help</h5>
                            <ul class="list-unstyled">
                                <li><a>Support</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-muted text-center small-xl">
                            E-library is a property of E-library Co.,Ltd. &copy; 2021 All Rights Reserved.
                        </div>
                    </div>
                </div>
            </footer>


        </div>
        <!--scroll to top-->
        <div class="scroll-top" onclick='window.scrollTo({top: 0, behavior: "smooth"});'>
            <i class="fa fa-angle-up" aria-hidden="true"></i>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.3/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="js/scripts.js"></script>

</body>

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