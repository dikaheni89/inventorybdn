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

    <!-- Layout config Js -->
    <script src="<?= base_url('assets/default/assets/js/layout.js') ?>"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/default/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/default/assets/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />
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
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sibernet</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php

            if ($this->session->userdata('role_id') == 'administrator' || $this->session->userdata('role_id') == 'gudang') {
            ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card crm-widget">
                            <div class="card-body p-0">
                                <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
                                    <div class="col">
                                        <div class="py-4 px-3">
                                            <h5 class="text-muted text-uppercase fs-13">Transaksi Masuk <a href="<?= base_url('dashboard/transaksi_masuk') ?>" class="float-end text-decoration-underline fs-10">Detail</a></h5>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                        <i class="ri-login-circle-fill  align-middle"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3 detail_transaksi_masuk"></div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col">
                                        <div class="mt-3 mt-md-0 py-4 px-3">
                                            <h5 class="text-muted text-uppercase fs-13">Transaksi Keluar <a href="<?= base_url('dashboard/transaksi_keluar') ?>" class="float-end text-decoration-underline fs-10">Detail</a></h5>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                        <i class="ri-logout-circle-r-fill align-middle"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3 detail_transaksi_keluar"></div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col">
                                        <div class="mt-3 mt-md-0 py-4 px-3">
                                            <h5 class="text-muted text-uppercase fs-13">Saldo Berjalan <a href="<?= base_url('dashboard/assets') ?>"><i class="ri-arrow-right-circle-line text-success fs-22 float-end align-middle"></i></a></h5>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                        <i class="ri-archive-fill align-middle"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3 detail_saldo_berjalan"></div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col">
                                        <div class="mt-3 mt-lg-0 py-4 px-3">
                                            <h5 class="text-muted text-uppercase fs-13">Assets Aktif <a href="<?= base_url('dashboard/assets_active') ?>"><i class="ri-arrow-right-circle-line text-success fs-22 float-end align-middle"></i></a></h5>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                        <i class="ri-router-fill align-middle"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3" id="card_assets_active">
                                                    <h2 class="mb-0"><span class="counter-value" data-target="197">0</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col">
                                        <div class="mt-3 mt-lg-0 py-4 px-3">
                                            <h5 class="text-muted text-uppercase fs-13">Assets Not-Aktif <a href="<?= base_url('dashboard/assets_notactive') ?>" class="float-end text-decoration-underline fs-10">Detail</a></h5>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                        <i class="ri-inbox-fill align-middle"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3 detail_asset_non_active"></div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->

            <?php
            }
            ?>

            <div class="row">
                <div class="col-xxl-8 col-md-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Kategori Assets</h4>
                        </div><!-- end card header -->
                        <div class="card-body pb-0">
                            <div id="jenis-pekerjaan-chart" class="apex-charts"></div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xxl-4">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Posisi Assets</h4>
                        </div><!-- end card header -->
                        <div class="card-body px-0">

                            <div id="assets-active-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">List Part Request</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                    <thead class="table-light">
                                        <tr class="text-muted">
                                            <th scope="col">Barang</th>
                                            <th scope="col" style="width: 20%;">Jumlah</th>
                                            <th scope="col">Teknisi/Requester</th>
                                            <th scope="col" style="width: 16%;">Jenis</th>
                                            <th scope="col" style="width: 16%;">Keperluan</th>
                                            <th scope="col" class="text-center" style="width: 16%;">Action</th>
                                            <th scope="col" style="width: 12%;">Time Request</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-part-request">
                                        <?php //foreach ($req as $key => $value) {
                                        ?>
                                        <!-- <tr>
                                                <td><?= $value['nama_barang'] ?></td>
                                                <td><?= $value['jumlah'] ?></td>
                                                <td><?= $value['teknisi'] ?></td>
                                                <td><?= $value['jenis'] == 'ASSET' ? '<span class="badge badge-soft-danger p-2">Asset</span>' : '<span class="badge badge-soft-info p-2">Inventory</span>' ?></td>
                                                <td><?= $value['keperluan'] ?></td>
                                                <td> -->
                                        <?php
                                        // if ($value['status_request'] == 'OPEN') {
                                        //     if ($this->session->userdata('role_id') == 'administrator') {
                                        //         echo '<button type="button" class="btn btn-sm btn-danger" onclick="delete_data(' . $value["id"] . ',' . $value["kode_barang"] . ',' . $value["nama_barang"] . ',' . $value["keperluan"] . ',' . $value["jenis"] . ')"><i class="ri-delete-bin-line"></i> Hapus</button>
                                        //         &nbsp;
                                        //         <button type="button" class="btn btn-sm btn-success" onclick="approve(' . $value["id"] . ',' . $value["kode_barang"] . ',' . $value["nama_barang"] . ',' . $value["keperluan"] . ',' . $value["jenis"] . ')"><i class="ri-thumb-up-line"></i> Approve</button>
                                        //         &nbsp;
                                        //         <button type="button" class="btn btn-sm btn-danger" onclick="reject(' . $value["id"] . ',' . $value["kode_barang"] . ',' . $value["nama_barang"] . ',' . $value["keperluan"] . ',' . $value["jenis"] . ')"><i class="ri-thumb-down-line"></i> Reject</button>';
                                        //     } else if ($this->session->userdata('role_id') == 'gudang') {
                                        //         echo '<button type="button" class="btn btn-sm btn-success" onclick="approve(' . $value['id'] . ',' . $value['kode_barang'] . ',' . $value['nama_barang'] . ',' . $value['keperluan'] . ',' . $value['jenis'] . ')"><i class="ri-thumb-up-line"></i> Approve</button>
                                        //         &nbsp;
                                        //         <button type="button" class="btn btn-sm btn-danger" onclick="reject(' . $value['id'] . ',' . $value['kode_barang'] . ',' . $value['nama_barang'] . ',' . $value['keperluan'] . ',' . $value['jenis'] . ')"><i class="ri-thumb-down-line"></i> Reject</button>';
                                        //     } else if ($this->session->userdata('role_id') == 'teknisi' ||  $this->session->userdata('role_id') == 'gudang') {
                                        //         echo '<button type="button" class="btn btn-sm btn-danger" onclick="delete_data(' . $value['id'] . ',' . $value['kode_barang'] . ',' . $value['nama_barang'] . ',' . $value['keperluan'] . ',' . $value['jenis'] . ')"><i class="ri-delete-bin-line"></i> Hapus</button>';
                                        //     }
                                        // } else if ($value['status_request'] == 'APPROVED') {
                                        //     echo '<span class="badge badge-soft-success badge-border">APPROVED</span>';
                                        // } else {
                                        //     echo '<span class="badge badge-soft-danger badge-border">REJECTED</span>';
                                        // }
                                        ?>
                                        <!-- </td>
                                                <td>
                                                    <div class="text-nowrap"><?= date('d-M-Y H:i:s', strtotime($value['date_created'])) ?></div>
                                                </td>
                                            </tr> -->
                                        <?php //} 
                                        ?>
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <?php

                if ($this->session->userdata('role_id') == 'administrator' || $this->session->userdata('role_id') == 'gudang') {
                ?>

                    <div class="col-xl-12">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Last Activity</h4>
                                <!-- <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted"><i class="ri-settings-4-line align-middle me-1 fs-15"></i>Settings</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Remove</a>
                                    </div>
                                </div>
                            </div> -->
                            </div><!-- end card header -->

                            <div class="card-body p-0">

                                <!-- <div class="align-items-center p-3 justify-content-between d-flex">
                                <div class="flex-shrink-0">
                                    <div class="text-muted"><span class="fw-semibold">4</span> of <span class="fw-semibold">10</span> remaining</div>
                                </div>
                                <button type="button" class="btn btn-sm btn-success"><i class="ri-add-line align-middle me-1"></i> Add Task</button>
                            </div> -->

                                <div data-simplebar style="max-height: 519px;">
                                    <ul class="list-group list-group-flush border-dashed px-3">
                                        <?php foreach ($log as $key => $value) {
                                        ?>
                                            <li class="list-group-item ps-0">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-check-label mb-0 ps-2" for="task_one"><?= '[' . $value['nama'] . ']' . '[' . $value['aktivitas'] . ']' . '[' . $value['ip_address'] . ']' ?></label>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <p class="text-muted fs-12 mb-0"><?= date('d-M-Y H:i:s', strtotime($value['date_created'])) ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul><!-- end ul -->
                                </div>

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                <?php
                }
                ?>
            </div><!-- end row -->

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
                    </script> © Solusiciptamedia
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

<!-- apexcharts -->
<script src="<?= base_url('assets/default/assets/libs/apexcharts/apexcharts.min.js') ?>"></script>

<!-- Dashboard init -->
<script src="<?= base_url('assets/default/assets/js/pages/dashboard-crm.init.js') ?>"></script>

<script src="<?= base_url('assets/default/assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- App js -->
<script src="<?= base_url('assets/default/assets/js/app.js') ?>"></script>
</body>

</html>

<script>
    var base_url = "<?= base_url() ?>",
        role_id = "<?= $this->session->userdata('role_id') ?>",
        jumlah_kategori_chart, chart_pendapatan

    $(function() {
        jumlah_kategori_chart()
        asset_active_chart()
        jml_transaksi_masuk()
        jml_transaksi_keluar()
        jml_total_assets()
        jml_assets_aktif()
        jml_total_assets_not_aktif()
        top_5_detail_transaksi_masuk()
        top_5_detail_transaksi_keluar()
        top_5_saldo_berjalan()
        asset_non_active()
        ajax_data_part_request()
    });

    function toast(icon, message) {
        Swal.fire({
            icon: icon,
            text: message
        })
    }

    function jml_transaksi_masuk() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/gettransaksimasuk',
            type: 'post',
            dataType: 'json',
            success: function(result) {
                var html = `<h2 class="mb-0"><span class="counter-value" data-target="197">` + result + `</span></h2>`

                $('#card_masuk').html(html)
            }
        })
    }

    function jml_transaksi_keluar() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/gettransaksikeluar',
            type: 'post',
            dataType: 'json',
            success: function(result) {
                // console.log(result)
                var html2 = `<h2 class="mb-0"><span class="counter-value" data-target="197">` + result + `</span></h2>`

                $('#card_keluar').html(html2)
            }
        })
    }

    function jml_total_assets() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/gettotalassets',
            type: 'post',
            dataType: 'json',
            success: function(result) {
                // console.log(result)
                var html3 = `<h2 class="mb-0"><span class="counter-value" data-target="197">` + result + `</span></h2>`

                $('#card_assets').html(html3)
            }
        })
    }

    function jml_assets_aktif() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/getassetsactive',
            type: 'post',
            dataType: 'json',
            success: function(result) {
                // console.log(result)
                var html4 = `<h2 class="mb-0"><span class="counter-value" data-target="197">` + result + `</span></h2>`

                $('#card_assets_active').html(html4)
            }
        })
    }

    function jml_total_assets_not_aktif() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/getassetsnotactive',
            type: 'post',
            dataType: 'json',
            success: function(result) {
                // console.log(result)
                var html5 = `<h2 class="mb-0"><span class="counter-value" data-target="197">` + result + `</span></h2>`

                $('#card_assets_not_active').html(html5)
            }
        })
    }

    function jumlah_kategori_chart(bulan, tahun) {
        var series = []
        $.ajax({
            url: `${base_url}graph/ajax_data_kategori`,
            dataType: "json",
            success: function(result) {
                result.forEach(d => {
                    series.push({
                        name: `${d.kategori}`,
                        data: [d.jumlah]
                    })
                });
                // if (jumlah_kategori_chart != null) jumlah_kategori_chart.destroy()
                var options_jumlah_kategori_chart = {
                    series: series,
                    chart: {
                        type: 'bar',
                        height: 325
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '70%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: true
                    },
                    stroke: {
                        show: true,
                        width: 10,
                        colors: ['transparent']
                    },
                    xaxis: {
                        labels: {
                            show: false
                        },
                        categories: ['Jumlah Kategori'],
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        x: {
                            show: false
                        }
                    }
                };

                jumlah_kategori_chart = new ApexCharts(document.querySelector("#jenis-pekerjaan-chart"), options_jumlah_kategori_chart);
                jumlah_kategori_chart.render()
            }
        })
    }

    function asset_active_chart() {
        var labels = []
        $.ajax({
            url: `${base_url}graph/ajax_data_asset_active`,
            dataType: "json",
            success: function(result) {
                var datas = []
                result.forEach(d => {
                    datas.push(parseInt(d.jumlah))
                    labels.push(d.kategori)
                });

                var options_assets_active_chart = {
                    series: datas,
                    chart: {
                        width: 380,
                        type: 'pie',
                    },
                    labels: labels,
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var assets_active_chart = new ApexCharts(document.querySelector("#assets-active-chart"), options_assets_active_chart);
                assets_active_chart.render();
            }
        })
    }

    function top_5_detail_transaksi_masuk() {
        $.ajax({
            url: base_url + 'inventory/ajax_top_5_detail_transaksi_masuk',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $(".detail_transaksi_masuk").append(`
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="m-0">${d.kategori}</p>
                                <p class="m-0">${d.jumlah}</p>
                            </div>`)
                });
            },
            error: function(err) {
                console.log(err.responseText);
            }
        })
    }

    function top_5_detail_transaksi_keluar() {
        $.ajax({
            url: base_url + 'inventory/ajax_top_5_detail_transaksi_keluar',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $(".detail_transaksi_keluar").append(`
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="m-0">${d.kategori}</p>
                                <p class="m-0">${d.jumlah}</p>
                            </div>`)
                });
            },
            error: function(err) {
                console.log(err.responseText);
            }
        })
    }

    function top_5_saldo_berjalan() {
        $.ajax({
            url: base_url + 'inventory/ajax_top_5_saldo_berjalan',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $(".detail_saldo_berjalan").append(`
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="m-0">${d.kategori}</p>
                                <p class="m-0">${d.jumlah}</p>
                            </div>`)
                });
            },
            error: function(err) {
                console.log(err.responseText);
            }
        })
    }

    function asset_non_active() {
        $.ajax({
            url: base_url + 'inventory/ajax_asset_non_active',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $(".detail_asset_non_active").append(`
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="m-0">${d.kondisi}</p>
                                <p class="m-0">${d.jumlah}</p>
                            </div>`)
                });
            },
            error: function(err) {
                console.log(err.responseText);
            }
        })
    }

    function ajax_data_part_request() {
        $.ajax({
            url: base_url + 'Part_request/ajax_data_part_request',
            dataType: 'json',
            success: function(result) {
                $(".tbody-part-request").html(``)
                var html = ""
                result.forEach(d => {
                    jenis = d.jenis == "ASSET" ? "<span class='badge badge-soft-danger p-2'>Asset</span>" : "<span class='badge badge-soft-info p-2'>Inventory</span>"
                    action = `<span class="badge badge-soft-danger badge-border">REJECTED</span>`

                    if (d.status_request == "APPROVED") action = `<span class='badge badge-soft-success badge-border'>APPROVED</span>`
                    if (d.status_request == "OPEN") {
                        action_data = `'${d.id}', '${d.kode_barang}', '${d.nama_barang}', '${d.keperluan}', '${d.jenis}'`
                        btn_delete = `<button type="button" class="btn btn-sm btn-danger" onclick="delete_part_req(${action_data})"><i class="ri-delete-bin-line"></i> Hapus</button>`
                        btn_approve = `<button type="button" class="btn btn-sm btn-success" onclick="approve_part_req(${action_data})"><i class="ri-thumb-up-line"></i> Approve</button>`
                        btn_reject = `<button type="button" class="btn btn-sm btn-danger" onclick="reject_part_req(${action_data})"><i class="ri-thumb-down-line"></i> Reject</button>`

                        if (role_id == "administrator") action = btn_delete + btn_approve + btn_reject
                        if (role_id == "gudang") action = btn_approve + btn_reject
                        if (role_id == "teknisi") action = btn_hapus
                    }

                    html += `<tr>
                                <td>${d.nama_barang}</td>
                                <td>${d.jumlah}</td>
                                <td>${d.teknisi}</td>
                                <td>${jenis}</td>
                                <td>${d.keperluan}</td>
                                <td><div class="d-flex column-gap-5 justify-content-center">${action}</div></td>
                                <td>${d.date_created}</td>
                            </tr>`
                });
                $(".tbody-part-request").append(html)
            },
            error: function(err) {
                console.log(err.responseText);
            }
        })
    }

    function delete_part_req(id, kode_barang, nama_barang, keperluan, jenis) {
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
                    url: base_url + 'dashboard/delete_data_part_request',
                    data: {
                        id: id,
                        kode_barang: kode_barang,
                        nama_barang: nama_barang,
                        keperluan: keperluan,
                        jenis: jenis,
                        table: "part_request"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        toast(result.status, result.message)
                        if (result.status !== "success") return
                        page_reload()
                    }
                })
            }
        })
    }

    function approve_part_req(id, kode_barang, nama_barang, keperluan, jenis) {
        Swal.fire({
            title: `Approve ${nama_barang}?`,
            text: "Pastikan pilihan anda sesuai!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Approve!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: base_url + 'dashboard/approve_request',
                    data: {
                        id: id,
                        kode_barang: kode_barang,
                        nama_barang: nama_barang,
                        keperluan: keperluan,
                        jenis: jenis,
                        table: "part_request"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        toast(result.status, result.message)
                        if (result.status !== "success") return
                        page_reload()
                    }
                })
            }
        })
    }

    function reject_part_req(id, kode_barang, nama_barang, keperluan, jenis) {
        Swal.fire({
            title: `Reject ${nama_barang}?`,
            text: "Pastikan pilihan anda sesuai!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Reject!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: base_url + 'dashboard/reject_request',
                    data: {
                        id: id,
                        kode_barang: kode_barang,
                        nama_barang: nama_barang,
                        keperluan: keperluan,
                        jenis: jenis,
                        table: "part_request"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        toast(result.status, result.message)
                        if (result.status !== "success") return
                        page_reload()
                    }
                })
            }
        })
    }

    function page_reload() {
        setTimeout(() => {
            location.reload()
        }, 2000);
    }
</script>