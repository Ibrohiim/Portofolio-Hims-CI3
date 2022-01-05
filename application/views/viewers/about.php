    <div id="colorlib-main">
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
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Personal Details
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
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
                                        <div class="panel-body">
                                            <div class="about-img animate-box" style="background-image: url(<?= base_url('assets/dashboard_admin/img/about/') . $about['cv']; ?>);width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>