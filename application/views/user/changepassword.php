    <div class="header pb-6 d-flex align-items-center" style="min-height: 150px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/background-2.jpg); background-size: cover; background-position: center top;">
        <span class="mask bg-gradient-dark opacity-7"></span>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <form action="<?= base_url('user/changepassword'); ?>" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0"><strong><i class="<?= $icon?>"></i> <?= $title?></strong></h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pl-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                    <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="new_password1">New Password</label>
                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                    <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="new_password2">Repeat Password</label>
                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                    <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-12 text-right">
                                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-sm btn-success">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                    </div>
                </div>
            </div>
        </div>