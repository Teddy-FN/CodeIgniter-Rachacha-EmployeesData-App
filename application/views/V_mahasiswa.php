<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data</button>
        <table class="table">
            <tr>
                <th>NO</th>
                <th>Nama Mahasiswa</th>
                <th>Nim</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>
            </tr>

            <?php 
              $no = 1; 
              foreach ($mahasiswa as $mhs): ?>
            <tr>
                <td><?= $no++ ?></td>
              <!-- nama di dapat dari database -->
                <td><?= $mhs->nama ?></td>
                <td><?= $mhs->nim ?></td>
                <td><?= $mhs->tanggal_lahir ?></td>
                <td><?= $mhs->jurusan ?></td>
            </tr>

            <?php endforeach; ?>
        </table>
    </section>

    <!-- Bootsrap -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA MAHASISWA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'mahasiswa/tambah_aksi'?>">
                <div class="form-group">
                <label for="">Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Nim</label>
                <input type="text" name="nim" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Jurusan</label>
                <input type="text" name="jurusan" class="form-control">
                </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
