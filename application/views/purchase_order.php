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
                        <h4 class="mb-sm-0">Purchase Order</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sibernet</a></li>
                                <li class="breadcrumb-item active">Purchase Order</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-primary" role="alert">
                <strong>Info :</strong> Halaman ini digunakan untuk mengelola order ke suplier!
            </div>
            <div class="row" id="area-detil" style="display: none;">

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Header</h5>
                            <button type="button" class="btn btn-sm btn-danger" id="btn-kembali">
                                <i class="ri-delete-back-line"></i> kembali
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="suplier" class="form-label">Suplier</label>
                                    <select name="suplier" id="suplier" class="form-control">
                                        <?php
                                        foreach ($suplier as $key) {
                                        ?>
                                            <option value="<?= $key->kode_suplier . '*' . $key->suplier . '*' . $key->alamat . '*' . $key->hp . '*' . $key->contact_person ?>"><?= $key->suplier ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12 mt-3">
                                <div>
                                    <label for="order_no" class="form-label">Order Number</label>
                                    <input type="text" class="form-control" id="order_no" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12 mt-3">
                                <div>
                                    <label for="delivery_date" class="form-label">Delivery Date (Plan)</label>
                                    <input type="date" class="form-control" id="delivery_date">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12 mt-3">
                                <div>
                                    <label for="term" class="form-label">Term of Payment</label>
                                    <input type="date" class="form-control" id="term">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12 mt-3">
                                <div>
                                    <label for="delivery_date" class="form-label">Remark</label>
                                    <textarea name="remark" id="remark" cols="10" rows="5" class="form-control"></textarea>
                                </div>
                            </div><!--end col-->
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Tambah Barang</h5>
                            </div>
                            <div>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                    <i class="ri-inbox-archive-line"></i> Tambah Barang
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" onclick="reset_barang()">
                                    <i class="ri-delete-bin-line"></i> Reset
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="table-user-detil" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col" style="width: 30%;">Barang</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between" style="margin-left: 45px;">
                                <h6>SUB TOTAL (Rp)</h6>
                                <h6><input type="text" name="sub_total" id="sub_total" class="form-control" readonly></h6>
                            </div>
                        </div>
                        <div class="card-footer">
                            <!-- <form action="" class="mt-2"> -->
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                        <label for="flexSwitchCheckChecked" class="form-label">PPN 11% (Rp)</label>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="ppn" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="total" class="form-label">Total (Rp)</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="total" readonly>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary" id="btn-generate-po"><i class="ri-edit-2-line"></i> Generate PO</button>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row" id="konten">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Purchase Order</h5>
                            <!-- <button type="button" class="btn btn-secondary waves-effect waves-light"><i class="las la-plus-circle" data-bs-toggle="modal" data-bs-target="#myModal"></i> Tambah User</button> -->
                            <button type="button" class="btn btn-secondary" id="btn-new-po">
                                <i class="las la-plus-circle"></i> Buat PO
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="table-user" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false" style="width: 5%;">No.</th>
                                        <th data-ordering="false">PO Number</th>
                                        <th data-ordering="false">Suplier</th>
                                        <th data-ordering="false">Tanggal Delivery<br>(Plan)</th>
                                        <th data-ordering="false">Total<br>(Rp)</th>
                                        <th>Action</th>
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Buat Purchase Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-data">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="nama_barang_modal" class="form-label">Kategori</label>
                                <select name="nama_barang_modal" id="nama_barang_modal" class="form-control">
                                    <?php
                                    foreach ($sparepart as $key) {
                                    ?>
                                        <option value="<?= $key->kode_barang . '*' . $key->nama_barang . '*' . $key->kode_satuan ?>"><?= $key->nama_barang ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="harga_modal" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="harga_modal">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="jumlah_modal" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah_modal">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="amount_modal" class="form-label">Amount</label>
                                <input type="text" class="form-control" id="amount_modal" readonly>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
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
                'url': '<?= base_url() ?>dashboard/ajax_table_po',
                'type': 'post',
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.po_no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.suplier",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.delivery_date",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.total",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<a href="<?= base_url('dashboard/po_detil?po_no=') ?>` + data.po_no + `" type="button" class="btn btn-sm btn-info"><i class="ri-eye-line"></i> Detil</a>&nbsp<button type="button" class="btn btn-sm btn-danger" onclick="delete_data('` + data.po_no + `')"><i class="ri-delete-bin-line"></i> Hapus</button>&nbsp;<a href="<?= base_url('dashboard/cetakpo?po_no=') ?>` + data.po_no + `" target="_blank" type="button" class="btn btn-sm btn-success"><i class="ri-printer-line"></i> Cetak</a>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        $("#table-user-detil").DataTable({
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
                'url': '<?= base_url() ?>dashboard/ajax_table_po_detil',
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
                "data": "data.unit_price",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.quantity",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.amount",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick=delete_data_detil('` + data.id + `')><i class="ri-delete-bin-line"></i></button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6"><"col-md-6">>rt<"row" <"col-md-6"><"col-md-6">>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        hitung_subtotal()



    });

    function reload_table() {
        $('#table-user').DataTable().ajax.reload(null, false);
    }

    function reload_table_detil() {
        $('#table-user-detil').DataTable().ajax.reload(null, false);
    }

    $('#suplier').select2({});
    $('#nama_barang_modal').select2({
        dropdownParent: $('#exampleModalgrid')
    });

    $("#form-data").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#harga_modal').val() == '' || $('#jumlah_modal').val() == '' || $('#amount_modal').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'purchase_order_detil');
        form_data.append('nama_barang', $("#nama_barang_modal").val());
        form_data.append('quantity', $("#jumlah_modal").val());
        form_data.append('unit_price', $("#harga_modal").val());
        form_data.append('amount', $("#amount_modal").val());

        var url_ajax = '<?= base_url() ?>dashboard/insert_data_po'


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
                    $('#harga_modal').val('')
                    $('#jumlah_modal').val('')
                    $('#amount_modal').val('')
                    $('#exampleModalgrid').modal('hide');

                    hitung_subtotal()

                    $('#area-detil').show('500')
                    $('#konten').hide('500')
                    reload_table()
                    reload_table_detil()
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

    function delete_data(po_number) {

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
                    url: '<?= base_url() ?>dashboard/delete_data_po',
                    data: {
                        po_number: po_number,
                        table: "purchase_order"
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

    function delete_data_detil(id) {

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
                        table: "purchase_order_detil"
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
                            reload_table_detil()
                            hitung_subtotal()
                        } else
                            toast('error', result.message)
                    }
                })
            }
        })
    }

    function reset_barang() {

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
                    url: '<?= base_url() ?>dashboard/reset_barang',
                    data: {
                        table: "purchase_order_detil"
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
                            reload_table_detil()
                            hitung_subtotal()
                        } else
                            toast('error', result.message)
                    }
                })
            }
        })
    }

    $('#btn-new-po').on('click', function() {
        $('#area-detil').show('500')
        $('#konten').hide('500')


    });

    $('#btn-kembali').on('click', function() {
        $('#area-detil').hide('500')
        $('#konten').show('500')
    });

    $('#harga_modal').on('keyup', function() {
        $('#amount_modal').val($('#harga_modal').val() * $('#jumlah_modal').val())
    });
    $('#jumlah_modal').on('keyup', function() {
        $('#amount_modal').val($('#harga_modal').val() * $('#jumlah_modal').val())
    });

    function hitung_subtotal() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/hitung_subtotal',
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result) {
                result.forEach(a => {
                    $('#sub_total').val(a.amount)
                    hitung_ppn()
                });

            }
        })
    }

    function hitung_ppn() {
        $('#ppn').val($('#sub_total').val() * (11 / 100))
        var a = $('#ppn').val()
        var b = $('#sub_total').val()

        var c = parseInt(a) + parseInt(b)

        $('#total').val(c)
    }

    $('#flexSwitchCheckChecked').click(function() {
        if ($(this).is(":checked")) {
            $('#ppn').val($('#sub_total').val() * (11 / 100))
            var a = $('#ppn').val()
            var b = $('#sub_total').val()

            var c = parseInt(a) + parseInt(b)
            $('#total').val(c)
        } else if ($(this).is(":not(:checked)")) {
            $('#ppn').val('0')
            var a = $('#ppn').val()
            var b = $('#sub_total').val()

            var c = parseInt(a) + parseInt(b)


            $('#total').val(c)
        }
    });

    $('#btn-generate-po').on('click', function() {
        //buat prevent dulu
        if ($('#delivery_date').val() == '' || $('#term').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }

        $.ajax({
            url: '<?= base_url() ?>dashboard/generatepo',
            data: {
                order_no: $('#order_no').val(),
                suplier: $('#suplier').val(),
                delivery_date: $('#delivery_date').val(),
                term: $('#term').val(),
                remark: $('#remark').val(),
                sub_total: $('#sub_total').val(),
                ppn: $('#ppn').val(),
                total: $('#total').val()
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result.status == "success") {
                    Swal.fire(
                        'Sukses!',
                        'Berhasil membuat PO.',
                        'success'
                    )
                    reload_table()
                    reload_table_detil()
                    $('#area-detil').hide('500')
                    $('#konten').show('500')

                    $('#sub_total').val('')
                    $('#ppn').val('')
                    $('#total').val('')
                    $('#term').val('')
                    $('#delivery_date').val('')
                    $('#order_no').val('')
                    $('#remark').val('')
                } else if (result.status == "error") {
                    Swal.fire(
                        'Ops!',
                        'Anda belum menambahkan barang yang akan di beli',
                        'error'
                    )
                }
            }
        })
    });
</script>