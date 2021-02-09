<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <!-- untuk menampilkan bagian error jika menggunkaan validation_errors -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- pesan jika menu berhasil di tambahkan dan ada sessionya -->
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahSubMenu"><i class="fas fa-plus"></i> Tambah Menu Baru</a>
            <!-- Form Di bagian Search -->
            <form class="form-inline float-right">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <!-- bagian TH ini di urutkan dengan database yaitu bagian user_sub_menu -->
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <!-- kita akan menyesuaikan dengan TH yang atas -->
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <!-- td href -->
                            <td>
                                <!-- untuk di bagian edit dan delete harus dan wajib menggunakan <a> bukan <button> karena akan langsung meng-link kan ke dalam database yang di gunakan hanya classnya saja berbeda dengan modal karena modal akan membutuhkan button sedangkan untuk yang bagian table menggunakan <a> -->
                                <a href="<?= base_url(); ?>menu/editSubMenu/<?= $sm['id']; ?>" class="badge badge-success" data-toggle="modal" data-target="#modelId">Edit</a>

                                <!-- untuk bagian delete data berdasarkan dari ID database -->
                                <a href="<?= base_url(); ?>menu/delete/<?= $sm['id']; ?>" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Setelah semua terisi sesuai di bagian TH maka kita akan query ke dalam Controller bagian menu.php -->
                </tbody>
            </table>

            <!-- / div col-lg-6 -->
        </div>
        <!-- / div row -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal tambah -->
<div class="modal fade" id="tambahSubMenu" tabindex="-1" aria-labelledby="tambahSubMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSubMenuLabel"><i class="fas fa-plus"></i> Tambah Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- action ini berfungsi untuk mengarahkan ke arah mana -->
            <!-- Dan di chase ini akan saya arahkan ke bagian controller menu lalu class addmenu -->
            <form action="<?= base_url('menu/subMenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="masukan title Sub Menu" name="title">
                    </div>
                    <div class="form-group">
                        <!-- Maka kita jika kalau begini kita butuh yang namanya tabel menu maka kita buat ke dalam controller -->
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <!-- maka langkah selanjutnya mari kita buat looping dari tabel menu -->
                            <?php foreach ($menu as $m) : ?>
                                <!-- untuk value option kita ambil dari user menu -->
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" placeholder="masukan url Sub Menu" name="url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" placeholder="masukan icon Sub Menu" name="icon">
                    </div>
                    <!-- dan untuk is_active kita kasih saja checkbox dari boostrap -->
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" value="1" name="is_active" checked>
                            <label class="custom-control-label" for="is_active"><i class="fas fa-power-off"></i> Active </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                <!-- / form -->
            </form>
        </div>
    </div>
</div>