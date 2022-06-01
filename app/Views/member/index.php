<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mt-3">Data Member</h1>
<hr>
<!-- konten disini -->
<div class="container mt-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="/member/create" class="btn btn-primary btn-sm"><i class="bi bi-person-plus-fill"></i> Tambah Member</a>
            </div>
            <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Jenis Pelanggan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($member as $m) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['no_hp']; ?></td>
                            <td><?php if ($m['id_jenis'] == 1) : ?>
                                    <span>Gold</span>
                                <?php elseif ($m['id_jenis'] == 2) : ?>
                                    <span>Silver</span>
                                <?php else : ?>
                                    <span>Bronze</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="/member/edit/<?= $m['id']; ?>" class="btn btn-success btn-sm">Ubah</a> | <a href="/member/delete/<?= $m['id']; ?>" class="btn btn-danger btn-sm tombol-hapus">Delete</a></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>