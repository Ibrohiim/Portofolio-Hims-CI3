<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin')?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">My Work</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-12 text-right">
                    <a href="" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#newWorkModal">Add New Work</a>
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
            <?= form_error('mywork', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                                <th scope="col">image</th>
                                <th scope="col">Type</th>
                                <th scope="col">preview</th>
                                <th scope="col">Like</th>
                                <th scope="col">Dislike</th>
                                <th scope="col">Status</th>
                                <th scope="col">Publish</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($work as $wo) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td class="text-center"><?= $wo['name']; ?></td>
                                    <td class="text-center"><a href="<?= base_url('data/detailwork/' . $wo['id']) ?>" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $wo['name']; ?>">
                                        <img alt="Image placeholder" style="width :36px; height :36px;" src="<?= base_url('assets/dashboard_admin/img/gallery/') . $wo['image']; ?>"></a></td>
                                    <td class="text-center"><?= $wo['type']; ?></td>
                                    <td class="text-center"><?= $wo['preview']; ?></td>
                                    <td class="text-center"><?= $wo['likegallery']; ?></td>
                                    <td class="text-center"><?= $wo['dislike']; ?></td>
                                    <td class="text-center">
                                    <?php 
                                        if($wo['status'] == 1){
                                            echo "Publish";
                                        }else{
                                            echo "Draft";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                    <?php 
                                        if($wo['status'] == '0'):?>
                                        <a class="btn btn-success btn-sm" href="<?= base_url('data/publishgallery/' . $wo['id']) ?>">Publish</i></a>
                                        <?php else : ?>
                                        <a class="btn btn-warning btn-sm" href="<?= base_url('data/draftgallery/' . $wo['id']) ?>">Draft</i></a>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                    <?php $date = date_create($wo['date']);  
                                    echo date_format($date, 'd F Y')?></td>
                                    <td class="text-center">
                                        <a class="badge badge-primary" href="<?= base_url('data/detailwork/' . $wo['id']) ?>"><i class="fa fa-eye"></i></a>
                                        <a class="badge badge-success" href="<?= base_url('data/editwork/' . $wo['id']) ?>"><i class="fas fa-edit"></i></a>
                                        <a class="badge badge-danger button-delete" href="<?= base_url('data/deletework/' . $wo['id']) ?>"><i class="far fa-trash-alt"></i></a>
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


    <div class="modal fade" id="newWorkModal" tabindex="-1" role="dialog" aria-labelledby="newWorkModalLabel" aria-hidden="true">
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
                            <h5 class="modal-title" id="newWorkModalLabel">Add New Work</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="<?= base_url('data/mywork'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="work Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="photo">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Captions</label>
                                <textarea id="ckeditor" name="captions" id="captions" class="form-control" ></textarea>
                            </div>
                            <div class="form-group">
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category Gallery</option>
                                <option value="1">Gallery</option>
                                <option value="2">Photography</option>
                                <option value="3">Work</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <select name="type" id="type" class="form-control">
                                <option value="">Select Type Photo</option>
                                <option value="Work">Work</option>
                            </select>
                            </div>
                            <div class="btn-wrapper text-center">
                                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                <button name="0" class="btn btn-sm btn-warning">Draf</button>
                                <button name="1" class="btn btn-sm btn-success">Publish</button>
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>