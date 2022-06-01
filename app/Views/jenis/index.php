<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mt-3">Jenis Pelanggan</h1>
<div class="container mt-5">
    <div class="col-md-12">
        <div class="row">

            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Pelanggan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($jenis as $j) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $j['jenis_pelanggan']; ?></td>
                            <td><?= $j['keterangan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>