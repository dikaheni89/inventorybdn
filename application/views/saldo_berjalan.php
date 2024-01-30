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
                <strong>Info :</strong> Halaman ini digunakan untuk melihat informasi saldo inventory!
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="primary">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Saldo Berjalan</h5>
                            <div class="d-flex" style="column-gap: 5px">
                                <button type="button" class="btn btn-secondary waves-effect waves-light btn-show-category"><i class="las la-plus-circle"></i> Show Kategori</button>
                                <button type="button" class="btn btn-secondary waves-effect waves-light btn-hide-category" style="display: none"><i class="las la-minus-circle"></i> Hide Kategori</button>
                                <a href="<?= base_url('dashboard/generatedatasaldo') ?>" type="button" class="btn btn-success">
                                    <i class="ri-file-excel-line"></i> Export Excel
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive card-saldo">
                            <table id="table-user" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false" style="width: 5%;">No.</th>
                                        <th data-ordering="false" style="width: 15%;">Kode Barang</th>
                                        <th data-ordering="false">Nama Barang</th>
                                        <th data-ordering="false" style="width: 10%;">Jumlah</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-body table-responsive card-kategori" style="display: none;">
                            <table id="table-kategori" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false" style="width: 5%;">No.</th>
                                        <th data-ordering="false">Kategori</th>
                                        <th data-ordering="false">Jumlah</th>
                                        <!-- <th style="width: 10%;">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody class="tbody-kategori"></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card" style="display: none;" id="detail">
                        <div class="card-header d-flex justify-content-between">
                            <div id="head">
                                <h5 class="card-title mb-0">Saldo Berjalan</h5>
                            </div>
                            <div>
                                <!-- <button type="button" class="btn btn-secondary waves-effect waves-light"><i class="las la-plus-circle" data-bs-toggle="modal" data-bs-target="#myModal"></i> Tambah User</button> -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" id="btn-kembali">
                                    <i class="ri-indeterminate-circle-line"></i> Kembali
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="table-user-2" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false" style="width: 5%;">No.</th>
                                        <th data-ordering="false">Lokasi</th>
                                        <th data-ordering="false" style="width: 15%;">Jumlah</th>
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
<?php include('script_master.php') ?>
</body>

</html>

<script>
    <?php $target = 0; ?>
    var base_url = "<?= base_url() ?>"
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
                'url': '<?= base_url() ?>dashboard/ajax_table_transaksi_saldo',
                'type': 'post',
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.kode_barang",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.nama_barang",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.jumlah",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-info" onclick="detail_stok('` + data.kode_barang + `','` + data.nama_barang + `')"><i class="ri-information-line"></i> Detail</button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        get_data_kategori()
    });

    function get_data_kategori() {
        $.ajax({
            url: base_url+'inventory/ajax_data_kategori',
            dataType: 'json',
            success: function(result) {
                no = 1
                $(".tbody-kategori").html(``)
                result.forEach(d => {
                    $(".tbody-kategori").append(`
                    <tr>
                        <td>${no++}</td>
                        <td>${d.kategori}</td>
                        <td>${d.jumlah}</td>
                    </tr>
                    `)
                });
            },
            error: function(err) {
                console.log(err.responseText);
            }
        })
    }

    function detail_stok(kode, nama) {
        $('#primary').hide('500')
        $('#detail').show('500')
        var html = `<h5 class="card-title mb-0">` + kode + ` - ` + nama + `</h5>`

        $('#head').html(html)

        $("#table-user-2").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            'serverSide': true,
            'processing': true,
            'destroy': true,
            "order": [
                [0, "desc"]
            ],
            'ajax': {
                'dataType': 'json',
                'url': '<?= base_url() ?>dashboard/ajax_table_transaksi_saldo_detil',
                'type': 'post',
                'data': {
                    kode_barang: kode
                }
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.lokasi",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.jumlah",
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

    }

    $('#btn-kembali').on('click', function() {
        $('#primary').show('500')
        $('#detail').hide('500')
    });

    $(".btn-show-category").click(function(){
        $(this).hide()
        $(".btn-hide-category").show()
        $(".card-kategori").show(300)
        $(".card-saldo").hide()
    })
    
    $(".btn-hide-category").click(function(){
        $(this).hide()
        $(".btn-show-category").show()
        $(".card-kategori").hide()
        $(".card-saldo").show(300)
    })
</script>