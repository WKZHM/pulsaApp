<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>
<h1 class="text-center mt-3">Penjualan Pulsa All Operator</h1>
<hr>
<!-- konten disini -->
<div class="container mt-5">
    <div class="col-md-12">
        <div class="row justify-conten-center">
            <div class="col-md-4">
                <div class="card">

                    <div class="card text-dark bg-primary mb-3">
                        <img src="<?= base_url() ?>/assets/img/users.png" class="rounded-circle img-thumbnail shadow-sm mx-auto d-block mt-3" width="100" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Member</h5>
                            <hr>
                            <h1 class="card-text text-center"><?= $member['COUNT(id)']; ?></h1>
                            <hr>
                            <h1 align="center">
                                <a href="#" class="btn btn-success">Details</a>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">

                    <div class="card text-dark bg-primary mb-3">
                        <img src="<?= base_url() ?>/assets/img/saldo.jpg" class="rounded-circle img-thumbnail shadow-sm mx-auto d-block mt-3" width="100" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Saldo</h5>
                            <hr>
                            <h1 class="card-text text-center">Rp.<?= number_format($pulsa['SUM(nominal)']); ?></h1>
                            <hr>
                            <h1 align="center">
                                <a href="#" class="btn btn-success">Detail</a>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">

                    <div class="card text-dark bg-primary mb-3">
                        <img src="<?= base_url() ?>/assets/img/pembayaran.jpg" class="rounded-circle img-thumbnail shadow-sm mx-auto d-block mt-3" width="150" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Total Penjualan</h5>
                            <hr>
                            <h1 class="card-text text-center">Rp.<?= number_format($penjualan['SUM(jumlah_bayar)']); ?></h1>
                            <hr>
                            <h1 align="center">
                                <a href="#" class="btn btn-success">Detail</a>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<?= $this->endSection() ?>