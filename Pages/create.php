<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<div class="container">
    <h2 class="my-3">Tambah Data Warga</h2>
    <div class="card">
        <div class="card-header bg-primary text-white">Form Tambah</div>
        <div class="card-body">

            <form action="/pages/save/" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nik">NIK</label>

                    <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?> "
                        id="nik" name="nik" onkeypress="return event.charCode >= 48 && event.charCode <=57" autofokus
                        value="<?= old('nik'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('nik'); ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>

                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?> "
                        id="nama" name="nama" value="<?= old('nama'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>

                </div>
                <fieldset class="form-group">
                    <label for="kelamin">Jenis Kelamin</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" id="kelamin" value="L" checked>
                        <label class="form-check-label" for="L">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" id="kelamin" value="P"
                            value="option2">
                        <label class="form-check-label" for="P">
                            Perempuan
                        </label>
                    </div>

                </fieldset>
                <div class="form-group">
                    <label for="alamat">Alamat</label>

                    <input type="text"
                        class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?> " id="alamat"
                        name="alamat" value="<?= old('alamat'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="no_rumah">No Rumah</label>

                    <input type="text"
                        class="form-control <?= ($validation->hasError('no_rumah')) ? 'is-invalid' : ''; ?> "
                        id="no_rumah" name="no_rumah" value="<?= old('no_rumah'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('no_rumah'); ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="status">Status</label>

                    <input type="text"
                        class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?> " id=" status"
                        name="status" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="3"
                        value="<?= old('status'); ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('status'); ?>
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <a href="/pages/" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<br>
<?= $this->endSection(); ?>