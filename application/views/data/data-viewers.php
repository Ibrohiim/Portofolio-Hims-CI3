<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin')?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><?= $title?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-12 text-right">
                    <a href="" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#newUserModal">Add New User</a>
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
            <?= form_error('subMenu', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                                <th scope="col">Email</th>
                                <th scope="col">image</th>
                                <th scope="col">Gender</th>
                                <th scope="col">role</th>
                                <th scope="col">Active</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($dataviewers as $dv) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td class="text-center"><?= substr($dv['name'],0,10); ?></td>
                                    <td class="text-center"><?= substr($dv['email'],0,22); ?></td>
                                    <td class="text-center"><a href="<?= base_url('data/detail_viewers/' . $dv['id']) ?>" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $dv['name']; ?>">
                                    <img alt="Image placeholder" style="width :36px; height :36px;" src="<?= base_url('assets/dashboard_admin/img/profile/') . $dv['image']; ?>"></a></td>
                                    <td class="text-center"><?= $dv['gender']; ?></td>
                                    <td class="text-center">
                                    <?php 
                                        if($dv['role_id'] == 1){
                                            echo "Admin";
                                        }else{
                                            echo "Viewers";
                                        }
                                        ?></td>
                                    <td class="text-center">
                                    <?php 
                                        if($dv['is_active'] == 1){
                                            echo "Active";
                                        }else{
                                            echo "Not Active";
                                        }
                                        ?></td>
                                    <td class="text-center">
                                    <?php $date = date_create($dv['date_created']);  
                                    echo date_format($date, 'd F Y')?></td>
                                    <td class="text-center">
                                        <a class="badge badge-primary" href="<?= base_url('data/detail_viewers/' . $dv['id']) ?>"><i class="fa fa-eye"></i></a>
                                        <a class="badge badge-success" href="<?= base_url('data/edit_viewers/' . $dv['id']) ?>"><i class="fas fa-edit"></i></a>
                                        <a class="badge badge-danger button-delete" href="<?= base_url('data/deleteuser/' . $dv['id']) ?>"><i class="far fa-trash-alt"></i></a>
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


    <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
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
                            <h5 class="modal-title" id="newUserModalLabel">Add New User</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="<?= base_url('data/data_viewers'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" type="date" id="birthdate" name="birthdate">
                                </div>
                            </div>
                            <div class="form-group">
                                <?php
                                if ($dv['gender'] == 'Male') {
                                echo '<input type="radio" name="gender"  value="Male" checked>Male
                                <input type="radio" name="gender" value="Female">Female';
                                } else {
                                echo '<input type="radio" name="gender" value="Male">Male
                                <input type="radio" name="gender" value="Female" checked>Female';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                            <select name="role_id" id="role_id" class="form-control">
                            <option value="">Select Role</option>
                                <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
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