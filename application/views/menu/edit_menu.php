    <div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
        <!-- Header container -->
        <?php foreach ($editmenu as $em) { ?>
        <div class="container-fluid d-flex align-items-center">
            <div class="col-lg-6 col-7 p-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin');?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('menu');?>">Menu Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-6 order-xl-1 pb-8">
                <?= form_open_multipart('menu/update_menu'); ?>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $em->id ?>">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0"><strong>Edit Menu Management</strong></h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Menu Management</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Menu Name</label>
                                        <input type="text" class="form-control" id="menu" name="menu" value="<?= $em->menu; ?>">
                                        <?= form_error('menu', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-12 text-right">
                                    <a href="<?= base_url('menu' . $em->id) ?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Menu</a>
                                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>