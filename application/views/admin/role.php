<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin');?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><?= $title?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-12 text-right">
                    <a href="" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#newRoleModal">New Role</a>
                    <a href="" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
            <?= form_error('menu', '<div class="alert alert-danger text-xl-center" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>', ' </div>'); ?>
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0"><?= $title; ?></h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($role as $r) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $r['role']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/roleaccess/' . $r['id']); ?>" class="badge badge-success"><i class="fas fa-edit">Access</i></a>
                                        <a class="badge badge-danger button-delete" href="<?= base_url() . 'admin/delete_role/' . $r['id']; ?>"><i class="far fa-trash-alt">Delete</i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer" style="padding: 0;border-bottom-width: 8px;">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="modal-header pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-header bg-transparent pt-0">
                        <div class="text-center">
                            <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="<?= base_url('admin/role'); ?>" method="POST">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                                </div>
                            </div>
                            <div class="btn-wrapper text-center">
                                <button type="submit" class="btn btn-success my-4">Add</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>