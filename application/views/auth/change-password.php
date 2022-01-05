<!-- Main content -->
<div class="main-content">
    <div class="header bg-gradient-darker py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-2">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-10">
                        <h1 class="text-white">Welcome!</h1>
                        <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-dark" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <?= $this->session->flashdata('message'); ?>
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h2><strong>Change your password for</strong></h2>
                            <h4><?= $this->session->userdata('reset_email'); ?></h4>
                        </div>
                        <form role="form" method="POST" action="<?= base_url('auth/changepassword'); ?>">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input class="form-control" type="password" id="password1" name="password1" placeholder="New Password . . ." value="<?= set_value('email'); ?>">
                                </div>
                                <span class="focus-input100"><?= form_error('password1', '<small class="text-danger m-r-10">', '</small>'); ?></span>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input class="form-control" type="password" id="password2" name="password2" placeholder="Repeat Password . . ." value="<?= set_value('email'); ?>">
                                </div>
                                <span class="focus-input100"><?= form_error('password2', '<small class="text-danger m-r-10">', '</small>'); ?></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark my-4">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <a href="<?= base_url('auth/forgotpassword'); ?>" class="text-light"><small>Already have an account? Login!</small></a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="<?= base_url('auth') ?>" class="text-light"><small>Create new account</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>