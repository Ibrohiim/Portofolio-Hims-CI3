  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
          <a href="" class="font-weight-bold ml-1" target="_blank">&copy; <?= date('Y'); ?></a> 
          <a href="<?= base_url('viewers/about')?>" class="font-weight-bold ml-1" target="_blank">Ibrohiim</a>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="" class="nav-link">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('viewers/about')?>" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('viewers/blog')?>" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url('assets/dashboard_admin/'); ?>vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="<?= base_url('assets/dashboard_admin/'); ?>js/argon.js?v=1.2.0"></script>
  <script type="text/javascript">
    $(".toggle-password").click(function() {

    $(this).toggleClass("text-primary");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  </script>
  </body>

  </html>