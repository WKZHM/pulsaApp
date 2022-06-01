<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mt-3">Form Transaksi</h1>
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-5">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="/penjualan/buy" method="POST">
                            <!-- kode keamanan -->
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Transaksi</label>
                                <input type="text" class="form-control date-picker" name="tgl_transaksi" value="<?= date('Y-m-d'); ?>">
                            </div>

                            <!-- nama & no hp -->
                            <div class="mb-3">
                                <label for="nohp_nama" class="form-label">No Hp - Nama</label>
                                <select name="member" id="member" class="form-control <?= ($validation->hasError('member')) ? 'is-invalid' : '' ?>" style="width: 100%;" value="<?= old('member'); ?>">
                                    <option value="">Customer</option>
                                    <?php foreach ($member as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['no_hp'] . '-' . $m['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('member'); ?>
                                </div>

                                <!-- jenis pelanggan -->
                                <div class="mb-3">
                                    <label for="jenis_pelanggan" class="form-label">Jenis Pelanggan</label>
                                    <select name="jenis" id="jenis_member" class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : '' ?>">
                                        <option value="">Pilih Jenis</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis'); ?>
                                    </div>
                                </div>

                                <!-- Pulsa & Nominal -->
                                <div class="mb-3">
                                    <label for="pulsa_nominal" class="form-label">Pulsa - Nominal</label>
                                    <select name="pulsa" id="pulsa" class="form-control <?= ($validation->hasError('pulsa')) ? 'is-invalid' : '' ?>" style="width: 100%;" value="<?= old('pulsa'); ?>">
                                        <option value="">Pulsa & Nominal</option>
                                        <?php foreach ($pulsa as $p) : ?>
                                            <option value="<?= $p['id_pulsa']; ?>"><?= $p['id_pulsa'] . '-' . number_format($p['nominal']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pulsa'); ?>
                                    </div>
                                </div>

                                <!-- harga -->
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <select name="harga" id="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : '' ?>" value="<?= old('harga'); ?>">
                                            <option value="">Harga</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('harga'); ?>
                                    </div>
                                </div>
                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>" value="<?= old('status'); ?>">
                                        <option value="">Pilih Status</option>
                                        <option value=" 0">Filed</option>
                                        <option value="1">Success</option>
                                        <option value="2">Pending</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status'); ?>
                                    </div>
                                </div>

                                <a href="/penjualan" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>