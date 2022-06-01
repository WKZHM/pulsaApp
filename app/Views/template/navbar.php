<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#"> <img src="<?= base_url() ?>/assets/img/logo saeful editing.jpg" alt="" width="30" height="28" class="d-inline-block align-text-top">
            Konter Haris </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === 'Member | Penjualan Pulsa' ? 'activate' : '' ?>" href="/member"><i class="bi bi-people"></i> Member</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === 'Jenis | Jenis Pelanggan' ? 'activate' : '' ?>" href="/jenis"><i class="bi bi-person-badge"></i> Jenis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === 'Pulsa | Penjualan Pulsa' ? 'activate' : '' ?>" href="/pulsa"><i class="bi bi-currency-dollar"></i> Pulsa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === 'Penjualan Pulsa' ? 'activate' : '' ?>" href="/penjualan"><i class="bi bi-wallet2"></i> Penjualan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === 'Penjualan Pulsa | Laporan' ? 'activate' : '' ?>" href="/laporan"><i class="bi bi-files"></i> Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('logout'); ?>"><i class="bi bi-logout"></i> Lagout</a>
                </li>


            </ul>

        </div>
    </div>
</nav>