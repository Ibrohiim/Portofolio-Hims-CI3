    <div class="header pb-6 d-flex align-items-center" style="min-height: 300px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/background-2.jpg); background-size: cover; background-position: center top;">
        <span class="mask bg-gradient-dark opacity-7"></span>
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello <?= $user['name'] ?></h1>
                    <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <img src="<?= base_url('assets/dashboard_admin/'); ?>img/theme/background.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="<?= base_url('assets/dashboard_admin/img/profile/') . $user['image']; ?>">
                                    <img src="<?= base_url('assets/dashboard_admin/img/profile/') . $user['image']; ?>" class="rounded-circle" width="140px" height="140px">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-dark  mr-4 ">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">0</span>
                                        <span class="description">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading">
                                        <?php 
                                        if($user['role_id'] == 1){
                                            echo $photos;
                                        }else{
                                            echo "0";
                                        }
                                        ?>
                                        </span>
                                        <span class="description">Photos</span>
                                    </div>
                                    <div>
                                        <span class="heading">0</span>
                                        <span class="description">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="h3">
                                <?= $user['name'];?><span class="font-weight-light">, <?php $date = date_create($user['birthdate']);  
                                    echo date_format($date, 'd F Y')?></span>
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="fas fa-map-pin mr-2"></i>
                                <?php if($user['address'] == NULL){
                                    echo 'Where is your address';
                                }else{
                                    echo $user['address'];?>, <?= $user['city'];
                                } ?>
                                
                            </div>
                            <div class="h5 mt-4">
                                <i class="fas fa-briefcase mr-2"></i>
                                <?php if($user['phone'] == NULL){
                                    echo 'Your cellphone number';
                                }else{
                                    echo $user['phone'];
                                } ?>
                            </div>
                            <div>
                                <i class="fas fa-book-reader mr-2"></i>
                                <?php if($user['campus'] == NULL){
                                    echo 'Your university';
                                }else{
                                    echo $user['campus'];
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="padding: 0;border-bottom-width: 5px;">
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><strong><i class="<?= $icon?>"></i> <?= $title?></strong></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?= base_url('user/edit_profile'); ?>" class="btn btn-sm btn-success">Edit profile</a>
                            </div>
                        </div>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <div class="form-control"><?= $user['email'] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <div class="form-control"><?= $user['name'] ?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nickname">Nickname</label>
                                            <div class="form-control"><?= $user['nickname'] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="birthdate">Date of birth</label>
                                        <div class="form-control"><?= $user['birthdate'] ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="gender">Gender</label>
                                        <div class="form-control"><?= $user['gender'] ?></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="address">Address</label>
                                        <div class="form-control"><?= $user['address']?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="city">City</label>
                                        <div class="form-control"><?= $user['city']?></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="country">Country</label>
                                        <div class="form-control"><?= $user['country']?></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="postcode">Postal code</label>
                                        <div class="form-control"><?= $user['postcode']?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone">Phone Number</label>
                                        <div class="form-control"><?= $user['phone']?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone">Campus</label>
                                        <div class="form-control"><?= $user['campus']?></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <hr class="my-4"/>
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">About me</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">About Me</label>
                                    <textarea id="ckeditor" rows="4" class="form-control" readonly><?= $user['about']?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                    </div>
                </div>
            </div>
        </div>