<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>
<h1 align="center">Hello, Perkenalkan Nama Saya <strong><?= $Nama; ?></strong></h1>
<hr width="40%">
<p>Nama Lengkap : <strong><?= $Nama; ?></strong></p>
<p>Alamat : <strong><?= $Alamat; ?></strong></p>
<p>No Hp : <strong><?= $No_Hp; ?></strong></p>
<?= $this->endSection() ?>