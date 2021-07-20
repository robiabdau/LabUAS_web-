<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<div class="container">
    <h2 class="my-3">Tambah Data Transaksi</h2>
    <div class="card">
        <div class="card-header bg-primary text-white">Form Transaksi</div>
        <div class="card-body">

            <form action="/iuran/save/" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="tanggal">Tanggal Transaksi</label>

                    <input type="text"
                        class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?> "
                        id="keterangan" name="tanggal" value="<?= old('tanggal'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('keterangan'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Pilih Warga</label>
                    <select name='warga_id' class='form-control'>
                        <option value="">- Pilih -</option>
                        <?php foreach ($iuran as $row) : ?>
                        <option value="<?php echo $row['warga_id']; ?>"><?php echo $row['nama']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bulan">Bulan Iuran</label>

                    <input type="text"
                        class="form-control <?= ($validation->hasError('bulan')) ? 'is-invalid' : ''; ?> " id="bulan"
                        name="bulan" onkeypress="return event.charCode >= 48 && event.charCode <=57" autofokus
                        value="<?= old('bulan'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('bulan'); ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Iuran</label>

                    <input type="text"
                        class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?> " id="tahun"
                        name="tahun" onkeypress="return event.charCode >= 48 && event.charCode <=57" autofokus
                        value="<?= old('tahun'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('tahun'); ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Iuran</label>

                    <input type="text"
                        class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?> " id="jumlah"
                        name="jumlah" onkeypress="return event.charCode >= 48 && event.charCode <=57" autofokus
                        value="<?= old('jumlah'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('jumlah'); ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>

                    <input type="text"
                        class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?> "
                        id="keterangan" name="keterangan" value="<?= old('keterangan'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('keterangan'); ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <a href="/iuran/iuran" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<br>
<?= $this->endSection(); ?>