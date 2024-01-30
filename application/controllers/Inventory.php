<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userid')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Please Login!</div>');
            redirect('auth');
        }
        $this->load->model("Crud", "crud");
    }

    public function ajax_data_kategori()
    {
        $data = $this->db->select("kategori, sum(jumlah) jumlah")
            ->from("inventory_saldo")
            ->group_by("kategori")
            ->get()->result_array();

        echo json_encode($data);
    }

    public function ajax_top_5_detail_transaksi_masuk()
    {
        $data = $this->db->select("kategori, sum(jumlah) jumlah")
            ->from("inventory")
            ->where("keterangan", "masuk")
            ->group_by("kategori")
            ->order_by("jumlah", "desc")
            ->limit(5)
            ->get()->result_array();

        echo json_encode($data);
    }

    public function ajax_top_5_detail_transaksi_keluar()
    {
        $data = $this->db->select("kategori, sum(jumlah) jumlah")
            ->from("inventory")
            ->where("keterangan", "keluar")
            ->group_by("kategori")
            ->order_by("jumlah", "desc")
            ->limit(5)
            ->get()->result_array();

        echo json_encode($data);
    }

    public function ajax_top_5_saldo_berjalan()
    {
        $data = $this->db->select("kategori, sum(jumlah) jumlah")
            ->from("inventory_saldo")
            ->group_by("kategori")
            ->order_by("jumlah", "desc")
            ->limit(5)
            ->get()->result_array();

        echo json_encode($data);
    }

    public function ajax_asset_non_active()
    {
        $data = $this->db->select("kondisi, count(kondisi) jumlah")
            ->from("assets_nonactive")
            ->group_by("kondisi")
            ->get()->result_array();

        echo json_encode($data);
    }

    public function delete_transaksi_masuk()
    {
        $id = $this->input->post('id');
        $lokasi = $this->input->post('lokasi');
        $kode_barang = $this->input->post('kode_barang');
        $qty = $this->input->post('qty');

        $delete_inventory = $this->crud->delete("inventory", ['id' => $id]);
        if ($delete_inventory == 0) {
            echo json_encode(['status' => 'error', 'message' => 'Gagal Hapus Transaksi Masuk!', 'error' => 'Error Delete Inventory!']);
            die;
        }

        // $update_inventory_saldo = $this->crud->update("inventory_saldo", ['jumlah' => 'jumlah -' . $qty], ['kode_barang' => $kode_barang]);
        $update_inventory_saldo = $this->db->where(['kode_barang' => $kode_barang])->set("jumlah", "jumlah - $qty", FALSE)->update("inventory_saldo");
        if ($update_inventory_saldo == 0) {
            echo json_encode(['status' => 'error', 'message' => 'Gagal Hapus Transaksi Masuk!', 'error' => 'Error Delete Inventory Saldo!']);
            die;
        }

        // $update_inventory_saldo_detil = $this->crud->update("inventory_saldo_detil", ['jumlah' => 'jumlah -' . $qty], ['kode_barang' => $kode_barang, 'lokasi' => $lokasi]);
        $update_inventory_saldo_detil = $this->db->where(['kode_barang' => $kode_barang, 'lokasi' => $lokasi])->set("jumlah", "jumlah - $qty", FALSE)->update("inventory_saldo_detil");
        if ($update_inventory_saldo_detil == 0) {
            echo json_encode(['status' => 'error', 'message' => 'Gagal Hapus Transaksi Masuk!', 'error' => 'Error Delete Inventory Saldo Detil!']);
            die;
        }

        echo json_encode(['status' => 'success', 'message' => 'Sukses Hapus Transaksi Masuk!']);
    }

    public function nomor_transaksi()
    {
        $data_nomor = $this->db->select("nomor_transaksi")->from("inventory")->order_by("id", "desc")->limit(1)->get()->row_array();

        $seq = 1;
        if ($data_nomor['nomor_transaksi'] !== null) $seq = explode("-", $data_nomor['nomor_transaksi'])[1] + 1;
        $nomor_transaksi = "TR-" . $seq;
        return $nomor_transaksi;
    }

    public function insert_transaksi_masuk()
    {
        $table = $this->input->post("table");
        $tanggal = $this->input->post("tanggal");
        $sparepart = $this->input->post("sparepart");
        $kode_barang  = explode("*", $sparepart)[0];
        $nama_barang = explode("*", $sparepart)[1];
        $kategori = explode("*", $sparepart)[2];
        $suplier = $this->input->post("suplier");
        $invoice = $this->input->post("invoice");
        $lokasi = $this->input->post("lokasi");
        $jumlah = $this->input->post("jumlah");

        $data_inventory = [
            "nomor_transaksi" => $this->nomor_transaksi(),
            "tanggal" => $tanggal,
            "kode_barang" => $kode_barang,
            "nama_barang" => $nama_barang,
            "kategori" => $kategori,
            "suplier" => $suplier,
            "invoice" => $invoice,
            "jumlah" => $jumlah,
            "lokasi" => $lokasi,
            "keterangan" => "MASUK",
        ];
        $insert_inventory = $this->crud->insert("inventory", $data_inventory);

        $check_inventory_saldo = $this->db->select("id")->from("inventory_saldo")->where(['kode_barang' => $kode_barang])->get()->result_array();
        if (count($check_inventory_saldo) == 0) {
            $data_inventory_saldo = [
                "kode_barang" => $kode_barang,
                "nama_barang" => $nama_barang,
                "kategori" => $kategori,
                "jumlah" => $jumlah,
            ];
            $insert_inventory_saldo = $this->crud->insert("inventory_saldo", $data_inventory_saldo);
        } else {
            $update_inventory_saldo = $this->db->where(["kode_barang" => $kode_barang])->set("jumlah", "jumlah + $jumlah", FALSE)->update("inventory_saldo");
            // $update_inventory_saldo = $this->crud->update("inventory_saldo", ['jumlah' => "jumlah+$jumlah"], ['kode_barang' => $kode_barang]);
        }


        $check_inventory_saldo_detil = $this->db->select("id")->from("inventory_saldo_detil")->where(['kode_barang' => $kode_barang, 'lokasi' => $lokasi])->get()->result_array();
        if (count($check_inventory_saldo_detil) == 0) {
            $data_inventory_saldo_detil = [
                "kode_barang" => $kode_barang,
                "nama_barang" => $nama_barang,
                "kategori" => $kategori,
                "jumlah" => $jumlah,
                "lokasi" => $lokasi,
            ];
            $insert_inventory_saldo_detil = $this->crud->insert("inventory_saldo_detil", $data_inventory_saldo_detil);
        } else {
            $update_inventory_saldo_detil = $this->db->where(["kode_barang" => $kode_barang, 'lokasi' => $lokasi])->set("jumlah", "jumlah + $jumlah", FALSE)->update("inventory_saldo_detil");
        }

        if ($insert_inventory) $result = ["status" => "success", "message" => "Sukses Tambah Transaksi Masuk!"];
        else $result = ["status" => "error", "message" => "Gagal Tambah Transaksi Masuk!"];
        echo json_encode($result);
    }
}
