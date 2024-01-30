<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Solusi Cipta Media" name="description" />
    <meta content="Solusiciptamedia" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/default/assets/images/' . $favicon) ?>">

    <link href="<?= base_url('assets/default/assets/css/select2.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert css-->
    <link href="<?= base_url('assets/default/assets/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <link href="<?= base_url('assets/default/assets/css/dataTables.bootstrap5.min.css') ?>" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="<?= base_url('assets/default/assets/css/responsive.bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/default/assets/css/buttons.dataTables.min.css') ?>" rel="stylesheet" type="text/css" />


    <!-- Layout config Js -->
    <script src="<?= base_url('assets/default/assets/js/layout.js') ?>"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/default/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/default/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/default/assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url('assets/default/assets/css/custom.min.css') ?>" rel="stylesheet" type="text/css" />

</head>



<?php include('menu_header.php') ?>



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Inventory</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sibernet</a></li>
                                <li class="breadcrumb-item active">Inventory</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-primary" role="alert">
                <strong>Info :</strong> Halaman ini digunakan untuk menambahkan Transaksi Sparepart keluar!
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Transaksi Keluar</h5>
                            <!-- <button type="button" class="btn btn-secondary waves-effect waves-light"><i class="las la-plus-circle" data-bs-toggle="modal" data-bs-target="#myModal"></i> Tambah User</button> -->
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                <i class="las la-plus-circle"></i> Tambah Transaksi
                            </button>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="table-user" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false" style="width: 5%;">No.</th>
                                        <th data-ordering="false">ID</th>
                                        <th data-ordering="false">Tanggal</th>
                                        <th data-ordering="false">Barang</th>
                                        <th data-ordering="false">Jumlah</th>
                                        <th data-ordering="false">Lokasi Asal</th>
                                        <th data-ordering="false">Tujuan</th>
                                        <th data-ordering="false">Invoice</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Solusiciptamedia.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">

                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->


