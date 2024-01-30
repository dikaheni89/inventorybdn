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
    <script src="<?= base_url('assets/default/assets/js/html5-qrcode.min.js') ?>"></script>
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
                <strong>Info :</strong> Halaman ini digunakan untuk menambahkan dan menghapus Assets!
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Manajemen Assets</h5>
                            </div>
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                    <i class="las la-plus-circle"></i> Tambah Assets
                                </button>

                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="table-user" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false" style="width: 5%;">No.</th>
                                        <th data-ordering="false">Kode Asset</th>
                                        <th data-ordering="false">Nama Barang</th>
                                        <th data-ordering="false">Pemilik</th>
                                        <th data-ordering="false">Agen</th>
                                        <th data-ordering="false">Area</th>
                                        <th data-ordering="false">Service</th>
                                        <th data-ordering="false">MAC</th>
                                        <th data-ordering="false">Tgl Order</th>
                                        <th data-ordering="false">Teknisi</th>
                                        <th data-ordering="false">Deskripsi</th>
                                        <th>Lokasi</th>
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

<div class="modal fade" id="modalReturn" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Return Assets</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-data-return">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="kondisi" class="form-label">Kondisi Barang</label>
                                <select name="kondisi" id="kondisi" class="form-control">
                                    <option value="BAIK">BAIK</option>
                                    <option value="BROKEN">BROKEN</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan">
                                <input type="hidden" class="form-control" id="id_assets">
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

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Generate Assets</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-data">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="sn" class="form-label">Serial Number (SN)</label>
                                <input type="text" class="form-control" id="sn" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="mac" class="form-label">MAC Address</label>
                                <input type="text" class="form-control" id="mac" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="barang" class="form-label">Barang</label>
                                <select name="barang" id="barang" class="form-control">
                                    <?php
                                    foreach ($barang as $key) {
                                    ?>
                                        <option value="<?= $key->kode_barang . '*' . $key->nama_barang ?>"><?= $key->kode_barang . ' - ' . $key->nama_barang  ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <input type="hidden" class="form-control" id="kategori">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="agen" class="form-label">Agen</label>
                                <select name="agen" id="agen" class="form-control">
                                    <?php
                                    foreach ($agen as $key) {
                                    ?>
                                        <option value="<?= $key->kode . '*' . $key->nama ?>"><?= $key->kode . ' - ' . $key->nama ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="area" class="form-label">Area Assets</label>
                                <select name="area" id="area" class="form-control">
                                    <?php
                                    foreach ($area as $key) {
                                    ?>
                                        <option value="<?= $key->kode_area . '*' . $key->area ?>"><?= $key->kode_area . ' - ' . $key->area ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="type_service" class="form-label">Tipe Service</label>
                                <select name="type_service" id="type_service" class="form-control">
                                    <option value="HOTSPOT">HOTSPOT</option>
                                    <option value="PPPOE">PPPOE</option>

                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="pemilik" class="form-label">Pemilik Asset</label>
                                <select name="pemilik" id="pemilik" class="form-control">
                                    <option value="PERUSAHAAN">PERUSAHAAN</option>
                                    <option value="AGEN">AGEN</option>

                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="tgl_order" class="form-label">Tanggal Order</label>
                                <input type="date" class="form-control" id="tgl_order">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="teknisi" class="form-label">Teknisi</label>
                                <input type="text" class="form-control" id="teknisi" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="longitude" class="form-label">Longitude</label><small style="font-style: italic; color: green;"> * Contoh : -7.961xxxx</small>
                                <input type="text" class="form-control" id="longitude">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="latitude" class="form-label">Latitude</label><small style="font-style: italic; color: green;"> * Contoh : 112.668xxx</small>
                                <input type="text" class="form-control" id="latitude">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btn-submit">Submit</button>
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
    var user = '<?= $this->session->userdata("role_id") ?>'
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
                'url': '<?= base_url() ?>dashboard/ajax_table_assets',
                'type': 'post',
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-left py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status_assets == 'ACTIVE') {
                        return data.kode_assets + `<br><span class="badge badge-soft-success">Active</span>`
                    } else {
                        return data.kode_assets + `<br><span class="badge badge-soft-danger">Not Active</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-left py-1',
                "data": "data",
                "render": function(data) {
                    return `<small style="font-size: 14px;">` + data.nama_barang + `</small>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-left py-1',
                "data": "data",
                "render": function(data) {
                    if (data.pemilik == 'AGEN') {
                        return `<span class="badge text-bg-danger">AGEN</span>`
                    } else {
                        return `<span class="badge text-bg-warning">PERUSAHAAN</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-left py-1',
                "data": "data",
                "render": function(data) {
                    return `<small style="font-size: 14px;">` + data.agen + `</small>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-left py-1',
                "data": "data",
                "render": function(data) {
                    return `<small style="font-size: 14px;">` + data.area + `</small>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.type_service == 'HOTSPOT') {
                        return `<span class="badge text-bg-success">HOTSPOT</span>`
                    } else {
                        return `<span class="badge text-bg-info">PPPOE</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.mac",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tgl_order",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.teknisi",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.deskripsi",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status_assets == 'ACTIVE') {
                        return `<a href="https://www.google.co.id/maps/place/` + data.longitude + `,` + data.latitude + `" target="_blank" type="button" class="btn btn-sm btn-info"><i class="ri-map-pin-line"></i> Lokasi</a>`
                    } else {
                        return `-`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status_assets == 'ACTIVE') {
                        if (user == 'administrator') {
                            return `<button type="button" class="btn btn-sm btn-danger" onclick="delete_data('` + data.id + `','` + data.kode_assets + `','` + data.mac + `')"><i class="ri-delete-bin-line"></i> Hapus</button>&nbsp;<button type="button" class="btn btn-sm btn-warning" onclick="proses_return('` + data.id + `','` + data.kode_assets + `','` + data.mac + `')"><i class="ri-arrow-go-back-line"></i> Return</button>`
                        } else {
                            return `<button type="button" class="btn btn-sm btn-warning" onclick="proses_return('` + data.id + `','` + data.kode_assets + `','` + data.mac + `')"><i class="ri-arrow-go-back-line"></i> Return</button>`
                        }
                    } else {
                        return `<button type="button" class="btn btn-sm btn-danger" onclick="delete_data('` + data.id + `','` + data.kode_assets + `','` + data.mac + `')"><i class="ri-delete-bin-line"></i> Hapus</button>`
                    }
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //isi kategori

        $('#kategori').val('<?= $default_kategori["kategori"] ?>')
    });

    function reload_table() {
        $('#table-user').DataTable().ajax.reload(null, false);
    }

    $('#barang').select2({
        dropdownParent: $('#exampleModalgrid')
    });
    $('#agen').select2({
        dropdownParent: $('#exampleModalgrid')
    });

    function proses_return(id) {
        $('#modalReturn').modal('show');
        $('#id_assets').val(id)
    }

    $('#btn-submit').on('click', function() {
        if ($('#tgl_order').val() == '' || $('#teknisi').val() == '' || $('#longitude').val() == '' || $('#latitude').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'assets');
        form_data.append('sn', $("#sn").val());
        form_data.append('mac', $("#mac").val());
        form_data.append('barang', $("#barang").val());
        form_data.append('kategori', $("#kategori").val());
        form_data.append('agen', $("#agen").val());
        form_data.append('area', $("#area").val());
        form_data.append('type_service', $("#type_service").val());
        form_data.append('pemilik', $("#pemilik").val());
        form_data.append('tgl_order', $("#tgl_order").val());
        form_data.append('teknisi', $("#teknisi").val());
        form_data.append('longitude', $("#longitude").val());
        form_data.append('latitude', $("#latitude").val());
        form_data.append('deskripsi', $("#deskripsi").val());

        var url_ajax = '<?= base_url() ?>dashboard/insert_data_assets'


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
                    $('#suplier').val('')
                    $('#alamat').val('')
                    $('#contact_person').val('')
                    $('#hp').val('')
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

    $("#form-data-return").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#kondisi').val() == '' || $('#keterangan').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'assets');
        form_data.append('kondisi', $("#kondisi").val());
        form_data.append('keterangan', $("#keterangan").val());
        form_data.append('id', $("#id_assets").val());

        var url_ajax = '<?= base_url() ?>dashboard/update_data_assets'


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
                    $('#keterangan').val('')
                    $('#id').val('')
                    $('#modalReturn').modal('hide');
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

    function delete_data(id, kode, mac) {

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
                    url: '<?= base_url() ?>dashboard/delete_data_assets',
                    data: {
                        id: id,
                        kode: kode,
                        mac: mac,
                        table: "assets"
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

    $("#exampleModalgrid").on('shown.bs.modal', function() {
        $(this).find("input:visible:first").focus();
    });

    $('#barang').on('change', function() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/getkategori',
            data: {
                barang: $('#barang').val(),
                table: "sparepart"
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                $('#kategori').val(result)
            }
        })
    })
</script>