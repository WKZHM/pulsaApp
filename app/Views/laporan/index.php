<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mt-3">Laporan Penjualan Pulsa</h1>
<hr>
<!-- konten disini -->
<div class="container mt-5">
    <div class="col-md-12">
        <div class="row">
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Filter : </label>
                </div>
            </div>
            <?php
            $tanggal_awal = (@$_POST['tanggalawal']);
            $tanggal_akhir = (@$_POST['tanggalakhir'])
            ?>
            <form action="?" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control date-picker" name="tanggalawal" placeholder="Masukkan Tanggal Awal" autocomplete="off">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control date-picker" name="tanggalakhir" placeholder="Masukkan Tanggal Akhir" autocomplete="off">
                    </div>
                    <div class="col-md-4 ">
                        <button type="submit" class="btn btn-primary" name="proses">Filter</button>
                        <a href="/laporan" class="btn btn-success">Refresh</a>
                        <a href="/laporan/export" target="_blank" class="btn btn-info">Export Data</a>
                    </div>
                </div>
            </form>

            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>

            <div class="col-md-12" id="detail">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_POST['proses'])) : ?>
                            <?php
                            $i = 1;
                            foreach ($LaporanRange as $p) : ?>
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
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
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
                                </tr>
                            <?php endforeach ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>