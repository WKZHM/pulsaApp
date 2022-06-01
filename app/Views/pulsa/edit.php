<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mt-3">Edit Pembelian Pulsa</h1>
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-4">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="/pulsa/update/<?= $pulsa['id']; ?>" method="POST">
                            <!-- kode keamanan -->
                            <?= csrf_field(); ?>
                            <!-- kode -->
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control <?= ($validation->hasError('code')) ? 'is-invalid' : '' ?>" name="id_pulsa" autofocus value="<?= $pulsa['id_pulsa']; ?>" readonly>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('code'); ?>
                                </div>
                            </div>
                            <!-- Operator -->
                            <div class="mb-3">
                                <label for="operator" class="form-label">Operator</label>
                                <input type="text" class="form-control <?= ($validation->hasError('operator')) ? 'is-invalid' : '' ?>" name="operator" autofocus value="<?= $pulsa['operator']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('operator'); ?>
                                </div>
                            </div>
                            <!-- nominal -->
                            <div class="mb-3">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nominal')) ? 'is-invalid' : '' ?>" name="nominal" autofocus value="<?= $pulsa['nominal']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nominal'); ?>
                                </div>
                            </div>
                            <!-- harga -->
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : '' ?>" name="harga" autofocus value="<?= $pulsa['harga']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            </div>

                            <a href="/pulsa" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>