<?php $sess_menu = $this->uri->segment(2);
$role_id = $this->session->userdata('role_id'); ?>

<body>
    <style>
        .column-gap-5 {
            column-gap: 5px;
        }
    </style>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="<?= base_url('dashboard') ?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/default/assets/images/' . $favicon) ?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/default/assets/images/' . $logo_dark) ?>" alt="" height="32">
                                </span>
                            </a>

                            <a href="<?= base_url('dashboard') ?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/default/assets/images/' . $favicon) ?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/default/assets/images/' . $logo_light) ?>" alt="" height="32">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->

                    </div>

                    <div class="d-flex align-items-center">

                        <h6><?= 'LV.' . strtoupper($this->session->userdata('role_id')) ?></h6>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url('assets/default/assets/images/users/' . $this->session->userdata('photo')) ?>" alt="Header Avatar">
                                </span>
                            </button>
                        </div>
                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <a href="<?= base_url('dashboard/list_request') ?>" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown">
                                <i class="bx bx-bell fs-22"></i>
                                <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"><?= $partreq ?></span>
                            </a>
                        </div>
                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <a href="<?= base_url('auth/logout') ?>" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown">
                                <i class="ri-logout-circle-r-line fs-22"></i>
                            </a>
                        </div>



                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <!-- <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div> -->
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <a href="<?= base_url('dashboard/list_request') ?>" type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle">
                                <i class='bx bx-bell fs-22'></i>
                                <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"><?= $partreq ?></span>
                            </a>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <a href="<?= base_url('auth/logout') ?>" type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle">
                                <i class='ri-logout-circle-r-line fs-22'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="javascript:void(0);" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/default/assets/images/' . $favicon) ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/default/assets/images/' . $logo_dark) ?>" alt="" height="32">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="javascript:void(0);" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/default/assets/images/' . $favicon) ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/default/assets/images/' . $logo_light) ?>" alt="" height="32">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php if ($sess_menu == "info") echo "active" ?>" href="<?= base_url('dashboard/info') ?>">
                                <i class="ri-home-4-line"></i> <span data-key="t-widgets">Dashboard</span>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('role_id') != 'teknisi' && $this->session->userdata('role_id') != 'surveyor') { ?>
                            <li class="menu-title"><span data-key="t-menu">Master</span></li>
                            <?php if ($this->session->userdata('role_id') != 'gudang') { ?>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if ($sess_menu == "user") echo "active" ?>" href="<?= base_url('dashboard/user') ?>">
                                        <i class="ri-account-circle-line"></i> <span data-key="t-widgets">User</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "sparepart") echo "active" ?>" href="<?= base_url('dashboard/sparepart') ?>">
                                    <i class="ri-inbox-archive-line"></i> <span data-key="t-widgets">Barang</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "satuan") echo "active" ?>" href="<?= base_url('dashboard/satuan') ?>">
                                    <i class="ri-ruler-line"></i> <span data-key="t-widgets">Satuan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "suplier") echo "active" ?>" href="<?= base_url('dashboard/suplier') ?>">
                                    <i class="ri-pantone-line"></i> <span data-key="t-widgets">Suplier</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "kategori") echo "active" ?>" href="<?= base_url('dashboard/kategori') ?>">
                                    <i class="ri-apps-2-line"></i> <span data-key="t-widgets">Kategori</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "lokasi") echo "active" ?>" href="<?= base_url('dashboard/lokasi') ?>">
                                    <i class="ri-home-6-line"></i> <span data-key="t-widgets">Gudang</span>
                                </a>
                            </li>
                            <?php if ($this->session->userdata('role_id') != 'gudang') { ?>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if ($sess_menu == "area") echo "active" ?>" href="<?= base_url('dashboard/area') ?>">
                                        <i class="ri-map-2-line"></i> <span data-key="t-widgets">Area Assets</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if ($sess_menu == "agen") echo "active" ?>" href="<?= base_url('dashboard/agen') ?>">
                                        <i class="ri-price-tag-3-line"></i> <span data-key="t-widgets">Agen</span>
                                    </a>
                                </li>
                                <li class="menu-title"><span data-key="t-menu">Purchasing</span></li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if ($sess_menu == "purchase_order") echo "active" ?>" href="<?= base_url('dashboard/purchase_order') ?>">
                                        <i class="ri-file-edit-line"></i> <span data-key="t-widgets">Purchase Order</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if ($sess_menu == "laporan_po") echo "active" ?>" href="<?= base_url('dashboard/laporan_po') ?>">
                                        <i class="ri-file-excel-line"></i> <span data-key="t-widgets">Laporan PO</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="menu-title"><span data-key="t-menu">Inventory</span></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "transaksi_masuk") echo "active" ?>" href="<?= base_url('dashboard/transaksi_masuk') ?>">
                                    <i class="ri-login-circle-line"></i> <span data-key="t-widgets">Transaksi Masuk</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "transaksi_keluar") echo "active" ?>" href="<?= base_url('dashboard/transaksi_keluar') ?>">
                                    <i class="ri-logout-circle-line"></i> <span data-key="t-widgets">Transaksi Keluar</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "saldo_berjalan") echo "active" ?>" href="<?= base_url('dashboard/saldo_berjalan') ?>">
                                    <i class="ri-archive-line"></i> <span data-key="t-widgets">Saldo Berjalan</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="menu-title"><span data-key="t-menu">Part Request</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php if ($sess_menu == "list_request") echo "active" ?>" href="<?= base_url('dashboard/list_request') ?>">
                                <i class="ri-send-plane-fill"></i> <span data-key="t-widgets">List Request</span>
                            </a>
                        </li>
                        <li class="menu-title"><span data-key="t-menu">Assets</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php if ($sess_menu == "assets_mobile") echo "active" ?>" href="<?= base_url('dashboard/assets_mobile') ?>">
                                <i class="ri-smartphone-line"></i> <span data-key="t-widgets">Assets Surveyor</span>
                            </a>
                        </li>
                        <li class="nav-item <?= in_array($role_id, ['surveyor', 'teknisi']) ? "d-none" : "" ?>">
                            <a class="nav-link menu-link <?php if ($sess_menu == "assets_notactive") echo "active" ?>" href="<?= base_url('dashboard/assets_notactive') ?>">
                                <i class="ri-inbox-fill"></i> <span data-key="t-widgets">Assets NotActive</span>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('role_id') != 'teknisi' && $this->session->userdata('role_id') != 'surveyor') { ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "assets") echo "active" ?>" href="<?= base_url('dashboard/assets') ?>">
                                    <i class="ri-router-line"></i> <span data-key="t-widgets">List Assets</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php if ($sess_menu == "validasi_assets") echo "active" ?>" href="<?= base_url('dashboard/validasi_assets') ?>">
                                    <i class="ri-qr-scan-line"></i> <span data-key="t-widgets">Scan QR</span>
                                </a>
                            </li>
                            <li class="menu-title"><span data-key="t-menu">Setting</span></li>
                            <?php if ($this->session->userdata('role_id') != 'gudang') { ?>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if ($sess_menu == "aplikasi") echo "active" ?>" href="<?= base_url('dashboard/aplikasi') ?>">
                                        <i class=" ri-settings-5-line"></i> <span data-key="t-widgets">Aplikasi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if ($sess_menu == "log_aktivitas") echo "active" ?>" href="<?= base_url('dashboard/log_aktivitas') ?>">
                                        <i class=" ri-edit-line"></i> <span data-key="t-widgets">Log Aktivitas</span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url('auth/logout') ?>">
                                <i class="ri-login-box-line"></i> <span data-key="t-widgets">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>