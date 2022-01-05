<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin')?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">Message</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-12 text-right">
                    <a href="" class="btn btn-sm btn-neutral">Add New Message</a>
                    <a href="" class="btn btn-sm btn-neutral">Filters</a>
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
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header border-bottom-primary">
                        <h3 class="card-title">Message</h3>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-2"/>
                    <div class="card-body p-0">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($message as $mes) : ?>
                                        <tr>
                                            <td>
                                                <?= form_hidden($no++) ?>
                                                <button type="button" class="btn btn-sm"><i class="far fa-square"></i></button>
                                                <a class="button-delete" href="<?= site_url('admin/delete_message/' . $mes->id) ?>"><i class="far fa-trash-alt btn btn-sm"></i></a>
                                            </td>
                                            <td class="pl-0"><a href="<?= base_url('admin/read_message/' . $mes->id) ?>"><?= $mes->name ?></a></td>
                                            <td>
                                                <div><b><?= word_limiter($mes->subject, 3); ?></b> - <?= word_limiter($mes->message, 3); ?>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td><?= $mes->message_time ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer pt-3">
                        <div class="mailbox-controls">
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                            </div>
                            <a href="<?= base_url('admin/message') ?>"><button type="button" class="btn btn-sm"><i class="fas fa-sync-alt"></i></button></a>
                            <div class="float-right">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>