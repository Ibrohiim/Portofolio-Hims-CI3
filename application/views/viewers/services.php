    <div id="colorlib-main">
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