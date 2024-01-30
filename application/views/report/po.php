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
    <!-- Icons Css -->
    <link href="<?= base_url('assets/default/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/default/assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url('assets/default/assets/css/custom.min.css') ?>" rel="stylesheet" type="text/css" />

    <style>
        .gb-depan {
            background-image: url("assets/default/assets/images/<?= $gambar_depan ?>") !important;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<style type="text/css">
    label {
        font-size: 9px;
        color: black;
        margin: 0px;
    }

    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 7mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 100vh;
            overflow: initial;
        }

        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: avoid;
            page-break-inside: avoid;
            page-break-before: avoid;
        }
    }

    p {
        font-size: 12px;
        margin-bottom: 2px;
        line-height: 1.5;
        font-weight: normal;
    }

    small {
        font-size: 12px;
        line-height: 1.0 !important;
        font-weight: normal;
    }

    th,
    td {
        font-size: 12px;
        padding-top: 2px !important;
        padding-bottom: 2px !important;
        padding-right: 5px !important;
        padding-left: 5px;
        border-right: 1pt solid black !important;
        border-left: 1pt solid black !important;

    }

    .b-bottom {
        border-bottom: 1pt solid black;
    }

    .b-top {
        border-top: 1pt solid black;
    }

    .purchase-order {
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: -100px;
        font-weight: bold;
        ;
        font-style: italic;
    }
</style>

<body>
    <!-- Main content -->
    <div class="page">
        <div class="row">
            <div class="col-8">
                <h5><?= $nama_badan ?></h5>
                <p><?= $alamat ?></p>
                <p>Telp : <?= $handphone ?></p>
                <p>NPWP : <?= $npwp ?></p>
            </div>
            <div class="col-4">
                <h4 style="text-decoration: underline;">PURCHASE ORDER</h4>
                <p>PO NO : <?= $po_number ?></p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6" style="border: 1px solid black;margin-left: 10px;">
                <p><strong>VENDOR</strong></p>
                <p><?= $suplier ?></p>
                <p><?= $alamat ?></p>
                <p><?= $handphone ?></p>
                <p>Attn. <?= $contact_person ?></p>
            </div>
            <div class="col-2">
            </div>
            <div class="col-4" style="margin-left: -10px;">
                <div class="row">
                    <div class="col-4">
                        <p>Date</p>
                        <p>Order No</p>
                        <p>Delivery</p>
                    </div>
                    <div class="col-8">
                        <p>: <?= $date_created ?></p>
                        <p>: <?= $order_no ?></p>
                        <p>: <?= $delivery_date ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <p><strong>Please Supply the following items :</strong></p>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <table border="1" style="width: 100%;">
                    <thead style="border-bottom: 1px solid black; height: 30px;">
                        <th>No.</th>
                        <th>Description of Goods</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                    </thead>
                    <tbody style="line-height: 1.5;">
                        <?php
                        $i = 1;
                        foreach ($po_detil as $key) {

                        ?>
                            <tr style="border-bottom: 1px solid black;">
                                <td><?= $i ?></td>
                                <td><?= $key->nama_barang ?></td>
                                <td><?= $key->unit ?></td>
                                <td><?= $key->quantity ?></td>
                                <td>Rp. <?= number_format($key->unit_price) ?></td>
                                <td>Rp. <?= number_format($key->amount) ?></td>
                            </tr>
                        <?php
                            $i++;
                        } ?>
                        <tr>
                            <td colspan="4"><strong>Term of Payment :</strong> <?= $term ?></td>
                            <td style="border-bottom: 1px solid black;"><strong>Sub Total</strong></td>
                            <td style="border-bottom: 1px solid black;">Rp. <?= number_format($sub_total) ?></td>
                        </tr>

                        <tr>
                            <td colspan="4"><strong>Remark :</strong> <?= $remark ?></td>
                            <td style="border-bottom: 1px solid black;"><strong>PPN 11%</strong></td>
                            <td style="border-bottom: 1px solid black;">Rp. <?= number_format($ppn) ?></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td style="border-bottom: 1px solid black;"><strong>Total</strong></td>
                            <td style="border-bottom: 1px solid black;">Rp. <?= number_format($total) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-5">
                <p style="text-decoration: underline;"><strong>Note :</strong></p>
                <p>1. The PO Number must appear on Delivery Order <br>&nbsp;&nbsp;&nbsp; and Invoice.<br>
                    2. For the optimal communicatioan, please sign our <br>&nbsp;&nbsp;&nbsp; Purchase Order and return to us, by email on same <br>&nbsp;&nbsp;&nbsp; day.</p>
            </div>
            <div class="col-7">
                <table style="width: 100%;">
                    <thead style="border: 1px solid black;text-align: center;">
                        <th style="width: 25%;">Order By</th>
                        <th style="width: 25%;">Prepared By</th>
                        <th style="width: 25%;">Approved By</th>
                        <th style="width: 25%;">Confirmed By</th>
                    </thead>
                    <tbody style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <td style="height: 80px;">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>