<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(<?= base_url('assets/dashboard_admin/'); ?>img/theme/Hims.jpeg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin')?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Blog Management</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-12 text-right">
                    <a href="<?= base_url('admin/addblog');?>" class="btn btn-sm btn-neutral">Add New Blog</a>
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
            <?= form_error('blog', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                                <th scope="col">Blog Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Date</th>
                                <th scope="col">Category</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Like</th>
                                <th scope="col">Dislike</th>
                                <th scope="col">Status</th>
                                <th scope="col">Publish</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($blog as $bl) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td class="text-center"><?= word_limiter($bl['title'], 3); ?></td>
                                    <td class="text-center"><a href="<?= base_url('admin/detail_blog/' . $bl['id']) ?>" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $bl['title']; ?>">
                                    <img alt="Image placeholder" style="width :36px; height :36px;" src="<?= base_url('assets/dashboard_admin/img/blog/') . $bl['image']; ?>"></a></td>
                                    <td class="text-center">
                                    <?php $date = date_create($bl['date']);  
                                    echo date_format($date, 'd F Y')?></td>
                                    <td class="text-center"><?= $bl['category']; ?></td>
                                    <td class="text-center"><?= $bl['tag']; ?></td>
                                    <td class="text-center"><?= $bl['like_blog']; ?></td>
                                    <td class="text-center"><?= $bl['donotlike']; ?></td>
                                    <td class="text-center">
                                    <?php 
                                        if($bl['status'] == 1){
                                            echo "Publish";
                                        }else{
                                            echo "Draft";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                    <?php 
                                        if($bl['status'] == '0'):?>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('admin/publishblog/' . $bl['id']) ?>">Publish</i></a>
                                        <?php else : ?>
                                        <a class="btn btn-warning btn-sm" href="<?= base_url('admin/draftblog/' . $bl['id']) ?>">Draft</i></a>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a class="badge badge-primary" href="<?= base_url('admin/detail_blog/' . $bl['id']) ?>"><i class="fa fa-eye"></i></a>
                                        <a class="badge badge-success" href="<?= base_url('admin/edit_blog/' . $bl['id']) ?>"><i class="fas fa-edit"></i></a>
                                        <a class="badge badge-danger button-delete" href="<?= base_url('admin/deleteblog/' . $bl['id']) ?>"><i class="far fa-trash-alt"></i></a>
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