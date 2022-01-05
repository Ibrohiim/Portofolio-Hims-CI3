<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="<?= base_url('viewers'); ?>">
                <img src="<?= base_url('assets/dashboard_admin/'); ?>img/brand/logoadmin.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <hr class="my-1">
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`. `id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id` = `user_access_menu`. `menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC
                            ";
        $menu = $this->db->query($queryMenu)->result_array();

        ?>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <?php foreach ($menu as $m) : ?>
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal"><?= $m['menu']; ?></span>
                    </h6>

                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                            FROM `user_sub_menu` JOIN `user_menu`
                            ON `user_sub_menu`.`menu_id` = `user_menu`. `id`
                            WHERE `user_sub_menu`.`menu_id` = $menuId
                            AND `user_sub_menu`.`is_active` = 1
                            ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>
                        <ul class="navbar-nav">
                            <?php if ($title == $sm['title']) : ?>
                                <li class="nav-item active">
                                    <a class="nav-link active" href="<?= base_url($sm['url']); ?>">
                                    <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                                    <?php endif; ?>
                                    <i class="<?= $sm['icon']; ?>"></i>
                                    <span class="nav-link-text"><?= $sm['title']; ?></span>
                                    </a>
                                </li>
                        </ul>
                    <?php endforeach; ?>
                    <hr class="my-2">
                <?php endforeach; ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="<?= base_url('auth/logout'); ?>">
                            <i class="fas fa-fw fa-running text-red"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </li>
                </ul>
                <hr class="my-3">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-danger"></i>
                                <i class="sidenav-toggler-line bg-danger"></i>
                                <i class="sidenav-toggler-line bg-danger"></i>
                            </div>
                        </div>
                    </li>
                    <hr class="my-3">
                </ul>
            </div>
        </div>
    </div>
</nav>