<div id="colorlib-main">
    <div class="colorlib-work" style="padding-bottom: 2em;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                    <span class="heading-meta">READ</span>
                    <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft"><?= $title;?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 image-content">
                    <img class="img-responsive" src="<?= base_url('/assets/dashboard_admin/img/blog/' . $previewblog->image) ?>">
                </div>
                <div class="col-md-7">
                    <div id="sticky_item">
                        <div class="project-desc">
                            <h2 class="text-center" style="margin-top: 2rem;"><?= $previewblog->title; ?></h2>
                            <span class="text-center"><small> <i class="fa fa-list-alt"></i> Tag : <?= $previewblog->tag; ?></small> | <small><i class="fa fa-calendar-alt"></i> Publication date : <?php $date = date_create($previewblog->date); echo date_format($date, 'd F Y')?> 
                                </small> | <small><i class="fa fa-list-alt"></i> Category : <?= $previewblog->category; ?> </small></span>
                            <p><?= $previewblog->contents; ?></p>
                            <p class="icon" style="margin-bottom: 0.5rem;">
                                <span><i class="icon-eye"></i> <?= $previewblog->preview; ?></span>
                                <span><i class="icon-heart"></i> <?= $previewblog->like_blog; ?></span>
                            </p>
                            <p style="margin-bottom: 0;color: transparent;"><input type="text" id="clip" style="height: 11px;width: 151px;border: transparent;" value="<?= base_url(uri_string())?>" readonly></p>
                            <p class="icon" style="margin-bottom: 1rem;">
                            <a onclick="copyClipboard()" class="btn" style="background-color: #666666;"><i class="icon-share3"></i></a>
                            <?php if($this->session->userdata('email') !== null): ?>
                                <?php if($ceklike == 0): ?>
                                <a href="<?= base_url('viewers/likeblog/'.$previewblog->id)?>" class="btn" style="background-color: #666666;"><i class="fa fa-thumbs-up"></i></a>
                                <?php else: ?>
                                <a data-toggle="tooltip" data-placement="top" title="Already liked" href="javascript:void(0)" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a>
                                <?php endif; ?>
                                <?php if($cekdislike == 0): ?>
                                <a href="<?= base_url('viewers/dislikeblog/'.$previewblog->id)?>" class="btn" style="background-color: #666666;"><i class="fa fa-thumbs-down"></i></a>
                                <?php else: ?>
                                <a data-toggle="tooltip" data-placement="top" title="Dislike" href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-thumbs-up"></i></a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?= base_url('auth')?>" class="btn delete-button" style="background-color: #666666;"><i class="fa fa-thumbs-up"></i></a>
                                <a href="<?= base_url('auth')?>" class="btn delete-button" style="background-color: #666666;"><i class="fa fa-thumbs-down"></i></a>
                            <?php endif; ?>
                            </p>
                            <p><a href="<?= base_url('viewers/blog')?>" class="btn btn-primary">See Another</a>
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
                        <?= form_open_multipart('viewers/commentblog');?>
                            <input type="hidden" name="id" id="id" value="<?= $previewblog->id?>">
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
    <?php foreach($comment as $com): ?>
    <div id="get-in-touch" class="colorlib-bg-color"
    style="padding-bottom: 0em;padding-top: 1rem;">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md animate-box" data-animate-effect="fadeInLeft">
                    <div class="col-md-2 image-content text-center">
                        <img class="img-circle" style="width: 60%;" src="<?= base_url('/assets/dashboard_admin/img/profile/' . $com->image_user) ?>">
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label style="margin: 0;"><?= $com->name?></label><br>
                            <?php $date = date_create($com->date_comment); ?>
                            <small>
                                <?= date_format($date, "d F Y");?>
                            </small>
                            <div class="form-control" style="height:4.5rem;" readonly>
                            " <?= $com->comments?> "
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $no++ ?>
    <?php endforeach; ?>