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


    <!-- Sweet Alert css-->
    <link href="<?= base_url('assets/default/assets/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />




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

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="<?= base_url('assets/default/assets/images/' . $gambar_latar) ?>" class="profile-wid-img" alt="">
                    <div class="overlay-content">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                                <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Ubah Latar
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    <img src="<?= base_url('assets/default/assets/images/' . $favicon) ?>" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                        <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                <i class="ri-camera-fill"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <h5 class="fs-16 mb-1"><?= $nama_usaha ?></h5>
                                <p class="text-muted mb-0"><?= $slogan ?></p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6>Informasi Developer :</h6>
                                    <h6 class="card-title">CV. Solusi Cipta Media</h6>
                                    <small>Jl. Subali Raya Blok 15B/8C, Sekarpuro, Malang 65154</small><br><br>
                                    <small><strong>Website :</strong></small><br>
                                    <small> <a href="https://solusiciptamedia.com" target="_blank">https://solusiciptamedia.com</a></small><br>
                                    <small><strong>Call/WA :</strong></small><br>
                                    <small> <a href="https://wa.me/6281555909690" target="_blank">0815-5590-9690</a></small><br>
                                    <small> <a href="https://wa.me/6289665436633" target="_blank">0896-6543-6633</a></small><br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                        <i class="fas fa-home"></i> Informasi Detil
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#logo-light" role="tab">
                                        <i class="far fa-user"></i> Logo Light
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#logo-dark" role="tab">
                                        <i class="far fa-envelope"></i> Logo Dark
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#gambar-depan" role="tab">
                                        <i class="far fa-envelope"></i> Gambar Depan
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form id="form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="nama_badan" class="form-label">Nama Badan</label>
                                                    <input type="text" class="form-control" id="nama_badan" name="nama_badan" value="<?= $nama_badan ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="npwp" class="form-label">NPWP</label>
                                                    <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $npwp ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="nama_usaha" class="form-label">Nama Brand</label>
                                                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="<?= $nama_usaha ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="handphone" class="form-label">Handphone</label>
                                                    <input type="text" class="form-control" id="handphone" name="handphone" value="<?= $handphone ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="slogan" class="form-label">Slogan</label>
                                                    <input type="text" class="form-control" id="slogan" name="slogan" value="<?= $slogan ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-primary"><i class="ri-upload-cloud-line"></i> Updates</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="logo-light" role="tabpanel">
                                    <form id="form-data-2">
                                        <div class="row g-2">
                                            <div class="text-center">
                                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4" id="gb-light">
                                                    <img src="<?= base_url('assets/default/assets/images/' . $logo_light) ?>" style="max-height: 210px;max-width: auto;background-color: grey;" />
                                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                        <input id="profile-img-file-input-light" type="file" class="profile-img-file-input">
                                                        <label for="profile-img-file-input-light" class="profile-photo-edit avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                                <i class="ri-camera-fill"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <h5 class="fs-16 mb-1"><?= $nama_usaha ?></h5>
                                                <p class="text-muted mb-0"><?= $slogan ?></p>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="logo-dark" role="tabpanel">
                                    <form id="form-data-3">
                                        <div class="row g-2">
                                            <div class="text-center">
                                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4" id="gb-dark">
                                                    <img src="<?= base_url('assets/default/assets/images/' . $logo_dark) ?>" style="max-height: 210px;max-width: auto;" />
                                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                        <input id="profile-img-file-input-dark" type="file" class="profile-img-file-input">
                                                        <label for="profile-img-file-input-dark" class="profile-photo-edit avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                                <i class="ri-camera-fill"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <h5 class="fs-16 mb-1"><?= $nama_usaha ?></h5>
                                                <p class="text-muted mb-0"><?= $slogan ?></p>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="gambar-depan" role="tabpanel">
                                    <form id="form-data-4">
                                        <div class="row g-2">
                                            <div class="text-center">
                                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4" id="gb-depan">
                                                    <img src="<?= base_url('assets/default/assets/images/' . $gambar_depan) ?>" style="max-height: 210px;max-width: auto;" />
                                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                        <input id="profile-img-file-input-depan" type="file" class="profile-img-file-input">
                                                        <label for="profile-img-file-input-depan" class="profile-photo-edit avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                                <i class="ri-camera-fill"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <h5 class="fs-16 mb-1"><?= $nama_usaha ?></h5>
                                                <p class="text-muted mb-0"><?= $slogan ?></p>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Solusi Cipta Media.
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

