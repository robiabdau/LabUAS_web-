<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Daftar Kas Warga</h2>
            <br>
            <a href="/iuran/create_transaksi" class="btn btn-primary mb-3">Tambah Transaksi Iuran</a>
            <br>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">Bulan Iuran</th>
                        <th scope="col">Tahun Iuran</th>
                        <th scope="col">Jumlah Iuran</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($iuran as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['bulan']; ?></td>
                        <td><?= $row['tahun']; ?></td>
                        <td><?= $row['jumlah']; ?></td>
                        <td><?= $row['keterangan']; ?></td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>