            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                        <a href="" class="font-weight-bold ml-1" target="_blank">&copy; <?= date('Y'); ?></a> 
                        <a href="<?= base_url('viewers/about')?>" class="font-weight-bold ml-1" target="_blank">Ibrohiim</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('viewers/about')?>" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('viewers/blog')?>" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">MIT License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/jquery/dist/jquery.min.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/js-cookie/js.cookie.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/chart.js/dist/Chart.min.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/chart.js/dist/Chart.extension.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>js/argon.min.js?v=1.2.0"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>js/sweetalert2.all.min.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/ckeditor/ckeditor.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>js/ibrohiim.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script>
            $(".button-delete").on("click", function (e) {
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
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: true,
                    })
                    .then((result) => {
                        if (result.value) {
                            document.location.href = href;
                            swalWithBootstrapButtons.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                "Cancelled",
                                "Your imaginary file is safe :)",
                                "error"
                            );
                        }
                    });
            });
            </script>
            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });



                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });
                });
            </script>
            </body>

            </html>