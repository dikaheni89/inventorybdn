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
                        <h4 class="mb-sm-0">Assets</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sibernet</a></li>
                                <li class="breadcrumb-item active">Assets</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-primary" role="alert">
                <strong>Info :</strong> Halaman ini digunakan untuk melakukan validasi assets!
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Scan Assets</h5>
                        </div>
                        <div class="card-body">
                            <form id="form-data">
                                <div class="row g-3">
                                    <div class="col-xxl-12">
                                        <div>
                                            <label for="qr" class="form-label">QR Code</label>
                                            <input type="text" class="form-control" id="qr" onkeyup="this.value = this.value.toUpperCase()" autofocus>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12" style="display: none;">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row" id="konten" style="display: none;">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Striped Rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Asset</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Agen</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Service</th>
                                        <th scope="col">SN</th>
                                        <th scope="col">MAC</th>
                                        <th scope="col">Tgl Order</th>
                                        <th scope="col">Status Assets</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-body">
                                </tbody>
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
    $("#form-data").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#qr').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }

        var url_ajax = '<?= base_url() ?>dashboard/cek_assets'


        $.ajax({
            url: url_ajax,
            type: "post",
            data: {
                qr: $('#qr').val()
            },
            dataType: "json",
            success: function(result) {
                if (result != '') {
                    var html
                    result.forEach(d => {
                        html += `
                                        <tr>
                                            <td>` + d.kode_assets + `</td>
                                            <td>` + d.nama_barang + `</td>
                                            <td>` + d.agen + `</td>
                                            <td>` + d.area + `</td>
                                            <td>` + d.type_service + `</td>
                                            <td>` + d.sn + `</td>
                                            <td>` + d.mac + `</td>
                                            <td>` + d.tgl_order + `</td>
                                            <td>` + d.status_assets + `</td>

                                        </tr>`
                    });
                    $('#tabel-body').html(html)
                    $('#konten').show('500')

                    $('#qr').val('')
                } else {
                    var html = `<tr>
                                        <td colspan="9"><div class="alert alert-danger text-center" role="alert">
                                                <strong> Assets tidak ditemukan! </strong>
                                            </div>
                                        </td>
                                    </tr>`
                    $('#tabel-body').html(html)
                    $('#konten').show('500')
                    $('#qr').val('')
                }
                // if (result.status == "success") {

                //     var html = `
                //     <div class="alert alert-success text-center" role="alert">
                //         <strong> Assets ditemukan! </strong>
                //     </div>
                //             <table class="table table-striped">
                //                 <thead>
                //                     <tr>
                //                         <th scope="col">Kode Asset</th>
                //                         <th scope="col">Nama Barang</th>
                //                         <th scope="col">Agen</th>
                //                         <th scope="col">Area</th>
                //                         <th scope="col">Service</th>
                //                         <th scope="col">MAC</th>
                //                         <th scope="col">Tgl Order</th>
                //                         <th scope="col">Status</th>
                //                     </tr>
                //                 </thead>
                //                 <tbody>
                //                     <tr>
                //                         <td>` + result.kode_assets + `</td>
                //                         <td>` + result.nama_barang + `</td>
                //                         <td>` + result.agen + `</td>
                //                         <td>` + result.area + `</td>
                //                         <td>` + result.type_service + `</td>
                //                         <td>` + result.mac + `</td>
                //                         <td>` + result.tgl_order + `</td>
                //                         <td>` + result.status_assets + `</td>

                //                     </tr>
                //                 </tbody>
                //             </table>`
                //     $('#tabel').html(html)
                //     $('#konten').show('500')

                //     $('#qr').val('')

                // } else {
                //     var html = `<table class="table table-striped">
                //                 <thead>
                //                     <tr>
                //                         <th data-ordering="false" style="width: 5%;">No.</th>
                //                         <th scope="col">Kode Asset</th>
                //                         <th scope="col">Nama Barang</th>
                //                         <th scope="col">Agen</th>
                //                         <th scope="col">Area</th>
                //                         <th scope="col">Service</th>
                //                         <th scope="col">MAC</th>
                //                         <th scope="col">Tgl Order</th>
                //                     </tr>
                //                 </thead>
                //                 <tbody>
                //                     <tr>
                //                         <td colspan="8"><div class="alert alert-danger text-center" role="alert">
                //                                 <strong> Assets tidak ditemukan! </strong>
                //                             </div>
                //                         </td>
                //                     </tr>
                //                 </tbody>
                //             </table>`
                //     $('#tabel').html(html)
                //     $('#konten').show('500')
                //     $('#qr').val('')
                // }
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
</script>