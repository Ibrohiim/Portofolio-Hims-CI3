<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link rel="icon" href="<?= base_url('assets/dashboard_admin/'); ?>img/brand/logoviewers.png" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/dashboard_viewers/'); ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/dashboard_admin/'); ?>vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/dashboard_viewers/'); ?>css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url('assets/dashboard_viewers/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/dashboard_viewers/'); ?>css/flexslider.css">
    <link rel="stylesheet" href="<?= base_url('assets/dashboard_viewers/'); ?>css/style.css">
    <script>
        function copyClipboard() {
            var link = document.getElementById("clip");
            link.select();
            document.execCommand("copy");
            alert("URL Berhasil di Copy")
        }
    </script>
    <script src="<?= base_url('assets/dashboard_viewers/'); ?>js/modernizr-2.6.2.min.js"></script>

</head>

<body>
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="border js-fullheight">
            <a style="margin-bottom: 30px;" id="colorlib-logo" href="<?= base_url('viewers'); ?>">
                <img style="width: 70%;" src="<?= base_url('assets/dashboard_admin/'); ?>img/brand/logoviewers.png" alt="...">
            </a>
            <nav id="colorlib-main-menu" role="navigation">
                <?php if($this->session->userdata('email') !== null): ?>
                <ul>
                    <li class="nav-item dropdown" style="margin-bottom: 30px;">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span>
                                <img width="25px" height="25px" class="img-circle" src="<?= base_url('assets/dashboard_admin/img/profile/') . $user['image']; ?>"></span>
                                <span class="mb-0 text-sm font-weight-bold" style="color: black;">
                                <?php 
                                if($user['nickname'] == null){
                                    echo "Nickname";
                                }else{
                                    echo $user['nickname'];
                                }?></span>
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <div class="text-center">
                                <h6 style="margin-bottom: 1em;">Welcome!</h6>
                            </div>
                            <?php if($user['role_id'] == 1): ?>
                            <a href="<?= base_url('admin'); ?>" class="dropdown-item" style="padding-left: 2rem;">
                                <small><i class="fas fa-tv"></i>
                                <span>Dashboard</span></small>
                            </a><br>
                            <?php else: ?>
                            <a href="<?= base_url('user'); ?>" class="dropdown-item" style="padding-left: 2rem;">
                                <small><i class="fas fa-user"></i>
                                <span>My profile</span></small>
                            </a><br>
                            <?php endif; ?>
                            <a href="<?= base_url('user/edit_profile'); ?>" class="dropdown-item" style="padding-left: 2rem;">
                                <small><i class="fas fa-user-cog"></i>
                                <span>Settings</span></small>
                            </a><br>
                            <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item logout-button" style="padding-left: 2rem;">
                                <small><i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span></small>
                            </a>
                        </div>
                    </li>
                </ul>
                <?php else: ?>
                    <ul>
                    <li><a href="<?= base_url('auth'); ?>">Login</a> | <a href="<?= base_url('auth/registration'); ?>">Register</a></li>
                    </ul>
                <?php endif; ?>
                <ul>
                    <li <?= $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '' ? 'class="colorlib-active"' : '' ?>>
                        <a href="<?= base_url('viewers'); ?>">Home</a></li>
                    <li <?= $this->uri->segment(2) == 'gallery' ? 'class="colorlib-active"' : '' ?>>
                        <a href="<?= base_url('viewers/gallery'); ?>">Gallery</a></li>
                    <li <?= $this->uri->segment(2) == 'Photography' ? 'class="colorlib-active"' : '' ?>>
                        <a href="<?= base_url('viewers/Photography'); ?>">Photography</a></li>
                    <li <?= $this->uri->segment(2) == 'work' ? 'class="colorlib-active"' : '' ?>>
                        <a href="<?= base_url('viewers/work'); ?>">Work</a></li>
                    <li <?= $this->uri->segment(2) == 'about' ? 'class="colorlib-active"' : '' ?>>
                        <a href="<?= base_url('viewers/about'); ?>">About</a></li>
                    <li <?= $this->uri->segment(2) == 'services' ? 'class="colorlib-active"' : '' ?>>
                        <a href="<?= base_url('viewers/services'); ?>">Services</a></li>
                    <li <?= $this->uri->segment(2) == 'blog' ? 'class="colorlib-active"' : '' ?>>
                        <a href="<?= base_url('viewers/blog'); ?>">Blog</a></li>
                    <li <?= $this->uri->segment(2) == 'contact' ? 'class="colorlib-active"' : '' ?>>
                        <a href="<?= base_url('viewers/contact'); ?>">Contact</a></li>
                </ul>
            </nav>
            <div class="colorlib-footer">
                <p><small>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This website is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="<?= base_url('viewers/about')?>" target="_blank">Ibrohiim</a>
                        </span> <span>Demo Images: <a href="<?= base_url('viewers/gallery')?>" target="_blank">Hims.co</a></span>
                    </small>
                </p>
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/ibrohiims/"><i class="icon-facebook2"></i></a></li>
                    <li><a target="_blank" href="https://www.twitter.com/ibrohiims/"><i class="icon-twitter2"></i></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/ibrohiims/"><i class="icon-instagram"></i></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/in/ibrohiim-s-7679b31b3/"><i class="icon-linkedin2"></i></a></li>
                </ul>
            </div>
        </aside>