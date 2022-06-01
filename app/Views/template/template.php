<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!--file Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <!-- link icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css">
    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/datepicker/css/datepicker.min.css">
    <style>
        sticky-footer {
            padding: 5rem;
        }
    </style>
</head>

<body>
    <!-- Bagian Navbar -->
    <?= $this->include('template/navbar'); ?>
    <!-- Bagian Content -->
    <hr>
    <?= $this->renderSection('content') ?>

    <!-- Disini Footer -->
    <?= $this->include('template/footer'); ?>

    <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/demo/datatables-demo.js"></script>
    <!-- select2full -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url(); ?>/assets/js/myscript.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
</body>
<!-- file js bootstrap -->
<script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
<script>
    // ambil pelanggan
    $(document).ready(function() {
        $("#member").change(function() {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?= site_url('penjualan/ambilMember'); ?>",
                data: {
                    member: $(this).val()
                },
                // data: "md=" + id_md,
                success: function(response) {
                    if (response.data) {
                        $('#jenis_member').html(response.data);
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });

    // ambil harga
    $(document).ready(function() {
        $("#pulsa").change(function() {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?= site_url('penjualan/ambilPulsa'); ?>",
                data: {
                    pulsa: $(this).val()
                },
                // data: "md=" + id_md,
                success: function(response) {
                    if (response.data) {
                        $('#harga').html(response.data);
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#member').select2({
            theme: 'bootstrap4',
            placeholder: "Cari Member Berdasarkan Nama atau No Hp",
            allowClear: true
        })
    });

    $(function() {
        $('#pulsa').select2({
            theme: 'bootstrap4',
            placeholder: "Cari Pulsa Berdasarkan Operator",
            allowClear: true
        })
    });
</script>
<!-- <script>
    $(document).ready(function() {
        $("#detail").hide();
    });
</script> -->

<script>
    $(document).ready(function() {
        $('.date-picker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true
        });
    });
</script>

</html>