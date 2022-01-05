<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin')?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><?= $title ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-12 text-right">
                    <a href="" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#newServicesModal">Add New Services</a>
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
            <?= form_error('services', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>', ' </div>'); ?>
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
                    <table class="table table-responsive align-items-center table-dark table-flush text-center datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Description</th>
                                <th scope="col">Active</th>
                                <th scope="col">Date</th>
                                <th scope="col">Publish</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($services as $ser) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td class="text-center"><?= $ser['name']; ?></td>
                                    <td class="text-center"><i class="<?= $ser['icon']; ?>"></i></td>
                                    <td class="text-center"><?= word_limiter($ser['description'], 5); ?></td>
                                    <td class="text-center">
                                    <?php 
                                        if($ser['is_active'] == 1){
                                            echo "Publish";
                                        }else{
                                            echo "Draft";
                                        }
                                    ?></td>
                                    <td class="text-center">
                                    <?php $date = date_create($ser['date_created']);  
                                    echo date_format($date, 'd F Y')?></td>
                                    <td class="text-center">
                                    <?php 
                                        if($ser['is_active'] == '0'):?>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('admin/publishservices/' . $ser['id']) ?>">Publish</i></a>
                                        <?php else : ?>
                                        <a class="btn btn-warning btn-sm" href="<?= base_url('admin/draftservices/' . $ser['id']) ?>">Draft</i></a>
                                        <?php endif; ?></td>
                                    <td class="text-center">
                                        <a class="badge badge-success" href="<?= base_url('admin/edit_services/' . $ser['id']) ?>"><i class="fas fa-edit"></i></a>
                                        <a class="badge badge-danger button-delete" href="<?= base_url('admin/deleteservices/' . $ser['id']) ?>"><i class="far fa-trash-alt"></i></a>
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


    <div class="modal fade" id="newServicesModal" tabindex="-1" role="dialog" aria-labelledby="newServicesModalLabel" aria-hidden="true">
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
                            <h5 class="modal-title" id="newServicesModalLabel">Add New Services</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="<?= base_url('admin/services'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Services Name">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="custom-toggle" for="is_active">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                    <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
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