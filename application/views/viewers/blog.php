    <div id="colorlib-main">
        <div class="colorlib-blog">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                        <span class="heading-meta">Read</span>
                        <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft">Blog</h2>
                    </div>
                </div>
                <div class="row">
                    <?php $no = 1 ?>
                    <?php foreach ($blog as $bl) : ?>
                    <?php if ($bl['status'] == 1) { ?>
                    <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="blog-entry">
                            <a href="<?= base_url('assets/dashboard_admin/img/blog/') . $bl['image']; ?>" class="blog-img" style="height: 330px;"><img src="<?= base_url('assets/dashboard_admin/img/blog/') . $bl['image']; ?>" class="img-responsive"></a>
                            <div class="desc">
                                <span><small> <i class="fa fa-calendar-alt"></i> <?php $date = date_create($bl['date']); echo date_format($date, 'd F Y')?> 
                                </small> | <small> <?= $bl['category']; ?> </small> | <small> <i class="icon-eye"></i> <?= $bl['preview']; ?></small>
                                | <small> <i class="icon-heart"></i> <?= $bl['like_blog']; ?></small></span>
                                <h3><a href="<?= base_url('viewers/previewblog/' . $bl['id']) ?>"><?= $bl['title']; ?></a></h3>
                                <p><?= word_limiter($bl['contents'], 30); ?></p>
                                <a href="<?= base_url('viewers/previewblog/' . $bl['id']) ?>" class="lead">Read More <i class="icon-arrow-right3"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php }else {
                        
                    } ?>
                    <?php $no++ ?>
                    <?php endforeach; ?>
                </div>
                <div class="text-center">
                <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>