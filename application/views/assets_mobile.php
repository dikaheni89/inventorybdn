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

            <!-- <div class="alert alert-primary" role="alert">
                <strong>Info :</strong> Halaman ini digunakan untuk menambahkan dan menghapus Assets!
            </div> -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Buttons Grid -->
                    <div class="d-flex justify-content-between mb-1">
                        <div>
                            <a href="<?= base_url('dashboard/assets_mobile') ?>" class="btn btn-success" type="button"><i class="ri-refresh-line"></i> Refresh</a>
                        </div>
                        <div>
                            <a href="<?= base_url('dashboard/list_assets_mobile') ?>" class="btn btn-info" type="button"><i class="ri-router-line"></i> Assets</a>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button">Register Asset</button>
                    </div>
                    <!-- <div id="qr-reader"></div>
                    <div id="qr-reader-results"></div> -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>Silahkan Input Data</h5>
                            <div style="display: none;" id="cam-sn">
                                <video id="previewKamera" style="width: 300px;height: 300px;"></video>
                                <br>
                                <select id="pilihKamera" style="max-width:400px">
                                </select>
                                <!-- <br> -->
                                <!-- <input type="text" id="hasilscan"> -->
                            </div>
                        </div>


                        <div class="card-body">
                            <form id="form-data">
                                <div class="row g-3">
                                    <div class="col-xxl-12 mt-2">
                                        <div class="d-flex justify-content-between mb-1">
                                            <div>
                                                <label for="sn" class="form-label">Serial Number (SN)</label>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-sm btn-danger" id="btn-cam-sn"><i class="ri-camera-line"></i></button>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="sn" onkeyup="this.value = this.value.toUpperCase()">

                                    </div><!--end col-->
                                    <div class="col-xxl-12">
                                        <div class="d-flex justify-content-between mb-1">
                                            <div>
                                                <label for="sn" class="form-label">Mac Address</label>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-sm btn-danger" id="btn-cam-mac"><i class="ri-camera-line"></i></button>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="mac" onkeyup="this.value = this.value.toUpperCase()">

                                    </div><!--end col-->
                                    <div class="col-xxl-12">
                                        <div>
                                            <label for="barang" class="form-label">Barang</label>
                                            <select name="barang" id="barang" class="form-control">
                                                <?php
                                                foreach ($barang as $key) {
                                                ?>
                                                    <option value="<?= $key->kode_barang . '*' . $key->nama_barang ?>"><?= $key->kode_barang . ' - ' . $key->nama_barang ?></option>
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
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div><!--end col-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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

    <!-- Sweet Alerts js -->
    <script src="<?= base_url('assets/default/assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- Sweet alert init js-->
    <script src="<?= base_url('assets/default/assets/js/pages/sweetalerts.init.js') ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/default/assets/js/app.js') ?>"></script>
    <!-- <script src="<?= base_url('assets/default/assets/js/html5-qrcode.min.js') ?>"></script> -->
    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>

    </body>



</html>

<script>
    $(function() {
        $('#kategori').val('<?= $default_kategori["kategori"] ?>')
    });

    $('#barang').select2({});
    $('#agen').select2({});
    $('#area').select2({});

    $("#form-data").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#tgl_order').val() == '' || $('#teknisi').val() == '' || $('#lokasi').val() == '' || $('#longitude').val() == '' || $('#latitude').val() == '') {
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
        form_data.append('pemilik', $("#pemilik").val());
        form_data.append('area', $("#area").val());
        form_data.append('type_service', $("#type_service").val());
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
                    //direct ke halaman list asset
                    window.location.href = '<?= base_url('dashboard/list_assets_mobile') ?>';
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

    $('#btn-cam-sn').on('click', function() {
        $('#cam-sn').show('500')
        camSn()
    });

    $('#btn-cam-mac').on('click', function() {
        $('#cam-sn').show('500')
        camMac()
    });
</script>

<script>
    function camSn() {

        let selectedDeviceId = null;
        const codeReader = new ZXing.BrowserMultiFormatReader();
        const sourceSelect = $("#pilihKamera");

        $(document).on('change', '#pilihKamera', function() {
            selectedDeviceId = $(this).val();
            if (codeReader) {
                codeReader.reset()
                initScanner()
            }
        })

        function initScanner() {
            codeReader
                .listVideoInputDevices()
                .then(videoInputDevices => {
                    videoInputDevices.forEach(device =>
                        console.log(`${device.label}, ${device.deviceId}`)
                    );
                    if (videoInputDevices.length > 0) {

                        if (selectedDeviceId == null) {
                            if (videoInputDevices.length > 1) {
                                selectedDeviceId = videoInputDevices[1].deviceId
                            } else {
                                selectedDeviceId = videoInputDevices[0].deviceId
                            }
                        }
                        if (videoInputDevices.length >= 1) {
                            sourceSelect.html('');
                            videoInputDevices.forEach((element) => {
                                const sourceOption = document.createElement('option')
                                sourceOption.text = element.label
                                sourceOption.value = element.deviceId
                                if (element.deviceId == selectedDeviceId) {
                                    sourceOption.selected = 'selected';
                                }
                                sourceSelect.append(sourceOption)
                            })
                        }
                        codeReader
                            .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                            .then(result => {

                                //hasil scan
                                console.log(result.text)
                                $("#sn").val(result.text);

                                if (codeReader) {
                                    codeReader.reset()
                                    $('#cam-sn').hide('500')
                                }
                            })
                            .catch(err => console.error(err));

                    } else {
                        alert("Camera not found!")
                    }
                })
                .catch(err => console.error(err));
        }


        if (navigator.mediaDevices) {
            initScanner()
        } else {
            alert('Cannot access camera.');
        }
    }

    function camMac() {

        let selectedDeviceId = null;
        const codeReader = new ZXing.BrowserMultiFormatReader();
        const sourceSelect = $("#pilihKamera");

        $(document).on('change', '#pilihKamera', function() {
            selectedDeviceId = $(this).val();
            if (codeReader) {
                codeReader.reset()
                initScanner()
            }
        })

        function initScanner() {
            codeReader
                .listVideoInputDevices()
                .then(videoInputDevices => {
                    videoInputDevices.forEach(device =>
                        console.log(`${device.label}, ${device.deviceId}`)
                    );
                    if (videoInputDevices.length > 0) {

                        if (selectedDeviceId == null) {
                            if (videoInputDevices.length > 1) {
                                selectedDeviceId = videoInputDevices[1].deviceId
                            } else {
                                selectedDeviceId = videoInputDevices[0].deviceId
                            }
                        }
                        if (videoInputDevices.length >= 1) {
                            sourceSelect.html('');
                            videoInputDevices.forEach((element) => {
                                const sourceOption = document.createElement('option')
                                sourceOption.text = element.label
                                sourceOption.value = element.deviceId
                                if (element.deviceId == selectedDeviceId) {
                                    sourceOption.selected = 'selected';
                                }
                                sourceSelect.append(sourceOption)
                            })
                        }
                        codeReader
                            .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                            .then(result => {

                                //hasil scan
                                console.log(result.text)
                                $("#mac").val(result.text);

                                if (codeReader) {
                                    codeReader.reset()
                                    $('#cam-sn').hide('500')
                                }
                            })
                            .catch(err => console.error(err));

                    } else {
                        alert("Camera not found!")
                    }
                })
                .catch(err => console.error(err));
        }


        if (navigator.mediaDevices) {
            initScanner()
        } else {
            alert('Cannot access camera.');
        }
    }

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