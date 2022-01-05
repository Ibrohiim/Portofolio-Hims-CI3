<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin')?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/message');?>">Message</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Compose</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= form_error('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>', ' </div>'); ?>
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-3">
            <a href="#" class="btn btn-white btn-block mb-3">Compose</a>
                <div class="card">
                    <div class="card-header">
                        <div class="btn btn-dark btn-block">Folders</div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="<?= base_url('admin/message') ?>" class="nav-link" style="color: #212529;">
                                    <i class="fas fa-inbox"></i> Inbox
                                    <span class="badge badge-success badge-counter float-right" style="font-size: 90%"><?= count($message) ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" style="color: #212529;">
                                    <i class="far fa-envelope"></i> Sent
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" style="color: #212529;">
                                    <i class="far fa-file-alt"></i> Drafts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" style="color: #212529;">
                                    <i class="fas fa-filter"></i> Junk
                                    <span class="badge badge-success badge-counter float-right" style="font-size: 90%">65</span>
                                </a>
                            </li>
                            <li class="nav-item" style="padding-right: 16px;">
                                <a href="#" class="nav-link" style="color: #212529;">
                                    <i class="far fa-trash-alt"></i> Trash
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="btn btn-dark btn-block">Labels</div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" style="color: #212529;">
                                    <i class="far fa-circle text-danger"></i>
                                    Important
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" style="color: #212529;">
                                    <i class="far fa-circle text-warning"></i> Promotions
                                </a>
                            </li>
                            <li class="nav-item" style="padding-right: 16px;">
                                <a href="#" class="nav-link" style="color: #212529;">
                                    <i class="far fa-circle text-primary"></i> Social
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Compose Message</h3>
                    </div>
                    <?php foreach ($contact as $cont) : ?>
                        <form action="<?= base_url('admin/compose_action') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" id="id_contact" name="id_contact" class="form-control">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="To:" value="<?= $cont->email ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject:">
                                </div>
                                <div class="form-group">
                                    <textarea id="message" name="message" class="form-control" style="height: 300px"></textarea>
                                </div> 
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="button" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i> Draft</button>
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-envelope"></i> Send</button>
                                </div>
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Discard</button>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>