<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mt-3">Data Transaksi</h1>
<hr>
<!-- konten disini -->
<div class="container mt-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="/penjualan/transaksi" class="btn btn-primary btn-sm"><i class="bi bi-person-plus-fill"></i> Tambah Data Transaksi</a>
            </div>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>

            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th>Tgl Beli</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Jenis Pelanggan</th>
                        <th>Pulsa</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($penjualan as $p) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['tgl']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['no_hp']; ?></td>
                            <td><?= $p['jenis_pelanggan']; ?></td>
                            <td><?= $p['id_pulsa'] . '-' . number_format($p['nominal']); ?></td>
                            <td><?= number_format($p['jumlah_bayar']); ?></td>
                            <td><?php if ($p['status'] == 0) : ?>
                                    <span class="badge bg-danger">Filed</span>
                                <?php elseif ($p['status'] == 1) : ?>
                                    <span class="badge bg-success">Success</span>
                                <?php else : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php endif; ?>
                            </td>

                            <td><a href="/penjualan/delete/<?= $p['id_penjualan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin Mengapus <?= $p['nama']; ?>')">Delete</a></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>