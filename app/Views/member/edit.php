<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mt-3">Form Edit Member</h1>
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-4">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <form action="/member/update/<?= $member['id']; ?>" method="POST">
                            <!-- kode keamanan -->
                            <?= csrf_field(); ?>
                            <!-- nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" name="nama" autofocus value="<?= $member['nama']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <!-- No Hp -->
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp</label>
                                <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : '' ?>" name="no_hp" value="<?= $member['no_hp']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_hp'); ?>
                                </div>
                            </div>
                            <!-- jenis_pelanggan -->
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis Pelanggan</label>
                                <select name="jenis" id="" class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : '' ?>" name="jenis">
                                    <option value="<?= $member['id_jenis']; ?>">
                                        <?php if ($member['id_jenis'] == 1) {
                                            echo "Gold";
                                        } elseif ($member['id_jenis'] == 2) {
                                            echo "Silver";
                                        } else {
                                            echo "Bronze";
                                        } ?></option>
                                    <option value="1">Gold</option>
                                    <option value="2">Silver</option>
                                    <option value="3">Bronze</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenis'); ?>
                                </div>
                            </div>

                            <a href="/member" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>