    <div class="header pb-6 d-flex align-items-center" style="min-height: 150px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/background-2.jpg); background-size: cover; background-position: center top;">
        <span class="mask bg-gradient-dark opacity-7"></span>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <?= form_open_multipart('user/edit_profile'); ?>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id'] ?>">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><strong><i class="<?= $icon?>"></i> <?= $title?></strong></h3>
                            </div>
                            <div class="col-lg-12 col-12 text-right">
                                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email address</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nickname">Nickname</label>
                                        <input type="text" class="form-control" id="nickname" name="nickname" value="<?= $user['nickname'] ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="birthdate">Date of birth</label>
                                        <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="Date of birth" value="<?= $user['birthdate'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="gender">Gender</label>
                                        <div class="pt-2">
                                        <?php
                                        if ($user['gender'] == 'Male') {
                                            echo '<input type="radio" name="gender"  value="Male" checked>Male
                                            <input type="radio" name="gender" value="Female">Female';
                                        } else {
                                                echo '<input type="radio" name="gender" value="Male">Male
                                            <input type="radio" name="gender" value="Female" checked>Female';
                                        }
                                        ?>
                                        </div>
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
                                        <input type="text" id="address" name="address" class="form-control" placeholder="Home Address" value="<?= $user['address']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="city">City</label>
                                        <input type="text" id="city" name="city" class="form-control" placeholder="City" value="<?= $user['city']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="country">Country</label>
                                        <input type="text" id="country" name="country" class="form-control" placeholder="Country" value="<?= $user['country']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="postcode">Postal code</label>
                                        <input type="number" id="postcode" name="postcode" class="form-control" placeholder="Postal code" value="<?= $user['postcode']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone">Phone Number</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" value="<?= $user['phone']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="campus">Campus</label>
                                        <input type="text" id="campus" name="campus" class="form-control" placeholder="Campus" value="<?= $user['campus']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">About me</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">About Me</label>
                                <textarea id="ckeditor" name="about" class="form-control"><?= $user['about']?></textarea>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Picture</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/dashboard_admin/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="alert alert-danger text-center p-2">
                                            <strong>Attention!</strong><br>
                                            If you don't want to change your profile photo, don't complete this section.
                                            Max size : 5mb
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                    </div>
                </div>
            </div>
        </div>