<!-- profile-setting init js -->
<script src="<?= base_url('assets/default/assets/js/pages/profile-setting.init.js') ?>"></script>

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
        e.preventDefault()

        if ($('#nama_usaha').val() == '' || $('#alamat').val() == '' || $('#handphone').val() == '' || $('#slogan').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }

        var form_data = new FormData();
        form_data.append('table', 'setting_apps');
        form_data.append('nama_usaha', $("#nama_usaha").val());
        form_data.append('alamat', $("#alamat").val());
        form_data.append('handphone', $("#handphone").val());
        form_data.append('slogan', $("#slogan").val());
        form_data.append('nama_badan', $("#nama_badan").val());
        form_data.append('npwp', $("#npwp").val());

        var url_ajax = '<?= base_url() ?>dashboard/insert_setting_detil'


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


    $('#profile-foreground-img-file-input').on('change', function() {


        var form_data = new FormData();
        form_data.append('table', 'setting_apps');
        form_data.append('jenis', 'latar');
        if ($('#profile-foreground-img-file-input').val() !== "") {
            var file_data = $('#profile-foreground-img-file-input').prop('files')[0];
            form_data.append('file', file_data);
        }


        url_ajax = '<?= base_url() ?>dashboard/update_setting_gambar'


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
                    console.log('OK')
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
    });

    $('#profile-img-file-input').on('change', function() {


        var form_data = new FormData();
        form_data.append('table', 'setting_apps');
        form_data.append('jenis', 'favicon');
        if ($('#profile-img-file-input').val() !== "") {
            var file_data = $('#profile-img-file-input').prop('files')[0];
            form_data.append('file', file_data);
        }


        url_ajax = '<?= base_url() ?>dashboard/update_setting_gambar'


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
                    console.log('OK')
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
    });


    $('#profile-img-file-input-light').on('change', function() {


        var form_data = new FormData();
        form_data.append('table', 'setting_apps');
        form_data.append('jenis', 'logo_light');
        if ($('#profile-img-file-input-light').val() !== "") {
            var file_data = $('#profile-img-file-input-light').prop('files')[0];
            form_data.append('file', file_data);
        }


        url_ajax = '<?= base_url() ?>dashboard/update_setting_gambar'


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
                    var html = `<img src="<?= base_url('assets/default/assets/images/') ?>` + result.gambar + `" style="max-height: 210px;max-width: auto;background-color: grey;" />
                                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                        <input id="profile-img-file-input-light" type="file" class="profile-img-file-input">
                                                        <label for="profile-img-file-input-light" class="profile-photo-edit avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                                <i class="ri-camera-fill"></i>
                                                            </span>
                                                        </label>
                                                    </div>`

                    $('#gb-light').html(html)
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
    });


    $('#profile-img-file-input-dark').on('change', function() {


        var form_data = new FormData();
        form_data.append('table', 'setting_apps');
        form_data.append('jenis', 'logo_dark');
        if ($('#profile-img-file-input-dark').val() !== "") {
            var file_data = $('#profile-img-file-input-dark').prop('files')[0];
            form_data.append('file', file_data);
        }


        url_ajax = '<?= base_url() ?>dashboard/update_setting_gambar'


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
                    var html2 = `<img src="<?= base_url('assets/default/assets/images/') ?>` + result.gambar + `" style="max-height: 210px;max-width: auto;" />
                                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                        <input id="profile-img-file-input-dark" type="file" class="profile-img-file-input">
                                                        <label for="profile-img-file-input-dark" class="profile-photo-edit avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                                <i class="ri-camera-fill"></i>
                                                            </span>
                                                        </label>
                                                    </div>`

                    $('#gb-dark').html(html2)
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
    });


    $('#profile-img-file-input-depan').on('change', function() {


        var form_data = new FormData();
        form_data.append('table', 'setting_apps');
        form_data.append('jenis', 'gambar_depan');
        if ($('#profile-img-file-input-depan').val() !== "") {
            var file_data = $('#profile-img-file-input-depan').prop('files')[0];
            form_data.append('file', file_data);
        }


        url_ajax = '<?= base_url() ?>dashboard/update_setting_gambar'


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
                    var html3 = ` <img src="<?= base_url('assets/default/assets/images/') ?>` + result.gambar + `" style="max-height: 210px;max-width: auto;" />
                                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                        <input id="profile-img-file-input-depan" type="file" class="profile-img-file-input">
                                                        <label for="profile-img-file-input-depan" class="profile-photo-edit avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                                <i class="ri-camera-fill"></i>
                                                            </span>
                                                        </label>
                                                    </div>`

                    $('#gb-depan').html(html3)
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
    });
</script>