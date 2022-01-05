    <div class="header pb-6 d-flex align-items-center" style="min-height: 150px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
        <span class="mask bg-gradient-dark opacity-7"></span>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0"><strong><i class="<?= $icon?>"></i> <?= $title?></strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <?php foreach($liked as $lik) : ?>
                            <div class="col-md-4">
                                <div class="card card-cascade wider">
                                    <div class="view view-cascade overlay">
                                        <img style="min-height: 15rem; background-image: url(<?= base_url('assets/dashboard_admin/img/gallery/') . $lik->gallery_image; ?>); background-size: cover; background-position: center center;" class="card-img-top">
                                        <a target="_blank" 
                                        href="<?php if($lik->category == 1){
                                            echo base_url('viewers/previewgallery/'.$lik->gallery_id);
                                        }elseif ($lik->category == 2) {
                                            echo base_url('viewers/previewphotography/'.$lik->gallery_id);
                                        }elseif ($lik->category == 3) {
                                            echo base_url('viewers/previewwork/'.$lik->gallery_id);
                                        }?>">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <div class="card-body text-center pb-0">
                                        <h4 class="card-title"><strong><?= $lik->gallery_name?></strong></h4>
                                            <p class="card-text"><?= word_limiter($lik->captions, 7)?></p>
                                            <div class="row text-left">
                                                <div class="col-md-6">
                                                <h5 class="card-text text-right mb-0">Category </h5>
                                                </div>
                                                <div class="col-md-6">
                                                <h5 class="mb-0">: 
                                                <?php if($lik->category == 1){
                                                    echo "Gallery";
                                                }elseif($lik->category == 2){
                                                    echo "Photography";
                                                }elseif($lik->category == 3){
                                                    echo "Work";
                                                }?></h5>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <div class="col-md-6">
                                                    <h5 class="card-text text-right mb-0">Type </h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="mb-0">: <?= $lik->type?></h5>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <div class="col-md-6">
                                                    <h5 class="card-text text-right mb-0">Viewed by </h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="mb-0">: <?= $lik->preview?> People</h5>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <div class="col-md-6">
                                                    <h5 class="card-text text-right mb-0">Liked by </h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>: <?= $lik->likegallery?> People</h5>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer mt-2 p-2 text-center">
                                        <?php $date = date_create($lik->date);?>
                                        <small class="text-muted">Publication date : <?= date_format($date, 'd F Y')?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                </div>
                </div>
            </div>
        </div>