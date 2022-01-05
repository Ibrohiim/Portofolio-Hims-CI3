<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid d-flex align-items-center">
            <div class="col-lg-6 col-7 p-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin');?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/blogadmin');?>">Blog Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <?php foreach ($editblog as $eb) { ?>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <?= form_open_multipart('admin/update_blog'); ?>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $eb->id ?>">
                <input type="hidden" name="status" value="<?= $eb->status?>">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0"><strong>Edit Blog</strong></h3>
                            </div>
                            <div class="col-lg-12 col-12 text-right">
                                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                <?php 
                                    if($eb->status == 1) :?>
                                    <button name="0" class="btn btn-sm btn-success">Draf</button>
                                    <?php else: ?>
                                    <button name="1" class="btn btn-sm btn-success">Publish</button>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Blog information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?= $eb->title?>">
                                        <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="<?= $eb->slug?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="category">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="<?= $eb->category?>"><?= $eb->category?></option>
                                            <option value="Berita">Berita</option>
                                            <option value="Olahraga">Olahraga</option>
                                            <option value="Politik">Politik</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="tag">Tag</label>
                                        <input type="text" id="tag" name="tag" class="form-control" value="<?= $eb->tag?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Thumbnail</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/dashboard_admin/img/blog/') . $eb->image; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="alert alert-danger text-center">
                                            <strong>Attention!</strong><br>
                                            If you do not wish to change the thumbnail, Do not complete this section
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Contents</label>
                                <textarea id="ckeditor" name="contents" class="form-control"><?= $eb->contents?></textarea>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                    </div>
                </div>
            </div>
        </div>
        <?php }?>