<!-- Grids in modals -->

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-data">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="tanggal" class="form-label">Tanggal Keluar</label>
                                <input type="date" class="form-control" id="tanggal">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="sparepart" class="form-label">Barang</label>
                                <select name="sparepart" id="sparepart" class="form-control">
                                    <?php
                                    foreach ($sparepart as $key) {
                                    ?>
                                        <option value="<?= $key->kode_barang . '*' . $key->nama_barang ?>"><?= $key->kode_barang . ' - ' . $key->nama_barang ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-12">
                            <div>
                                <label for="lokasi" class="form-label">Lokasi Asal</label>
                                <select name="lokasi" id="lokasi" class="form-control">
                                    <?php
                                    foreach ($lokasi as $key) {
                                    ?>
                                        <option value="<?= $key->lokasi ?>"><?= $key->lokasi ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah">
                                <small style="font-style: italic;color: red;display: none;" id="info-error">* Jumlah tidak boleh lebih sedikit dari stok yang tersedia</small>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="invoice" class="form-label">Invoice</label>
                                <input type="text" class="form-control" id="invoice" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                        </div><!--end col-->



                        <div class="col-lg-12" id="btn-submit" style="display: none;">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>


<!-- <?php include('menu_footer.php') ?> -->


<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/libs/simplebar/simplebar.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/libs/node-waves/waves.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/libs/feather-icons/feather.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/pages/plugins/lord-icon-2.1.0.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/plugins.js') ?>"></script>

<script src="<?= base_url('assets/default/assets/js/jquery-3.6.0.min.js') ?>"></script>

<!--select2 cdn-->
<script src="<?= base_url('assets/default/assets/js/select2.min.js') ?>"></script>

<!--datatable js-->
<script src="<?= base_url('assets/default/assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/jszip.min.js') ?>"></script>

<script src="<?= base_url('assets/default/assets/js/pages/datatables.init.js') ?>"></script>

<!-- Sweet Alerts js -->
<script src="<?= base_url('assets/default/assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- Sweet alert init js-->
<script src="<?= base_url('assets/default/assets/js/pages/sweetalerts.init.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('assets/default/assets/js/app.js') ?>"></script>
</body>

</html>

<script>
    <?php $target = 0; ?>
    $(function() {
        $("#table-user").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            'serverSide': true,
            'processing': true,
            "order": [
                [0, "desc"]
            ],
            'ajax': {
                'dataType': 'json',
                'url': '<?= base_url() ?>dashboard/ajax_table_transaksi_keluar',
                'type': 'post',
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.nomor_transaksi",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tanggal",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<h5><strong>` + data.nama_barang + `</strong></h5><small><strong>` + data.kode_barang + `</strong></small>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.jumlah",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.lokasi",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.suplier",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.invoice",
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

    });

    function reload_table() {
        $('#table-user').DataTable().ajax.reload(null, false);
    }

    $('#sparepart').select2({
        dropdownParent: $('#exampleModalgrid')
    });
    $('#lokasi').select2({
        dropdownParent: $('#exampleModalgrid')
    });

    $("#form-data").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#tanggal').val() == '' || $('#jumlah').val() == '' || $('#tujuan').val() == '' || $('#invoice').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }




        var form_data = new FormData();
        form_data.append('table', 'inventory');
        form_data.append('tanggal', $("#tanggal").val());
        form_data.append('sparepart', $("#sparepart").val());
        form_data.append('tujuan', $("#tujuan").val());
        form_data.append('lokasi', $("#lokasi").val());
        form_data.append('jumlah', $("#jumlah").val());
        form_data.append('invoice', $("#invoice").val());

        var url_ajax = '<?= base_url() ?>dashboard/insert_data_keluar'


        $.ajax({
            url: url_ajax,
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            dataType: "json",
            success: function(result) {
                if (result.status == "success") {
                    Swal.fire(
                        'Success!',
                        result.message,
                        'success'
                    )
                    $('#jumlah').val('')
                    $('#tujuan').val('')
                    $('#invoice').val('')
                    $('#exampleModalgrid').modal('hide');
                    reload_table()
                } else {
                    Swal.fire(
                        'error!',
                        result.message,
                        'error'
                    )
                }
            },
            error: function(err) {
                Swal.fire(
                    'error!',
                    err.responseText,
                    'error'
                )
            }
        })
    })

    function delete_data(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>dashboard/delete_data',
                    data: {
                        id: id,
                        table: "inventory"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Deleted!',
                                'Data berhasil di hapus.',
                                'success'
                            )
                            reload_table()
                        } else
                            toast('error', result.message)
                    }
                })
            }
        })
    }

    $('#jumlah').on('keyup', function() {

        //cek dulu apakah qty out lebih besar dari saldo? jika iya tidak boleh
        $.ajax({
            url: '<?= base_url() ?>dashboard/getqty',
            data: {
                sparepart: $('#sparepart').val(),
                jumlah: $('#jumlah').val(),
                lokasi: $('#lokasi').val(),
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result.status == "error") {
                    $('#info-error').show('500')
                    $('#btn-submit').hide('500')
                } else {
                    $('#btn-submit').show('500')
                    $('#info-error').hide('500')
                }
            }
        })
    });

    $('#lokasi').on('change', function() {

        //cek dulu apakah qty out lebih besar dari saldo? jika iya tidak boleh
        $.ajax({
            url: '<?= base_url() ?>dashboard/getqty',
            data: {
                sparepart: $('#sparepart').val(),
                jumlah: $('#jumlah').val(),
                lokasi: $('#lokasi').val(),
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result.status == "error") {
                    $('#info-error').show('500')
                    $('#btn-submit').hide('500')
                } else {
                    $('#btn-submit').show('500')
                    $('#info-error').hide('500')
                }
            }
        })
    });

    $('#sparepart').on('change', function() {

        //cek dulu apakah qty out lebih besar dari saldo? jika iya tidak boleh
        $.ajax({
            url: '<?= base_url() ?>dashboard/getqty',
            data: {
                sparepart: $('#sparepart').val(),
                jumlah: $('#jumlah').val(),
                lokasi: $('#lokasi').val(),
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result.status == "error") {
                    $('#info-error').show('500')
                    $('#btn-submit').hide('500')
                } else {
                    $('#btn-submit').show('500')
                    $('#info-error').hide('500')
                }
            }
        })
    });
</script>