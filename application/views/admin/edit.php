<div class="content-wrapper">
    <section class="content">
        <?php foreach ($karyawan as $kyw) { ?>
            <!-- karyawan nama controller dan update nama function -->
            <form action="<?= base_url() . 'karyawan/update'; ?>" method="post">
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input type="hidden" name="id_karyawan" class="form-control" value="<?= $kyw->id_karyawan ?>">
                    <input type="text" name="nama" class="form-control" value="<?= $kyw->nama; ?>">
                </div>

                <div class="form-group">
                    <label>Nip</label>
                    <input type="text" name="nip" class="form-control" value="<?= $kyw->nip; ?>">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="posisi" class="form-control" value="<?= $kyw->posisi; ?>">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $kyw->alamat; ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $kyw->email; ?>">
                </div>

                <div class="form-group">
                    <label>No. Telp</label>
                    <input type="text" name="no_telp" class="form-control" value="<?= $kyw->no_telp ?>">
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" id="gambar">
                    <input type="hidden" name="gambar" value=<?= $kyw->foto ?>>
                </div>

                <button type="reset" class="btn btn-danger">reset</button>
                <button type="submit" class="btn btn-primary">simpan</button>
            </form>

            <!-- tag penutup pada PHP -->
        <?php } ?>
    </section>
</div>