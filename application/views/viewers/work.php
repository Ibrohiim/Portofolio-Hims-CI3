        <div id="colorlib-main">
            <div class="colorlib-work">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                            <span class="heading-meta">Portfolio</span>
                            <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft">My Work</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php $no = 1 ?>
                        <?php foreach ($work as $wo) : ?>
                        <?php if ($wo['status'] == 1) { ?>
                        <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                            <div class="project" style="background-image: url(<?= base_url('/assets/dashboard_admin/img/gallery/' . $wo['image']) ?>);">
                                <div class="desc">
                                    <div class="con">
                                        <h3><a href="<?= base_url('viewers/previewwork/' . $wo['id']) ?>"><?= $wo['name']; ?></a></h3>
                                        <span>Branding, Ilustration</span>
                                        <p style="margin-top: 10px;"><a href="<?= base_url('viewers/previewwork/' . $wo['id']) ?>" class="btn btn-sm btn-primary">Preview</a><br>
                                        <p class="icon">
                                            <span><a href="<?= base_url('viewers/previewwork/' . $wo['id']) ?>"><i class="icon-share3"></i></a></span>
                                            <span><a href="<?= base_url('viewers/previewwork/' . $wo['id']) ?>"><i class="icon-eye"></i> <?=$wo['preview']?></a></span>
                                            <span><a href="<?= base_url('viewers/previewwork/' . $wo['id']) ?>"><i class="icon-heart"></i> <?=$wo['likegallery']?></a></span>
                                            <span><a href="<?= base_url('viewers/previewwork/' . $wo['id']) ?>"><i class="icon-messages"></i> 7</a></span>
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
                    <div class="text-center">
                    <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>