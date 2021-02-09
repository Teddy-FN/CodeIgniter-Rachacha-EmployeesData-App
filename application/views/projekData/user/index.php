<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Pemberitahuan kalau terjadi kalau data gagal -->
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 float-left"><?= $title; ?></h1>
    <form class="form-inline float-right">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div style="clear: both;">
        <!-- data yang sudah di update akan muncul ke dalam message -->
        <div class="row">
            <div class="col-lg-6">
                <?php echo
                    $this->session->flashdata('message');
                ?>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['name']; ?></h5>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <!-- d itu hari F itu bulan Y untuk tahun -->
                        <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']); ?></small></p>
                    </div>
                    <button type="button" class="btn btn-outline-info ml-3" data-toggle="modal" data-target="#modelId">See My Profile</button>
                    <a href="<?= base_url(); ?>user/edit/<?= $user['id']; ?>" type="button" class="btn btn-primary mr-3" style="float: right;">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->





<!-- Modal See My Profile -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user"></i> My Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email : </label>
                            <div class="col-sm-10">
                                <label class="col-form-label col-form-label-sm"><?= $user['email']; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Name : </label>
                            <div class="col-sm-10">
                                <label class="col-form-label col-form-label-sm"><?= $user['name']; ?></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>