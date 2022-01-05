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
                            <li class="breadcrumb-item active" aria-current="page">Read Message</li>
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="col-lg">
                            <div class="text-center" style="font-size: 1.5rem"><b>Read Message</b></div>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mailbox-read-info">
                            <h4><?= $contact->subject ?></h4>
                            <h5>From: <?= $contact->email ?>
                                <span class="mailbox-read-time float-right"><?= $contact->message_time ?></span></h5>
                        </div>
                        <div class="card-footer border-bottom-primary text-center p-0 mb-3">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                    <i class="far fa-trash-alt"></i></button>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                                    <i class="fas fa-reply"></i></button>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                                    <i class="fas fa-share"></i></button>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                                    <i class="fas fa-print"></i></button>
                            </div>
                        </div>
                        <div class="mailbox-read-message text-center">
                            <?= $contact->message ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <a href="<?= base_url('admin/compose/' . $contact->id) ?>"><button type=" button" class="btn"><i class="fas fa-reply"></i> Reply</button></a>
                            <button type="button" class="btn"><i class="fas fa-share"></i> Forward</button>
                        </div>
                        <a class="button-delete" href="<?= site_url('admin/delete_message/' . $contact->id) ?>"><button type="button" class="btn"><i class="far fa-trash-alt"></i> Delete</button></a>
                        <button type="button" class="btn"><i class="fas fa-print"></i> Print</button>
                    </div>
                </div>
            </div>