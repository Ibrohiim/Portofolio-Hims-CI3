<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
        <div class="container-fluid d-flex align-items-center">
            <div class="col-lg-6 col-7 p-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin');?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/about');?>">About</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <?= form_open_multipart('admin/edit_about'); ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0"><strong>Edit About</strong></h3>
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $about['name'] ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $about['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="birthdate">Date of birth</label>
                                        <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="Date of birth" value="<?= $about['birthdate'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="gender">Gender</label>
                                        <div class="pt-2">
                                        <?php
                                        if ($about['gender'] == 'Male') {
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
                                        <input type="text" id="address" name="address" class="form-control" placeholder="Home Address" value="<?= $about['address']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="city">City</label>
                                        <input type="text" id="city" name="city" class="form-control" placeholder="City" value="<?= $about['city']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="country">Country</label>
                                        <input type="text" id="country" name="country" class="form-control" placeholder="Country" value="<?= $about['country']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="postcode">Postal code</label>
                                        <input type="number" id="postalcode" name="postalcode" class="form-control" placeholder="Postal code" value="<?= $about['postalcode']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone">Phone Number</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" value="<?= $about['phone']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">About me</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Front Image</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/dashboard_admin/img/about/') . $about['front_image']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="alert alert-danger text-center p-2">
                                            <strong>Attention!</strong><br>
                                            If you don't want to change your front image, don't complete this section!
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="front_image" name="front_image">
                                            <label class="custom-file-label" for="front_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Background</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/dashboard_admin/img/about/') . $about['background']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="alert alert-danger text-center p-2">
                                            <strong>Attention!</strong><br>
                                            If you don't want to change your background, don't complete this section!
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="background" name="background">
                                            <label class="custom-file-label" for="background">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Curriculum Vitae</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/dashboard_admin/img/about/') . $about['cv']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="alert alert-danger text-center p-2">
                                            <strong>Attention!</strong><br>
                                            If you don't want to change your curriculum vitae, don't complete this section!
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cv" name="cv">
                                            <label class="custom-file-label" for="cv">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <textarea rows="4" id="ckeditor" name="description" class="form-control" ><?= $about['description'];?></textarea>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                    </div>
                </div>
            </div>
        </div>