<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mt-3">Beli Pulsa</h1>
<hr>
<!-- konten disini -->
<div class="container mt-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <a href="/pulsa/create" class="btn btn-primary btn-sm"><i class="bi bi-person-plus-fill"></i> Beli Pulsa</a>
            </div>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code</th>
                        <th scope="col">Operator</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pulsa as $p) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['id_pulsa']; ?></td>
                            <td><?= $p['operator']; ?></td>
                            <td><?= number_format($p['nominal']); ?></td>
                            <td><?= number_format($p['harga']); ?></td>
                            <td><a href="/pulsa/edit/<?= $p['id_pulsa']; ?>" class="btn btn-success btn-sm">Ubah</a> | <a href="/pulsa/delete/<?= $p['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Membatalkan Transaksi ini')">Delete</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>