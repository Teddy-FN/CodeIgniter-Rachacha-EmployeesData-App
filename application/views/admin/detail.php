<div class="content-wrapper">
    <section class="content">
        <h4><strong>Detail Karyawan</strong></h4>

        <table class="table">
            <tr>
                <th>Nama Lengkap</th>
                <td><?= $detail->nama ?></td>
            </tr>
            <tr>
                <th>NIP</th>
                <td><?= $detail->nip ?></td>
            </tr>
            <tr>
                <th>Posisi</th>
                <td><?= $detail->posisi ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $detail->alamat ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $detail->email ?></td>
            </tr>
            <tr>
                <th>No.Telp</th>
                <td><?= $detail->no_telp ?></td>
            </tr>
            <!-- untuk foto/ gambar -->
            <tr>
                <td>
                    <img src="<?= base_url(); ?>foto/<?= $detail->foto; ?>" 
                    width=" 90px" height = "120px">
                </td>
                <td></td>
            </tr>
        </table>
    </section>
</div>