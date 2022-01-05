    <div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <?= form_open_multipart('admin/addblog'); ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><strong>Add Blog</strong></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?= base_url('admin/blogadmin/') ?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Back</a>
                                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                <button name="0" class="btn btn-sm btn-warning">Draf</button>
                                <button name="1" class="btn btn-sm btn-success">Publish</button>
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
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Blog Title">
                                        <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="category">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">== CATEGORY BLOG ==</option>
                                            <option value="Berita">Berita</option>
                                            <option value="Olahraga">Olahraga</option>
                                            <option value="Politik">Politik</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="tag">Tag</label>
                                        <input type="text" id="tag" name="tag" class="form-control" placeholder="Tag">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Contents</label>
                                <textarea id="ckeditor" name="contents" class="form-control" ></textarea>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                    </div>
                </div>
            </div>
        </div>