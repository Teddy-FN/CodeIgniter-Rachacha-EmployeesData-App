<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>




    <!-- Table Menu management  -->
    <div class="row">
        <div class="col-lg">

            <!-- Untuk bagian error maka kita akan tampilkan -->
            <?= form_error('menu', '<div class="alert alert-danger" role ="alert">', '</div>'); ?>

            <!-- pesan jika menu berhasil di tambahkan dan ada sessionya -->
            <?= $this->session->flashdata('message'); ?>

            <!-- Diatas Table kita membuat tambahan menu dalam tabel-->
            <!-- biar tidak terlalu dempet maka di tambah margin pada class di button dengan cara mb (margin bottom) ini karena efek dari bootstrap -->
            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahMenu">Tambah Menu Baru</a>

            <!-- Langkah selanjutnya setelah membuat button tambah menu maka kita menambahkan modal agar untuk bisa di tambah data -->

            <!-- TABLE HOVER -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- setelah membuat query data saatnya kita looping array  -->
                    <?php
                    $no = 1;
                    foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a href="" class="badge badge-success">Edit</a>
                                <a href="<?= base_url() ?>menu/deleteUserMenu/<?= $m['id']; ?>" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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


<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="tambahMenu" tabindex="-1" aria-labelledby="tambahMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMenuLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- action ini berfungsi untuk mengarahkan ke arah mana -->
            <!-- Dan di chase ini akan saya arahkan ke bagian controller menu lalu class addmenu -->
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" placeholder="masukan menu yang anda ingin buat" name="menu">
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