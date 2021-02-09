  <!-- Content Wrapper -->
<div class="content-wrapper">
      <!-- content-header -->
    <section class="content-header">
    <h1>
        Data Karyawan
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Karyawan</li>
    </ol>
    <!-- / content-header -->
    </section>


    <section class="content">
      <!-- Bagian Tambah -->
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah </button>

      <!-- Bagian Print -->
                              <!-- base url di tulis di controller -->
      <a class="btn btn-danger" href="<?= base_url('karyawan/print') ?>"><i class="fa fa-print"></i> Print</a>

      <!-- Untuk bagian export -->
                              <!-- base url di tulis di controller -->
      <a class="btn btn-warning" href="<?= base_url('karyawan/pdf') ?>"><i class="fa fa-file-import"></i> Export</a>
      <table class="table"> 
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Nip</th>
          <th>Jabatan</th>
          <!-- Didalam aksi ini di gunakan untuk meng-action data -->
          <th colspan="2">Aksi</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($karyawan as $kyw) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $kyw->nama ?></td>
          <td><?= $kyw->nip ?></td>
          <td><?= $kyw->posisi ?></td>


          <!-- Untuk bagian Detail dari karyawan -->
          <td><?= anchor('karyawan/detail/' .$kyw->id_karyawan, '<div class="btn btn-success btn-sm"><i class="fa fa-search"></i></div>')?></td>
          <!-- On Click di gunakan untuk memberitahu apakah data tsb akan di hapus -->
          <!-- Anchor di gunakan agar data tsb bisa di hapus dsb dan di ahlikan ke dalam controller,$id_karyawan di dapatkan dari PK(Primary key) di dalam database -->
          <td onclick="javascript: return confirm('anda yakin untuk menghapus data ini')"><?php echo anchor('karyawan/hapus/' .$kyw->id_karyawan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
          
          <!-- Snytax untuk bagian edit data  -->
          <td><?= anchor('karyawan/edit/' .$kyw->id_karyawan, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
        </tr>

      <?php endforeach; ?>
      </table>
    </section>
<!-- / Content-wrapper -->
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Form Input Data Karyawan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- Membuat Input Form -->
          <?php echo form_open_multipart('karyawan/tambah_aksi'); ?>

            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Nip</label>
              <input type="text" name="nip" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Posisi</label>
              <input type="text" name="posisi" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Alamat</label>
              <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="">No. Telp</label>
              <input type="text" name="no_telp" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Upload Foto</label>
              <input type="file" name="foto" class="form-control">
            </div>

            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Save changes</button>

          <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>