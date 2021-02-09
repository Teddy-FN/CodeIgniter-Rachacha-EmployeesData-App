<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 float-left"><?= $title; ?></h1>
    <form class="form-inline float-right">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div style="clear: both;">
        <?php foreach ($data->result_array() as $member) : ?>
            <div class="card-deck">
                <div class="col-sm mb-3">
                    <div class="card">
                        <div class="card m-2" style="max-width: 580px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?= base_url('assets/img/') . $member['image']; ?>" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $member['name']; ?></h5>
                                        <p class="card-text"><?= $member['email']; ?></p>
                                        <!-- d itu hari F itu bulan Y untuk tahun -->
                                        <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $member['date_created']); ?></small></p>
                                    </div>
                                    <a href="<?= base_url(); ?>member/myInfo/<?= $member['id']; ?>" class="btn btn-outline-primary float-right mr-3">My info</a>
                                    <a href="<?= base_url(); ?>member/detail/<?= $member['id']; ?>" type="button" class="btn btn-outline-warning ml-4 mb-1">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->