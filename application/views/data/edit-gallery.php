<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
        <!-- Header container -->
        <?php foreach ($editgallery as $eg) { ?>
        <div class="container-fluid d-flex align-items-center">
            <div class="col-lg-6 col-7 p-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin');?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('data/datagallery');?>">Gallery Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <?= form_open_multipart('data/updategallery'); ?>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $eg->id ?>">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0"><strong>Edit Photo gallery</strong></h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Photo information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Photo name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $eg->name; ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label class="form-control-label">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="<?= $eg->category?>"><?php if($eg->category == 1){
                                                echo "Gallery";
                                            }else{
                                            }?></option>
                                            <option value="1">Gallery</option>
                                            <option value="2">Photography</option>
                                            <option value="3">Work</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label class="form-control-label">Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="<?= $eg->type?>"><?= $eg->type?></option>
                                            <option value="Portrait Photography">Portrait Photography</option>
                                            <option value="Street Photography">Street Photography</option>
                                            <option value="Landscape Photography">Landscape Photography</option>
                                            <option value="Human Interest">Human Interest</option>
                                            <option value="Wildlife Photography">Wildlife Photography</option>
                                            <option value="Architectural Photography">Architectural Photography</option>
                                            <option value="Fashion Photography">Fashion Photography</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">About photo</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">About photo</label>
                                <textarea id="ckeditor" name="captions" class="form-control"><?= $eg->captions?></textarea>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Photo</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/dashboard_admin/img/gallery/') . $eg->image; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-3" />
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-12 text-right">
                                <a href="<?= base_url('data/detailgallery/' . $eg->id) ?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Detail</a>
                                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                <button type="submit" class="btn btn-sm btn-success">Save Change</button>
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