<div id="colorlib-main">
    <aside id="colorlib-hero" class="js-fullheight" style="margin-bottom: 3em;">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <?php $no = 1 ?>
                <?php foreach ($slider as $sl) : ?>
                <?php if ($sl->is_active == 1) { ?>
                <li style="background-image: url(<?= base_url('/assets/dashboard_admin/img/slider/' . $sl->image) ?>);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-md-pull-2 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1><?= $sl->title ?></h1>
                                        <h2><?= $sl->content ?></h2>
                                        <p><a href="<?= base_url($sl->link); ?>" class="btn btn-primary btn-learn">See More<i class="icon-arrow-right3"></i></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php }else {
                    
                } ?>
                <?php $no++ ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </aside>

    <div class="colorlib-about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-img animate-box" data-animate-effect="fadeInLeft" style="background-image: url(<?= base_url('assets/dashboard_admin/img/about/') . $about['background']; ?>);">
                        <div class="about-img-2 animate-box" data-animate-effect="fadeInRight" style="background-image: url(<?= base_url('assets/dashboard_admin/img/about/') . $about['front_image']; ?>);"></div>
                    </div>
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="about-desc">
                        <span class="heading-meta" style="margin-top: 15px;">Welcome &amp; Introduce</span>
                        <h3>Halo! my name is <?= $about['name'];?>!</h3>
                        <p><?= $about['description'];?></p>
                    </div>
                        <div class="fancy-collapse-panel">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Personal Details
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md">
                                                <p style="margin-bottom: 0;">Name : <?= $about['name'];?></p>
                                                <p style="margin-bottom: 0;">Date of birth : <?= $about['birthdate'];?></p>
                                                <p style="margin-bottom: 0;">Gender : <?= $about['gender'];?></p>
                                                <p style="margin-bottom: 0;">Marital status : Single</p>
                                                <p style="margin-bottom: 0;">Religion : Islam</p>
                                                <p style="margin-bottom: 0;">Nationality : <?= $about['country'];?></p>
                                                <p style="margin-bottom: 0;">City : <?= $about['city'];?></p>
                                                <p style="margin-bottom: 0;">Address : <?= $about['address'];?></p>
                                                <p style="margin-bottom: 0;">Phone : <?= $about['phone'];?></p>
                                                <p style="margin-bottom: 0;">E-mail : <?= $about['email'];?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Education Details
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <ul>
                                            <li>2006 – 2000 State Elementary School Banjarharjo</li>
                                            <li>2000 – 2000 State Junior High School 1 Ngemplak</li>
                                            <li>2000 – 2000 State Senior High School 1 Ngemplak</li>
                                            <li>2000 – 2000 Universitas Amikom Yogyakarta</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">My Specialties
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <ul>
                                            <li>Internet marketing</li>
                                            <li>Pemrograman (Java, C++, Android, PHP, HTML)</li>
                                            <li>Basis Data (SQL)</li>
                                            <li>Microsoft Office</li>
                                            <li>Bahasa Inggris (Aktif)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Personality
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <p>Honest, kind, hardworking, diligent, tolerant, ready to work with a team, disciplined, and responsible.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">What I do?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <p>nongkrong(sitting, talking, and doing nothing).</p>
                                        <ul>
                                            <li>Nothing</li>
                                            <li>Nothing</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingSix">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Curriculum Vitae
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                    <div class="panel-body text-center project-desc">
                                        <div class="about-img animate-box" style="background-image: url(<?= base_url('assets/dashboard_admin/img/about/') . $about['cv']; ?>);width: 100%;"></div>
                                        <p style="margin-top: 5px;margin-bottom:0px;"><a href="<?= base_url('viewers/downloadcv/' . $about['id']); ?>" class="btn-download">Download CV</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-services">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                    <span class="heading-meta">What I do?</span>
                    <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft">Here are some of my expertise</h2>
                </div>
            </div>
            <div class="row">
                <?php $no = 1 ?>
                <?php foreach ($services as $ser) : ?>
                <?php if ($ser->is_active == 1) { ?>
                <div class="col-md-6">
                    <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft" style="margin-bottom: 0px;">
                        <div class="colorlib-icon">
                            <i class="<?= $ser->icon ?>"></i>
                        </div>
                        <div class="colorlib-text">
                            <h3 style="margin-bottom: 10px;"><?= $ser->name ?></h3>
                            <p><?= $ser->description ?> </p>
                        </div>
                    </div>
                </div>
                <?php }else {
                        
                } ?>
                <?php $no++ ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="colorlib-work">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                    <span class="heading-meta">My Work</span>
                    <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft">Recent Work</h2>
                </div>
            </div>
            <div class="row">
                <?php $no = 1 ?>
                <?php foreach ($work as $wo) : ?>
                <?php if ($wo->status == 1) { ?>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(<?= base_url('/assets/dashboard_admin/img/gallery/' . $wo->image) ?>);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="<?= base_url('viewers/previewwork/' . $wo->id) ?>"><?= $wo->name; ?></a></h3>
                                <span>Branding, Ilustration</span>
                                <p style="margin-top: 10px;"><a href="<?= base_url('viewers/previewwork/' . $wo->id) ?>" class="btn btn-sm btn-primary">Preview</a><br>
                                <p class="icon">
                                    <span><a href="<?= base_url('viewers/previewwork/' . $wo->id) ?>"><i class="icon-share3"></i></a></span>
                                    <span><a href="<?= base_url('viewers/previewwork/' . $wo->id) ?>"><i class="icon-eye"></i> <?=$wo->preview?></a></span>
                                    <span><a href="<?= base_url('viewers/previewwork/' . $wo->id) ?>"><i class="icon-heart"></i> <?=$wo->likegallery?></a></span>
                                    <span><a href="<?= base_url('viewers/previewwork/' . $wo->id) ?>"><i class="icon-messages"></i> 7</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else {
                        
                } ?>
                <?php $no++ ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="colorlib-work">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                    <span class="heading-meta">My Gallery</span>
                    <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft">Recent Gallery</h2>
                </div>
            </div>
            <div class="row">
                <?php $no = 1 ?>
                <?php foreach ($gallery as $gal) : ?>
                <?php if ($gal->status == 1) { ?>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(<?= base_url('/assets/dashboard_admin/img/gallery/' . $gal->image) ?>);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="<?= base_url('viewers/previewgallery/' . $gal->id) ?>"><?= $gal->name; ?></a></h3>
                                <span>Branding, Ilustration</span>
                                <p style="margin-top: 10px;"><a href="<?= base_url('viewers/previewgallery/' . $gal->id) ?>" class="btn btn-sm btn-primary">Preview</a><br>
                                <p class="icon">
                                    <span><a href="<?= base_url('viewers/previewgallery/' . $gal->id) ?>"><i class="icon-share3"></i></a></span>
                                    <span><a href="<?= base_url('viewers/previewgallery/' . $gal->id) ?>"><i class="icon-eye"></i> <?= $gal->preview; ?></a></span>
                                    <span><a href="<?= base_url('viewers/previewgallery/' . $gal->id) ?>"><i class="icon-heart"></i> <?= $gal->likegallery; ?></a></span>
                                    <span><a href="<?= base_url('viewers/previewgallery/' . $gal->id) ?>"><i class="icon-messages"></i> 7</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else {
                        
                } ?>
                <?php $no++ ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="colorlib-work">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                    <span class="heading-meta">My Photography</span>
                    <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft">Recent Photography</h2>
                </div>
            </div>
            <div class="row">
                <?php $no = 1 ?>
                <?php foreach ($photography as $pg) : ?>
                <?php if ($pg->status == 1) { ?>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(<?= base_url('/assets/dashboard_admin/img/gallery/' . $pg->image) ?>);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="<?= base_url('viewers/previewphotography/' . $pg->id) ?>"><?= $pg->name; ?></a></h3>
                                <span>Branding, Ilustration</span>
                                <p style="margin-top: 10px;"><a href="<?= base_url('viewers/previewphotography/' . $pg->id) ?>" class="btn btn-sm btn-primary">Preview</a><br>
                                <p class="icon">
                                    <span><a href="<?= base_url('viewers/previewphotography/' . $pg->id) ?>"><i class="icon-share3"></i></a></span>
                                    <span><a href="<?= base_url('viewers/previewphotography/' . $pg->id) ?>"><i class="icon-eye"></i> <?= $pg->preview; ?></a></span>
                                    <span><a href="<?= base_url('viewers/previewphotography/' . $pg->id) ?>"><i class="icon-heart"></i> <?= $pg->likegallery; ?></a></span>
                                    <span><a href="<?= base_url('viewers/previewphotography/' . $pg->id) ?>"><i class="icon-messages"></i> 7</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else {
                        
                } ?>
                <?php $no++ ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="colorlib-blog">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                    <span class="heading-meta">Read</span>
                    <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft">Recent Blog</h2>
                </div>
            </div>
            <div class="row">
                <?php $no = 1 ?>
                <?php foreach ($blog as $bl) : ?>
                <?php if ($bl->status == 1) { ?>
                <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="blog-entry">
                        <a href="<?= base_url('assets/dashboard_admin/img/blog/') . $bl->image; ?>" class="blog-img" style="height: 330px;"><img src="<?= base_url('assets/dashboard_admin/img/blog/') . $bl->image; ?>" class="img-responsive"></a>
                        <div class="desc">
                            <span><small> <i class="fa fa-calendar-alt"></i> <?php $date = date_create($bl->date); echo date_format($date, 'd F Y')?> 
                            </small> | <small> <?= $bl->category; ?> </small> | <small> <i class="icon-eye"></i> <?= $bl->preview; ?></small>
                            | <small> <i class="icon-heart"></i> <?= $bl->like_blog; ?></small></span>
                            <h3><a href="<?= base_url('viewers/previewblog/' . $bl->id) ?>"><?= $bl->title; ?></a></h3>
                            <p><?= word_limiter($bl->contents, 30); ?></p>
                            <a href="<?= base_url('viewers/previewblog/' . $bl->id) ?>" class="lead">Read More <i class="icon-arrow-right3"></i></a>
                        </div>
                    </div>
                </div>
                <?php }else {
                        
                } ?>
                <?php $no++ ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
