<?php
session_start();
?>
<div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light main_box">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h d-flex gap-1 align-items-center logo-link" href="index.php">
                <img src="img/image-50x50.jpg" alt="" class="rounded pe-2">
                <span class="logo-text">Zonac</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="category.php">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"><span class="fa-solid fa-user"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            if (isset($_SESSION['user_name'])) {
                                $username = htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8');
                                echo '<li class="nav-item"><a class="nav-link" href="#">' . $username . '</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                            } else {
                                echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="reg_form.php">Register</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="search_input" id="search_input_box">
    <div class="container">
        <form class="d-flex justify-content-between">
            <input type="text" class="form-control" id="search_input" placeholder="Search Here">
            <button type="submit" class="btn"></button>
            <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
    </div>
</div>
