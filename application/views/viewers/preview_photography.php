<div id="colorlib-main">

    <div class="colorlib-work">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                    <span class="heading-meta">PHOTOGRAPHY</span>
                    <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft"><?= $title?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 image-content">
                    <img class="img-responsive" src="<?= base_url('/assets/dashboard_admin/img/gallery/' . $previewphotography->image) ?>">
                </div>
                <div class="col-md-4 sticky-parent">
                    <div id="sticky_item">
                        <div class="project-desc">
                            <h2><?= $previewphotography->name; ?></h2>
                            <span><a href=""><?= $previewphotography->type; ?></a></span>
                            <p><?= $previewphotography->captions; ?></p>
                            <p class="icon" style="margin-bottom: 0.5rem;">
                                <span><i class="icon-eye"></i> <?= $previewphotography->preview; ?></span>
                                <span><i class="icon-heart"></i> <?= $previewphotography->likegallery; ?></span>
                            </p>
                            <p style="margin-bottom: 0;color: transparent;"><input type="text" id="clip" style="height: 11px;width: 151px;border: transparent;" value="<?= base_url(uri_string())?>" readonly></p>
                            <p class="icon" style="margin-bottom: 2px;">
                            <a onclick="copyClipboard()" class="btn" style="background-color: #666666;"><i class="icon-share3"></i></a>
                            <?php if($this->session->userdata('email') !== null): ?>
                                <?php if($ceklike == 0): ?>
                                <a href="<?= base_url('viewers/like/'.$previewphotography->id)?>" class="btn" style="background-color: #666666;"><i class="fa fa-thumbs-up"></i></a>
                                <?php else: ?>
                                <a data-toggle="tooltip" data-placement="top" title="Already liked" href="javascript:void(0)" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a>
                                <?php endif; ?>
                                <?php if($cekdislike == 0): ?>
                                <a href="<?= base_url('viewers/dislike/'.$previewphotography->id)?>" class="btn" style="background-color: #666666;"><i class="fa fa-thumbs-down"></i></a>
                                <?php else: ?>
                                <a data-toggle="tooltip" data-placement="top" title="Dislike" href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-thumbs-up"></i></a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?= base_url('auth')?>" class="btn delete-button" style="background-color: #666666;"><i class="fa fa-thumbs-up"></i></a>
                                <a href="<?= base_url('auth')?>" class="btn delete-button" style="background-color: #666666;"><i class="fa fa-thumbs-down"></i></a>
                            <?php endif; ?>
                            </p>
                            <p><a href="<?= base_url('viewers/photography')?>" class="btn btn-primary">See Another</a> or 
                            <a href="<?= base_url('viewers/downloadgallery/' . $previewphotography->id); ?>" class="btn-download">Download</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php if($this->session->userdata('email') !== null): ?>
    <div id="get-in-touch" class="colorlib-bg-color">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md animate-box" data-animate-effect="fadeInLeft">
                    <div class="col-md-3 image-content text-center">
                        <img class="img-circle" style="width: 70%;" src="<?= base_url('/assets/dashboard_admin/img/profile/' . $user['image']) ?>">
                    </div>
                    <div class="col-md-8">
                    <?= $this->session->flashdata('message'); ?>
                        <?= form_open_multipart('viewers/commentgallery');?>
                            <input type="hidden" name="id" id="id" value="<?= $previewphotography->id?>">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $user['id']?>">
                            <div class="form-group">
                                <label>Your Username</label>
                                <input type="text" class="form-control" style="height:4rem;padding: 0;padding-left:1.8rem;"
                                value="<?= $user['name']?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label>Post a Comment</label>
                                <textarea name="comments" id="comments" class="form-control" rows="5" 
                                placeholder="Your comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>
                        <?= form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div id="get-in-touch" class="colorlib-bg-color text-center">
        <div class="colorlib-narrow-content">
        <label class="text-danger">You are not logged in</label><br>
            <a href="<?= base_url('auth'); ?>">Login</a> or <a href="<?= base_url('auth/registration'); ?>">Register</a> to comment
        </div>
    </div>
    <?php endif; ?>
    <hr style="margin-top: 1rem;margin-bottom: 1rem;">
    &nbsp &nbsp<i class="fas fa-comments"> Comments</i>
    <hr style="margin-top: 1rem;">
    <?php $no = 1 ?>
    <?php foreach($commentgallery as $comg): ?>
    <div id="get-in-touch" class="colorlib-bg-color"
    style="padding-bottom: 0em;padding-top: 1rem;">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md animate-box" data-animate-effect="fadeInLeft">
                    <div class="col-md-2 image-content text-center">
                        <img class="img-circle" style="width: 60%;" src="<?= base_url('/assets/dashboard_admin/img/profile/' . $comg->image_user) ?>">
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label style="margin: 0;"><?= $comg->user_name?></label><br>
                            <?php $date = date_create($comg->date_comment); ?>
                            <small>
                                <?= date_format($date, "d F Y");?>
                            </small>
                            <div class="form-control" style="height:4.5rem;" readonly>
                            " <?= $comg->comments?> "
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $no++ ?>
    <?php endforeach; ?>