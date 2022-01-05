<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
        <div class="container-fluid d-flex align-items-center">
                <div class="col-lg-6 col-7 p-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin');?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/slider');?>">Slider Management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    <!-- Page content -->
    <?php foreach ($editslider as $es) { ?>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <?= form_open_multipart('admin/update_slider'); ?>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $es->id ?>">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0"><strong>Edit Slider</strong></h3>
                            </div>
                            <div class="col-lg-12 col-12 text-right">
                                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Slider information</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Front Image</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/dashboard_admin/img/slider/') . $es->image; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $es->name ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="<?= $es->title ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="link">Link</label>
                                        <input type="text" id="link" name="link" class="form-control" placeholder="link" value="<?= $es->link ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-control-label">Is Active</label>
                                    <div class="form-control form-check" style="border: 0;">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                        Active?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Content</label>
                                <textarea rows="4" id="ckeditor" name="content" class="form-control" ><?= $es->content;?></textarea>
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