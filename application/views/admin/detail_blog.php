<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="col-lg-6 col-7 p-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin');?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/blogadmin');?>">Blog Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Detail Blog </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?= base_url('admin/edit_blog/' . $detailblog->id) ?>" class="btn btn-sm btn-primary">Edit Blog</a>
                            </div>
                        </div>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Thumbnail</h6>
                            <div class="pl-lg-4">
                                <div class="row justify-content-center">
                                    <div class="card align-items-center">
                                        <img style="width: 50%;height:auto;" src="<?= base_url('assets/dashboard_admin/img/blog/') . $detailblog->image; ?>">
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Information -->
                            <h6 class="heading-small text-muted mb-4">Blog information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="title">Blog title</label>
                                        <div class="form-control"><?= $detailblog->title;?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="slug">Blog Slug</label>
                                        <div class="form-control"><?= $detailblog->slug;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="category">Category</label>
                                        <div class="form-control"><?= $detailblog->category;?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="date">Date created</label>
                                        <div class="form-control"><?php $date = date_create($detailblog->date);  
                                        echo date_format($date, 'd F Y')?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="tag">Tag</label>
                                        <div class="form-control"><?= $detailblog->tag;?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="status">Status</label>
                                        <div class="form-control"><?php 
                                        if($detailblog->status == 1){ echo "Publish";
                                        }else{ echo "Draft"; } ?></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">Contents Blog</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Contents</label>
                                    <textarea id="ckeditor" class="form-control" readonly><?= $detailblog->contents?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                    </div>
                </div>
            </div>
        </div>