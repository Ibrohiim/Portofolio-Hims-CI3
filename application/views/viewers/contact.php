<div id="colorlib-main">
    <div class="colorlib-contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class="heading-meta">Read</span>
                    <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft">Get in Touch</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-md-push-6">
                    <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="colorlib-icon">
                            <i class="icon-globe-outline"></i>
                        </div>
                        <div class="colorlib-text">
                            <p><a href="<?= base_url('viewers/contact')?>"><?= $about['email'];?></a></p>
                        </div>
                    </div>

                    <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="colorlib-icon">
                            <i class="icon-map"></i>
                        </div>
                        <div class="colorlib-text">
                            <p><?= $about['address'];?>, <?= $about['city'];?>, <?= $about['country'];?></p>
                        </div>
                    </div>

                    <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="colorlib-icon">
                            <i class="icon-phone"></i>
                        </div>
                        <div class="colorlib-text">
                            <p><a href="<?= base_url('viewers/contact')?>"><?= $about['phone'];?></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-md-pull-5">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('viewers/contact') ?>" method="POST">
                                <div class="form-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                                    <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
                                    <?= form_error('subject', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                                    <?= form_error('message', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-send-message" value="Send Message">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="colorlib-contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class="heading-meta">Map</span>
                    <h2 class="colorlib-heading animate-box" data-animate-effect="fadeInLeft">My Home</h2>
                </div>
            </div>
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.9022784125036!2d110.45835679548259!3d-7.68342088181725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5c44c21b3969%3A0xa2511780b32e6cd!2zN8KwNDAnNTQuNCJTIDExMMKwMjcnMzcuOSJF!5e0!3m2!1sid!2sid!4v1597652997983!5m2!1sid!2sid" 
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>