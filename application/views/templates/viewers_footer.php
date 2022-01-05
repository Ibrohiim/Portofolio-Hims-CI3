        <hr>
        <div id="get-in-touch" class="colorlib-bg-color" style="padding-bottom: 15px;padding-top: 15px;">
        <?php $about = $this->db->get('about')->row_array(); ?>
            <div class="colorlib-narrow-content">
                <div class="row">
                    <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft" style="padding-bottom: 15px;">
                    <small>
                        <h4 style="margin-bottom: 10px;">Lets talk about</h4>
                        <p style="margin-bottom: 0;">I am an ordinary human being who still wants to reach my dreams.</p>
                            <a style="padding-right: 5px;" target="_blank" href="https://www.facebook.com/ibrohiims/"><i class="icon-facebook2"></i></a>
                            <a style="padding-right: 5px;" target="_blank" href="https://www.twitter.com/ibrohiims/"><i class="icon-twitter2"></i></a>
                            <a style="padding-right: 5px;" target="_blank" href="https://www.instagram.com/ibrohiims/"><i class="icon-instagram"></i></a>
                            <a style="padding-right: 5px;" target="_blank" href="https://www.linkedin.com/in/ibrohiim-s-7679b31b3/"><i class="icon-linkedin2"></i></a>
                            </small>
                    </div>
                    <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                        <small>
                        <h4 style="margin-bottom: 10px;">Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="<?= base_url('viewers/index')?>"><span class="icon-arrow-right3 mr-2"></span> Home</a></li>
                            <li><a href="<?= base_url('viewers/about')?>"><span class="icon-arrow-right3 mr-2"></span> About</a></li>
                            <li><a href="<?= base_url('viewers/services')?>"><span class="icon-arrow-right3 mr-2"></span> Services</a></li>
                            <li><a href="<?= base_url('viewers/gallery')?>"><span class="icon-arrow-right3 mr-2"></span> Gallery</a></li>
                        </ul>
                        </small>
                    </div>
                    <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                        <small>
                        <h4 style="margin-bottom: 10px;">Services</h4>
                        <ul class="list-unstyled">
                            <li><a href="<?= base_url('viewers/services')?>"><span class="icon-arrow-right3 mr-2"></span> Web Design</a></li>
                            <li><a href="<?= base_url('viewers/services')?>"><span class="icon-arrow-right3 mr-2"></span> Web Development</a></li>
                            <li><a href="<?= base_url('viewers/services')?>"><span class="icon-arrow-right3 mr-2"></span> User Interface</a></li>
                            <li><a href="<?= base_url('viewers/services')?>"><span class="icon-arrow-right3 mr-2"></span> Help & Support</a></li>
                        </ul>
                        </small>
                    </div>
                    <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                        <small>
                        <h4 style="margin-bottom: 10px;">Have a questions?</h4>
                        <ul class="list-unstyled">
                            <li><span class="icon-map"></span> <span class="text"><?= $about['address'];?>, <?= $about['city'];?>, <?= $about['country'];?></span></li>
                            <li><a href="<?= base_url('viewers/contact')?>"><span class="icon-phone"></span> <span class="text"><?= $about['phone'];?></span></a></li>
                            <li><a href="<?= base_url('viewers/contact')?>"><span class="icon-globe-outline"></span> <span class="text"><?= $about['email'];?></span></a></li>
                        </ul>
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><small>
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This website is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="<?= base_url('viewers/about')?>" target="_blank">Ibrohiim</a>
                                </span> <span>Demo Images: <a href="<?= base_url('viewers/gallery')?>" target="_blank">Hims.co</a></span>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="<?= base_url('assets/dashboard_viewers/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/dashboard_viewers/'); ?>js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url('assets/dashboard_viewers/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/dashboard_viewers/'); ?>js/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/dashboard_viewers/'); ?>js/jquery.flexslider-min.js"></script>
    <script src="<?= base_url('assets/dashboard_viewers/'); ?>js/sticky-kit.min.js"></script>
    <script src="<?= base_url('assets/dashboard_viewers/'); ?>js/main.js"></script>
    <script src="<?= base_url('assets/dashboard_viewers/'); ?>js/sweetalert2.all.min.js"></script>
    <script>
    $(".delete-button").on("click", function (e) {
        e.preventDefault();
        const href = $(this).attr("href");

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "You are not logged in",
                text: "Login or register to like and dislike",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, login!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.value) {
                    document.location.href = href;
                    swalWithBootstrapButtons.fire(
                        "Login!",
                        "Login to your account!",
                        "success"
                    );
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        "Cancelled",
                        "You cannot like or dislike this photo!",
                        "error"
                    );
                }
            });
    });
    </script>
    <script>
    $(".logout-button").on("click", function (e) {
        e.preventDefault();
        const href = $(this).attr("href");

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Are you sure you want logout?",
                text: "Select Logout below if you are ready to end your current session!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Logout!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.value) {
                    document.location.href = href;
                    swalWithBootstrapButtons.fire(
                        "Logout!",
                        "You end this session. thank you!",
                        "success"
                    );
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        "Cancelled",
                        "welcome back! Enjoy what's here!",
                        "error"
                    );
                }
            });
    });
    </script>
    </body>

    </html>