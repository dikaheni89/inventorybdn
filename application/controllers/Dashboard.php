<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends CI_Controller
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
        $this->load->model("Kategori", "kategori");
    }

    public function index()
    {

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $data['title'] = $d['nama_usaha'] . ' | Dashboard';
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $this->load->view('assets', $data);
    }

    public function info()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Dashboard';
        $data['favicon'] = $d['favicon'];

        $data['req'] = $this->crud->get_all_limit_jml('part_request', '10')->result_array();
        $data['log'] = $this->crud->get_all_limit_jml('log_aktivitas', '8')->result_array();

        $this->load->view('dashboard', $data);
    }

    public function user()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | User Manajemen';
        $data['favicon'] = $d['favicon'];

        $this->load->view('user', $data);
    }

    public function assets()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $data['barang'] = $this->crud->get_all('sparepart')->result();
        $data['agen'] = $this->crud->get_all('agen')->result();
        $data['area'] = $this->crud->get_all('area_assets')->result();

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Assets Manajemen';
        $data['favicon'] = $d['favicon'];


        $data['default_kategori'] = $this->crud->get_all_limit('sparepart')->row_array();


        $this->load->view('assets', $data);
    }

    public function assets_active()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $data['barang'] = $this->crud->get_all('sparepart')->result();
        $data['agen'] = $this->crud->get_all('agen')->result();
        $data['area'] = $this->crud->get_all('area_assets')->result();

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Assets Active';
        $data['favicon'] = $d['favicon'];

        $this->load->view('assets_active', $data);
    }

    public function list_request()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);
        $data['barang'] = $this->crud->get_where_group("inventory_saldo", ['jumlah >' => 0], 'kode_barang')->result();

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Part Request';
        $data['favicon'] = $d['favicon'];

        $this->load->view('list_request', $data);
    }

    public function validasi_assets()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Validasi Assets';
        $data['favicon'] = $d['favicon'];

        $this->load->view('validasi_assets', $data);
    }

    public function cetakpo()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $po_no = $_GET['po_no'];

        $po = $this->crud->get_where('purchase_order', ['po_no' => $po_no])->row_array();
        $data['po_number'] = $po['po_no'];
        $data['date_created'] = date('d-M-Y', strtotime($po['date_created']));
        $data['order_no'] = $po['order_no'];
        $data['suplier'] = $po['suplier'];
        $data['alamat'] = $po['alamat'];
        $data['handphone'] = $po['hp'];
        $data['term'] = date('d-M-Y', strtotime($po['term']));
        $data['remark'] = $po['remark'];
        $data['sub_total'] = $po['sub_total'];
        $data['ppn'] = $po['ppn'];
        $data['total'] = $po['total'];
        $data['contact_person'] = $po['contact_person'];
        $data['delivery_date'] = date('d-M-Y', strtotime($po['delivery_date']));

        $data['po_detil'] = $this->crud->get_where('purchase_order_detil', ['po_no' => $po_no])->result();


        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];
        $data['nama_badan'] = $d['nama_badan'];
        $data['npwp'] = $d['npwp'];

        $data['title'] = $d['nama_usaha'] . ' | Purchase Order';
        $data['favicon'] = $d['favicon'];

        $this->load->view('report/po', $data);
    }

    public function purchase_order()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $data['suplier'] = $this->crud->get_all('suplier')->result();
        $data['sparepart'] = $this->crud->get_all('sparepart')->result();

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Purchase Order';
        $data['favicon'] = $d['favicon'];

        $this->load->view('purchase_order', $data);
    }

    public function po_detil()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Purchase Order Detil';
        $data['favicon'] = $d['favicon'];

        $this->load->view('po_detil', $data);
    }

    public function suplier()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Suplier';
        $data['favicon'] = $d['favicon'];

        $this->load->view('suplier', $data);
    }

    public function agen()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Agen';
        $data['favicon'] = $d['favicon'];

        $this->load->view('agen', $data);
    }

    public function aplikasi()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Setting Aplikasi';
        $data['nama_usaha'] = $d['nama_usaha'];
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];
        $data['slogan'] = $d['slogan'];
        $data['gambar_depan'] = $d['gambar_depan'];
        $data['gambar_latar'] = $d['gambar_latar'];
        $data['alamat'] = $d['alamat'];
        $data['handphone'] = $d['handphone'];
        $data['nama_badan'] = $d['nama_badan'];
        $data['npwp'] = $d['npwp'];

        $this->load->view('aplikasi', $data);
    }

    public function laporan_po()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Laporan Purchase Order';
        $data['favicon'] = $d['favicon'];

        $this->load->view('laporan_po', $data);
    }

    public function lokasi()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Gudang';
        $data['favicon'] = $d['favicon'];

        $this->load->view('lokasi', $data);
    }

    public function area()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Area Assets';
        $data['favicon'] = $d['favicon'];

        $this->load->view('area', $data);
    }

    public function kategori()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Kategori';
        $data['favicon'] = $d['favicon'];

        $this->load->view('kategori', $data);
    }

    public function satuan()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Satuan';
        $data['favicon'] = $d['favicon'];

        $this->load->view('satuan', $data);
    }

    public function transaksi_masuk()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $data['sparepart'] = $this->crud->get_all('sparepart')->result();
        $data['lokasi'] = $this->crud->get_all('lokasi')->result();
        $data['suplier'] = $this->crud->get_all('suplier')->result();

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Transaksi Masuk';
        $data['favicon'] = $d['favicon'];

        $this->load->view('transaksi_masuk', $data);
    }

    public function transaksi_keluar()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $data['sparepart'] = $this->crud->get_all('sparepart')->result();
        $data['lokasi'] = $this->crud->get_all('lokasi')->result();

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Transaksi Keluar';
        $data['favicon'] = $d['favicon'];

        $this->load->view('transaksi_keluar', $data);
    }

    public function saldo_berjalan()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);


        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Saldo Berjalan';
        $data['favicon'] = $d['favicon'];

        $this->load->view('saldo_berjalan', $data);
    }

    public function assets_mobile()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $data['barang'] = $this->crud->get_all('sparepart')->result();
        $data['agen'] = $this->crud->get_all('agen')->result();
        $data['area'] = $this->crud->get_all('area_assets')->result();

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Assets Mobile';
        $data['favicon'] = $d['favicon'];

        $data['default_kategori'] = $this->crud->get_all_limit('sparepart')->row_array();

        $this->load->view('assets_mobile', $data);
    }

    public function list_assets_mobile()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | List Assets Mobile';
        $data['favicon'] = $d['favicon'];

        $this->load->view('list_assets_mobile', $data);
    }

    public function sparepart()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $data['kategori'] = $this->crud->get_all('kategori')->result();
        $data['satuan'] = $this->crud->get_all('satuan')->result();

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Barang';
        $data['favicon'] = $d['favicon'];

        $this->load->view('sparepart', $data);
    }

    public function assets_notactive()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Assets Not Active';
        $data['favicon'] = $d['favicon'];

        $this->load->view('assets_notactive', $data);
    }

    public function log_aktivitas()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Log Aktivitas';
        $data['favicon'] = $d['favicon'];

        $this->load->view('log_aktivitas', $data);
    }

    public function tes()
    {

        $data['partreq'] = $this->crud->count_where('part_request', ['status_request' => 'OPEN']);

        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Dashboard';
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $this->load->view('tes', $data);
    }

    public function ajax_table_karyawan()
    {
        $table = 'user'; //nama tabel dari database
        $column_order = array('id', 'name', 'photo', 'userid', 'is_active', 'role_id', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'name', 'photo', 'userid', 'is_active', 'role_id', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, name, photo, userid, is_active, role_id, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['name'] = $key->name;
            $row['data']['photo'] = $key->photo;
            $row['data']['userid'] = $key->userid;
            $row['data']['is_active'] = $key->is_active;
            if ($key->role_id == 'administrator') {
                $row['data']['role_id'] = 'Administrator';
            } else if ($key->role_id == 'gudang') {
                $row['data']['role_id'] = 'Kepala Gudang';
            } else if ($key->role_id == 'teknisi') {
                $row['data']['role_id'] = 'Teknisi';
            } else {
                $row['data']['role_id'] = 'Surveyor';
            }
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert_data_user()
    {

        $table = $this->input->post("table");

        $config['upload_path']          = "assets/default/assets/images/users/";
        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size']             = 1024;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $data = $this->input->post();
        unset($data['table']);
        // unset($data['password']);

        if (count($_FILES) > 0) {
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();
            $data['photo'] = $data_upload['file_name'];
        } else {
            $data['photo'] = 'asa.jpg';
        }



        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['is_active'] = '1';

        //cek dulu apakah userID sudah ada ?
        $userid = $data['userid'];
        $where = array(
            'userid' => $userid
        );
        $a = $this->crud->get_where('user', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'error', 'message' => 'UserID sudah terpakai!'];
            echo json_encode($response);
            die;
        }


        $insert_data = $this->crud->insert($table, $data);

        //tulis log ke tabel aktivitas
        $this->insert_log('Menambahkan user baru : ' . $userid . ' - Level : ' . $data['role_id']);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function update_data_user()
    {

        $table = $this->input->post("table");

        $config['upload_path']          = "assets/default/assets/images/users/";
        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size']             = 1024;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $data = $this->input->post();
        unset($data['table']);
        // unset($data['password']);

        if (count($_FILES) > 0) {
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();
            $data['photo'] = $data_upload['file_name'];
        }



        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['is_active'] = '1';

        //cek dulu apakah userID sudah ada ?
        $userid = $data['userid'];
        $where = array(
            'userid' => $userid
        );

        // var_dump($data);
        // die;

        $update_data = $this->crud->update($table, $data, $where);

        //tulis log ke tabel aktivitas
        $this->insert_log('Melakukan edit user : ' . $userid . ' - Level : ' . $data['role_id']);


        if ($update_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function delete_data()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $userid = $this->input->post('userid');

        $hapus = $this->crud->delete($table, ['id' => $id]);

        if ($hapus) {

            $this->insert_log('Menghapus userID : ' . $userid);


            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function delete_data_barang()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');

        //cek dulu apakah kode agen masih ada di asset ?
        $where = array(
            'kode_barang' => $kode
        );
        $a = $this->crud->get_where('inventory', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'failed', 'message' => 'Error Delete Data, Barang masih tercatat di data Assets!'];
        } else {
            //hapus data
            $r = $this->crud->delete($table, ['kode_barang' => $kode]);

            $this->insert_log('Menghapus Kode Barang : ' . $kode . ' -Nama Barang : ' . $nama);

            if ($r > 0) {
                $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
            } else {
                $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];
            }
        }

        echo json_encode($response);
    }

    public function delete_data_suplier()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $suplier = $this->input->post('suplier');

        //cek dulu apakah kode agen masih ada di asset ?
        $where = array(
            'suplier' => $suplier
        );
        $a = $this->crud->get_where('inventory', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'failed', 'message' => 'Error Delete Data, Supplier masih tercatat di data Assets!'];
        } else {
            //hapus data
            $r = $this->crud->delete($table, ['kode_suplier' => $kode]);

            $this->insert_log('Menghapus Kode Suplier : ' . $kode . ' -Nama Suplier : ' . $suplier);

            if ($r > 0) {
                $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
            } else {
                $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];
            }
        }

        echo json_encode($response);
    }

    public function delete_data_satuan()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $deskripsi = $this->input->post('deskripsi');

        //cek dulu apakah kode agen masih ada di asset ?
        $where = array(
            'kode_satuan' => $kode
        );
        $a = $this->crud->get_where('sparepart', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'failed', 'message' => 'Error Delete Data, Kode Satuan masih tercatat di data Assets!'];
        } else {
            //hapus data
            $r = $this->crud->delete($table, ['kode_satuan' => $kode]);

            $this->insert_log('Menghapus Kode Satuan : ' . $kode . ' -Deskripsi : ' . $deskripsi);

            if ($r > 0) {
                $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
            } else {
                $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];
            }
        }

        echo json_encode($response);
    }

    public function delete_data_kategori()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');

        //cek dulu apakah kode agen masih ada di asset ?
        $where = array(
            'kategori' => $kategori
        );
        $a = $this->crud->get_where('assets', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'failed', 'message' => 'Error Delete Data, Kategori masih tercatat di data Assets!'];
        } else {
            //hapus data
            $r = $this->crud->delete($table, ['kategori' => $kategori]);

            $this->insert_log('Menghapus Kategori : ' . $kategori);

            if ($r > 0) {
                $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
            } else {
                $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];
            }
        }

        echo json_encode($response);
    }

    public function delete_data_lokasi()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $lokasi = $this->input->post('lokasi');

        //cek dulu apakah lokasi masih ada di inventory ?
        $where = array(
            'lokasi' => $lokasi
        );
        $a = $this->crud->get_where('inventory', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'failed', 'message' => 'Error Delete Data, Lokasi masih tercatat di data Inventory!'];
        } else {
            //hapus data
            $r = $this->crud->delete($table, ['id' => $id]);

            $this->insert_log('Menghapus Lokasi : ' . $lokasi);

            if ($r > 0) {
                $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
            } else {
                $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];
            }
        }

        echo json_encode($response);
    }

    public function delete_data_assets_notactive()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');

        $hapus = $this->crud->delete($table, ['id' => $id]);

        if ($hapus) {

            $this->insert_log('Menghapus Assets NOT ACTIVE - Kode Assets : ' . $kode);


            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function delete_data_assets()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $mac = $this->input->post('mac');

        $hapus = $this->crud->delete($table, ['id' => $id]);

        if ($hapus) {

            $this->insert_log('Menghapus Assets - Kode Assets : ' . $kode . ' - MAC Address : ' . $mac);


            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function delete_data_agen()
    {
        $table = $this->input->post('table');
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');

        //cek dulu apakah kode agen masih ada di asset ?
        $where = array(
            'kode_agen' => $kode
        );
        $a = $this->crud->get_where('assets', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'failed', 'message' => 'Error Delete Data, Kode Agen masih tercatat di data Assets!'];
        } else {
            //hapus data
            $r = $this->crud->delete($table, ['kode' => $kode]);

            $this->insert_log('Menghapus Kode Agen : ' . $kode . ' -Nama Agen : ' . $nama);

            if ($r > 0) {
                $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
            } else {
                $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];
            }
        }

        echo json_encode($response);
    }

    public function delete_data_part_request()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $keperluan = $this->input->post('keperluan');
        $jenis = $this->input->post('jenis');

        $hapus = $this->crud->delete($table, ['id' => $id]);

        if ($hapus) {

            $this->insert_log('Menghapus data part request - Kode Barang : ' . $kode_barang . ' -Nama Barang : ' . $nama_barang . ' -Keperluan : ' . $keperluan . ' -Kategori : ' . $jenis);


            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function delete_data_area()
    {
        $table = $this->input->post('table');
        $kode = $this->input->post('kode');
        $area = $this->input->post('area');

        //cek dulu apakah kode agen masih ada di asset ?
        $where = array(
            'kode_area' => $kode
        );
        $a = $this->crud->get_where('assets', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'failed', 'message' => 'Error Delete Data, Kode Area masih tercatat di data Assets!'];
        } else {
            //hapus data
            $r = $this->crud->delete($table, ['kode_area' => $kode]);

            $this->insert_log('Menghapus Kode Area : ' . $kode . ' -Area : ' . $area);

            if ($r > 0) {
                $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
            } else {
                $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];
            }
        }

        echo json_encode($response);
    }

    public function approve_request()
    {
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $keperluan = $this->input->post('keperluan');
        $jenis = $this->input->post('jenis');

        $table = $this->input->post('table');
        if ($this->crud->update($table, ['status_request' => 'APPROVED'], ['id' => $this->input->post('id')])) {

            $this->insert_log('Approve pengajuan part request - Kode Barang : ' . $kode_barang . ' -Nama Barang : ' . $nama_barang . ' -Keperluan : ' . $keperluan . ' -Kategori : ' . $jenis);

            $response = ['status' => 'success', 'message' => 'Success Approve Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Approve Data!'];

        echo json_encode($response);
    }

    public function reject_request()
    {
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $keperluan = $this->input->post('keperluan');
        $jenis = $this->input->post('jenis');
        $table = $this->input->post('table');
        if ($this->crud->update($table, ['status_request' => 'REJECTED'], ['id' => $this->input->post('id')])) {
            $this->insert_log('Reject pengajuan part request - Kode Barang : ' . $kode_barang . ' -Nama Barang : ' . $nama_barang . ' -Keperluan : ' . $keperluan . ' -Kategori : ' . $jenis);
            $response = ['status' => 'success', 'message' => 'Success Reject Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Reject Data!'];

        echo json_encode($response);
    }

    public function delete_data_po()
    {
        $table = $this->input->post('table');
        $this->crud->delete($table, ['po_no' => $this->input->post('po_number')]);

        if ($this->crud->delete('purchase_order_detil', ['po_no' => $this->input->post('po_number')])) {
            $this->insert_log('Menghapus PO Number : ' . $this->input->post('po_number'));

            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function reset_barang()
    {
        $table = $this->input->post('table');
        if ($this->crud->delete($table, ['po_no' => ''])) {
            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function ajax_table_suplier()
    {
        $table = 'suplier'; //nama tabel dari database
        $column_order = array('id', 'kode_suplier', 'suplier', 'alamat', 'contact_person', 'hp', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kode_suplier', 'suplier', 'alamat', 'contact_person', 'hp', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode_suplier, suplier, alamat, contact_person, hp, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_suplier'] = $key->kode_suplier;
            $row['data']['suplier'] = $key->suplier;
            $row['data']['alamat'] = $key->alamat;
            $row['data']['contact_person'] = $key->contact_person;
            $row['data']['hp'] = $key->hp;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_log()
    {
        $table = 'log_aktivitas'; //nama tabel dari database
        $column_order = array('id', 'userid', 'nama', 'aktivitas', 'ip_address', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'userid', 'nama', 'aktivitas', 'ip_address', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, userid, nama, aktivitas, ip_address, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['userid'] = $key->userid;
            $row['data']['nama'] = $key->nama;
            $row['data']['aktivitas'] = $key->aktivitas;
            $row['data']['ip_address'] = $key->ip_address;
            $row['data']['date_created'] = date('d-M-Y H:i:s', strtotime($key->date_created));

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_assets()
    {
        $table = 'assets'; //nama tabel dari database
        $column_order = array('id', 'kode_barang', 'nama_barang', 'pemilik', 'kode_agen', 'agen', 'kode_area', 'area', 'type_service', 'mac', 'tgl_order', 'teknisi', 'deskripsi', 'kode_assets', 'longitude', 'latitude', 'status_assets', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kode_barang', 'nama_barang', 'pemilik', 'kode_agen', 'agen', 'kode_area', 'area', 'type_service', 'mac', 'tgl_order', 'teknisi', 'deskripsi', 'kode_assets', 'longitude', 'latitude', 'status_assets', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode_barang, nama_barang, pemilik, kode_agen, agen, kode_area, area, type_service, mac, tgl_order,teknisi, deskripsi, kode_assets, longitude, latitude, status_assets, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['pemilik'] = $key->pemilik;
            $row['data']['kode_agen'] = $key->kode_agen;
            $row['data']['agen'] = $key->agen;
            $row['data']['kode_area'] = $key->kode_area;
            $row['data']['area'] = $key->area;
            $row['data']['type_service'] = $key->type_service;
            $row['data']['mac'] = $key->mac;
            $row['data']['tgl_order'] = date('d-M-Y', strtotime($key->tgl_order));
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['deskripsi'] = $key->deskripsi;
            $row['data']['kode_assets'] = $key->kode_assets;
            $row['data']['longitude'] = $key->longitude;
            $row['data']['latitude'] = $key->latitude;
            $row['data']['status_assets'] = $key->status_assets;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_assets_active()
    {
        $where = array(
            'status_assets' => 'ACTIVE'
        );
        $table = 'assets'; //nama tabel dari database
        $column_order = array('id', 'kode_barang', 'nama_barang', 'pemilik', 'kode_agen', 'agen', 'kode_area', 'area', 'type_service', 'mac', 'tgl_order', 'teknisi', 'deskripsi', 'kode_assets', 'longitude', 'latitude', 'status_assets', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kode_barang', 'nama_barang', 'pemilik', 'kode_agen', 'agen', 'kode_area', 'area', 'type_service', 'mac', 'tgl_order', 'teknisi', 'deskripsi', 'kode_assets', 'longitude', 'latitude', 'status_assets', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode_barang, nama_barang, pemilik, kode_agen, agen, kode_area, area, type_service, mac, tgl_order,teknisi, deskripsi, kode_assets, longitude, latitude, status_assets, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['pemilik'] = $key->pemilik;
            $row['data']['kode_agen'] = $key->kode_agen;
            $row['data']['agen'] = $key->agen;
            $row['data']['kode_area'] = $key->kode_area;
            $row['data']['area'] = $key->area;
            $row['data']['type_service'] = $key->type_service;
            $row['data']['mac'] = $key->mac;
            $row['data']['tgl_order'] = date('d-M-Y', strtotime($key->tgl_order));
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['deskripsi'] = $key->deskripsi;
            $row['data']['kode_assets'] = $key->kode_assets;
            $row['data']['longitude'] = $key->longitude;
            $row['data']['latitude'] = $key->latitude;
            $row['data']['status_assets'] = $key->status_assets;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_assets_nonactive()
    {
        $table = 'assets_nonactive'; //nama tabel dari database
        $column_order = array('id', 'kode_assets', 'kode_barang', 'nama_barang', 'mac', 'sn', 'kondisi', 'keterangan', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kode_assets', 'kode_barang', 'nama_barang', 'mac', 'sn', 'kondisi', 'keterangan', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode_assets, kode_barang, nama_barang, mac, sn, kondisi, keterangan, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_assets'] = $key->kode_assets;
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['mac'] = $key->mac;
            $row['data']['sn'] = $key->sn;
            $row['data']['kondisi'] = $key->kondisi;
            $row['data']['keterangan'] = $key->keterangan;
            $row['data']['date_created'] = date('d-M-Y', strtotime($key->date_created));

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_list_request()
    {
        if ($this->session->userdata('role_id') == 'surveyor' || $this->session->userdata('role_id') == 'teknisi') {
            $where = array(
                'level' => 'teknisi',
                'userid' => $this->session->userdata('userid')
            );
        } else {
            $where = null;
        }

        $table = 'part_request'; //nama tabel dari database
        $column_order = array('id', 'kode_barang', 'nama_barang', 'teknisi', 'jumlah', 'keperluan', 'jenis', 'status_request', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kode_barang', 'nama_barang', 'teknisi', 'jumlah', 'keperluan', 'jenis',  'status_request', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode_barang, nama_barang, teknisi, jumlah, keperluan, jenis, status_request, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['jumlah'] = $key->jumlah;
            $row['data']['keperluan'] = $key->keperluan;
            $row['data']['jenis'] = $key->jenis;
            $row['data']['status_request'] = $key->status_request;
            $row['data']['date_created'] = date("d F Y", strtotime($key->date_created));

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert_data_assets()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();

        //cek dulu apakah ada double sn dengan asset status active
        $where = array(
            'status_assets' => 'ACTIVE',
            'sn' => $data['sn']
        );

        $t = $this->crud->get_where($table, $where)->num_rows();



        if ($t > 0) {
            $response = ['status' => 'error', 'message' => 'Serial Number sudah terdaftar sebagai Assets ACTIVE!'];
            echo json_encode($response);
            die;
        }

        unset($data['table']);

        $q = $this->input->post('barang');
        $w = explode('*', $q);
        $kode_barang = $w[0];
        $nama_barang = $w[1];
        $data['kode_barang'] = $kode_barang;
        $data['nama_barang'] = $nama_barang;

        $e = $this->input->post('agen');
        $r = explode('*', $e);
        $kode_agen = $r[0];
        $nama_agen = $r[1];
        $data['kode_agen'] = $kode_agen;
        $data['agen'] = $nama_agen;

        $t = $this->input->post('area');
        $y = explode('*', $t);
        $kode_area = $y[0];
        $area = $y[1];
        $data['kode_area'] = $kode_area;
        $data['area'] = $area;


        unset($data['barang']);


        //buat nomor unik assets
        $nomor = $kode_area . '-' . $kode_agen . '-' . $data['sn'];
        $data['kode_assets'] = $nomor;

        $data['status_assets'] = 'ACTIVE';


        $insert_data = $this->crud->insert($table, $data);

        //tulis log
        $this->insert_log('Register Assets - Kode Asset : ' . $data['kode_assets'] . ' - Serial Number : ' . $data['sn'] . ' - MAC Address : ' . $data['mac']);



        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function update_data_assets()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        $kondisi = $data['kondisi'];
        $keterangan = $data['keterangan'];
        unset($data['table']);

        $where = array(
            'id' => $this->input->post('id')
        );

        $data = array(
            'status_assets' => 'NOT ACTIVE'
        );

        unset($data['id']);
        unset($data['kondisi']);
        unset($data['keterangan']);

        //masukan ke tabel asset non aktiv
        $getdata = $this->crud->get_where('assets', ['id' => $this->input->post('id')])->row_array();

        $data2 = array(
            'kode_assets' => $getdata['kode_assets'],
            'kode_barang' => $getdata['kode_barang'],
            'nama_barang' => $getdata['nama_barang'],
            'mac' => $getdata['mac'],
            'sn' => $getdata['sn'],
            'kondisi' => $kondisi,
            'keterangan' => $keterangan
        );

        $this->crud->insert('assets_nonactive', $data2);
        $this->crud->update($table, $data, $where);

        //tulis log
        $this->insert_log('Return Assets - Kode Assets : ' . $getdata['kode_assets'] . ' - Mac Address : ' . $getdata['mac'] . ' - Serial Number : ' . $getdata['sn']);


        if ($this->db->affected_rows() == TRUE) {
            $response = ['status' => 'success', 'message' => 'Berhasil Non Active Assets!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Non Active Assets!'];

        echo json_encode($response);
    }

    public function insert_data_list_request()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        $q = $this->input->post('barang');
        $w = explode('*', $q);
        $kode_barang = $w[0];
        $nama_barang = $w[1];
        $data['kode_barang'] = $kode_barang;
        $data['nama_barang'] = $nama_barang;

        unset($data['barang']);

        $data['status_request'] = 'OPEN';

        //buat level teknisi
        if ($this->session->userdata('role_id') == 'teknisi' || $this->session->userdata('role_id') == 'surveyor') {
            $data['level'] = 'teknisi';
        } else {
            $data['level'] = $this->session->userdata('role_id');
        }

        $jumlah = $data['jumlah'];
        $insert_data = $this->crud->insert($table, $data);

        ///tulis log
        $this->insert_log('Melakukan Part Request - Kategori : ' . $data['jenis'] . ' -Kode Barang : ' . $data['kode_barang'] . ' - Nama Barang : ' . $data['nama_barang'] . ' - Qty : ' . $jumlah);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function insert_data_suplier()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        //ambil data kode tearakhir suplier
        $a = $this->crud->get_all_limit('suplier')->row_array();
        if ($a > 0) {
            $b = explode("-", $a['kode_suplier']);
            $num = $b[1] + 1;
            $kode_sup = 'SUP-' . $num;

            $data['kode_suplier'] = $kode_sup;
        } else {
            $kode_sup = 'SUP-1';
            $data['kode_suplier'] = $kode_sup;
        }

        $insert_data = $this->crud->insert($table, $data);

        //tulis log
        $this->insert_log('Menambah Suplier - Kode Suplier : ' . $kode_sup . ' - Nama Suplier : ' . $data['suplier']);

        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }


    public function ajax_table_agen()
    {
        $table = 'agen'; //nama tabel dari database
        $column_order = array('id', 'kode', 'nama', 'no_identitas', 'alamat', 'handphone', 'layanan', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kode', 'nama', 'no_identitas', 'alamat', 'handphone', 'layanan', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode, nama, no_identitas, alamat, handphone, layanan, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            // $g = substr($key->kode, 4);
            // $y = 'SBN' . $g;
            $row['data']['kode'] = $key->kode;
            $row['data']['nama'] = $key->nama;
            $row['data']['no_identitas'] = $key->no_identitas;
            $row['data']['alamat'] = $key->alamat;
            $row['data']['handphone'] = $key->handphone;
            $row['data']['layanan'] = $key->layanan;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert_data_agen()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);
        //ambil data kode terakhir
        $a = $this->crud->get_all_limit('agen')->row_array();
        if ($a > 0) {
            $b = $a['kode'];
            $t = substr($b, 3); //100001
            $num = $t + 1;
            $kode = 'SBN' . $num;

            $data['kode'] = $kode;
        } else {
            $kode = 'SBN100001';
            $data['kode'] = $kode;
        }


        $insert_data = $this->crud->insert($table, $data);

        //tulis log
        $this->insert_log('Menambah Agen - Kode agen : ' . $kode . ' - Nama Agen : ' . $data['nama']);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function update_setting_gambar()
    {
        $table = $this->input->post("table");

        $config['upload_path']          = "assets/default/assets/images/";
        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size']             = 1024;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $data = $this->input->post();
        unset($data['table']);
        // unset($data['password']);

        if (count($_FILES) > 0) {
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();
            if ($data['jenis'] == 'logo_dark') {
                $data['logo_dark'] = $data_upload['file_name'];
            } else if ($data['jenis'] == 'latar') {
                $data['gambar_latar'] = $data_upload['file_name'];
            } else if ($data['jenis'] == 'logo_light') {
                $data['logo_light'] = $data_upload['file_name'];
            } else if ($data['jenis'] == 'favicon') {
                $data['favicon'] = $data_upload['file_name'];
            } else {
                $data['gambar_depan'] = $data_upload['file_name'];
            }
            unset($data['jenis']);
        }

        $update = $this->crud->update($table, $data, ['id' => '1']);

        if ($update > 0) {
            //tulis log
            $this->insert_log('Mengubah Gambar pada halaman setting aplikasi');

            $response = ['status' => 'success', 'message' => 'Berhasil Edit Data!', 'gambar' => $data_upload['file_name']];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Edit Data!'];

        echo json_encode($response);
    }

    public function insert_setting_detil()
    {

        $table = $this->input->post("table");
        $data = $this->input->post();

        unset($data['table']);


        $update_data = $this->crud->update($table, $data, ['id' => '1']);


        if ($update_data > 0) {
            //tulis log
            $this->insert_log('Update Informasi Perusahaan di halaman setting');

            $response = ['status' => 'success', 'message' => 'Berhasil Ubah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Ubah Data!'];

        echo json_encode($response);
    }

    public function generatedatapo()
    {
        $numrow = 10;
        $no = 1;
        $awal = $_GET['tanggal_awal'];
        $akhir = $_GET['tanggal_akhir'];

        $where = array(
            'purchase_order.date_created >=' => $awal,
            'purchase_order.date_created <=' => $akhir
        );
        $select = 'purchase_order.po_no, purchase_order.order_no, purchase_order.kode_suplier, purchase_order.suplier, purchase_order.alamat, purchase_order.hp, purchase_order.contact_person, purchase_order.delivery_date, purchase_order.term, purchase_order.remark, purchase_order.sub_total, purchase_order.ppn, purchase_order.total, purchase_order_detil.kode_barang, purchase_order_detil.nama_barang, purchase_order_detil.unit, purchase_order_detil.quantity, purchase_order_detil.unit_price, purchase_order_detil.amount';
        $table1 = 'purchase_order';
        $table2 = 'purchase_order_detil';
        $like = 'purchase_order.po_no=purchase_order_detil.po_no';


        $data = $this->crud->join_data($select, $table1, $table2, $like, $where)->result();

        $d = $this->crud->get_all('setting_apps')->row_array();

        $spreadsheet = new Spreadsheet();
        $excel = $spreadsheet->getActiveSheet();

        //styling
        $excel->getColumnDimension('A')->setWidth(5);
        $excel->getColumnDimension('B')->setWidth(20);
        $excel->getColumnDimension('C')->setWidth(15);
        $excel->getColumnDimension('D')->setWidth(15);
        $excel->getColumnDimension('E')->setWidth(30);
        $excel->getColumnDimension('F')->setWidth(40);
        $excel->getColumnDimension('G')->setWidth(20);
        $excel->getColumnDimension('H')->setWidth(20);
        $excel->getColumnDimension('I')->setWidth(20);
        $excel->getColumnDimension('J')->setWidth(20);
        $excel->getColumnDimension('K')->setWidth(40);
        $excel->getColumnDimension('L')->setWidth(10);
        $excel->getColumnDimension('M')->setWidth(10);
        $excel->getColumnDimension('N')->setWidth(15);
        $excel->getColumnDimension('O')->setWidth(15);
        $excel->getColumnDimension('P')->setWidth(15);
        $excel->getColumnDimension('Q')->setWidth(20);
        $excel->getColumnDimension('R')->setWidth(20);
        $excel->getColumnDimension('S')->setWidth(20);
        $excel->getColumnDimension('T')->setWidth(30);

        $excel->getRowDimension('9')->setRowHeight(15);

        $excel->getStyle('A1')->getFont()->setBold(true);
        $excel->getStyle('A5')->getFont()->setBold(true);
        $excel->getStyle('A9:T9')->getFont()->setBold(true);

        $excel->getStyle('A2:A3')->getFont()->setSize(9);
        $excel->getStyle('A9:T9')->getFont()->setSize(10);
        $excel->getStyle('A7')->getFont()->setSize(9);
        $excel->getStyle('A5')->getFont()->setSize(10);

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $excel->getStyle('A9:T9')->applyFromArray($styleArray);

        $excel->setCellValue('A1', strtoupper($d['nama_usaha']));
        $excel->setCellValue('A2', strtoupper($d['alamat']));
        $excel->setCellValue('A3', "HP " . $d['handphone']);
        $excel->setCellValue('A5', "LAPORAN PURCHASE ORDER");
        $excel->setCellValue('A7', "PERIODE : " . date('d-M-Y', strtotime($awal)) . " sd " . date('d-M-Y', strtotime($akhir)));
        $excel->setCellValue('A9', "NO");
        $excel->setCellValue('B9', "PO NUMBER");
        $excel->setCellValue('C9', "ORDER NUMBER");
        $excel->setCellValue('D9', "KODE SUPLIER");
        $excel->setCellValue('E9', "NAMA SUPLIER");
        $excel->setCellValue('F9', "ALAMAT");
        $excel->setCellValue('G9', "HP");
        $excel->setCellValue('H9', "CONTACT PERSON");
        $excel->setCellValue('I9', "DELIVERY DATE");
        $excel->setCellValue('J9', "KODE BARANG");
        $excel->setCellValue('K9', "NAMA BARANG");
        $excel->setCellValue('L9', "UNIT");
        $excel->setCellValue('M9', "JUMLAH");
        $excel->setCellValue('N9', "HARGA");
        $excel->setCellValue('O9', "AMOUNT");
        $excel->setCellValue('P9', "SUB TOTAL");
        $excel->setCellValue('Q9', "PPN");
        $excel->setCellValue('R9', "TOTAL");
        $excel->setCellValue('S9', "TERM");
        $excel->setCellValue('T9', "REMARK");

        foreach ($data as $key) {
            $excel->setCellValue('A' . $numrow, $no);
            $excel->setCellValue('B' . $numrow, $key->po_no);
            $excel->setCellValue('C' . $numrow, $key->order_no);
            $excel->setCellValue('D' . $numrow, $key->kode_suplier);
            $excel->setCellValue('E' . $numrow, $key->suplier);
            $excel->setCellValue('F' . $numrow, $key->alamat);
            $excel->setCellValue('G' . $numrow, $key->hp);
            $excel->setCellValue('H' . $numrow, $key->contact_person);
            $excel->setCellValue('I' . $numrow, $key->delivery_date);
            $excel->setCellValue('J' . $numrow, $key->kode_barang);
            $excel->setCellValue('K' . $numrow, $key->nama_barang);
            $excel->setCellValue('L' . $numrow, $key->unit);
            $excel->setCellValue('M' . $numrow, $key->quantity);
            $excel->setCellValue('N' . $numrow, $key->unit_price);
            $excel->setCellValue('O' . $numrow, $key->amount);
            $excel->setCellValue('P' . $numrow, $key->sub_total);
            $excel->setCellValue('Q' . $numrow, $key->ppn);
            $excel->setCellValue('R' . $numrow, $key->total);
            $excel->setCellValue('S' . $numrow, $key->term);
            $excel->setCellValue('T' . $numrow, $key->remark);
            //IMPLEMENTASI ARRAY CELL
            $excel->getStyle('A' . $numrow . ':T' . $numrow)->applyFromArray($styleArray);
            $excel->getStyle('A' . $numrow . ':T' . $numrow)->getFont()->setSize(10);

            $numrow++;
            $no++;
        }
        $file_name = 'laporan_purchase_order.xlsx';

        //format excel baru
        // $writer = new Xlsx($spreadsheet);
        // $writer->save($file_name);

        //format excel lama
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($file_name);
        //end format excel lama

        header('Content-Type: application/x-www-form-urlencoded');
        header('Content-Transfer-Encoding: Binary');
        header("Content-disposition: attachment; filename=\"" . $file_name . "\"");
        readfile($file_name);
        unlink($file_name);
        exit;
    }

    public function insert_data_lokasi()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        //cek dulu apakah lokasi sudah ada ?
        $lokasi = $data['lokasi'];
        $where = array(
            'lokasi' => $lokasi
        );
        $a = $this->crud->get_where('lokasi', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'error', 'message' => 'Lokasi sudah ada!'];
            echo json_encode($response);
            die;
        }

        $insert_data = $this->crud->insert($table, $data);
        //tulis log
        $this->insert_log('Menambah Lokasi : ' . $data['lokasi']);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function insert_data_area()
    {
        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        $data['kode_area'] = $data['prefix'] . $data['sequence'];

        //cek dulu apakah lokasi sudah ada ?
        $area = $data['area'];
        $where = array(
            'area' => $area
        );
        $a = $this->crud->get_where('area_assets', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'error', 'message' => 'Area sudah ada!'];
            echo json_encode($response);
            die;
        }
        //cek dulu apakah lokasi sudah ada ?
        $kode_area = $data['kode_area'];
        $where = array(
            'kode_area' => $kode_area
        );
        $a = $this->crud->get_where('area_assets', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'error', 'message' => 'Kode Area sudah ada, Silahkan ganti prefix!'];
            echo json_encode($response);
            die;
        }
        $data['sequence'] = $this->input->post('sequence');

        $insert_data = $this->crud->insert($table, $data);

        //tulis log
        $this->insert_log('Menambah Area Assets - Kode Area : ' . $kode_area . ' - Area : ' . $data['area']);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function insert_data_area1()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        $data['kode_area'] = $data['prefix'] . $data['seq'];

        //cek dulu apakah lokasi sudah ada ?
        $area = $data['area'];
        $where = array(
            'area' => $area
        );
        $a = $this->crud->get_where('area_assets', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'error', 'message' => 'Area sudah ada!'];
            echo json_encode($response);
            die;
        }
        //cek dulu apakah lokasi sudah ada ?
        $kode_area = $data['kode_area'];
        $where = array(
            'kode_area' => $kode_area
        );
        $a = $this->crud->get_where('area_assets', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'error', 'message' => 'Kode Area sudah ada, Silahkan ganti prefix!'];
            echo json_encode($response);
            die;
        }
        $seq = $data['seq'];

        unset($data['seq']);
        $insert_data = $this->crud->insert($table, $data);

        //cek data sequence
        $t = $this->crud->get_all('sequence_area')->row_array();
        if ($t['seq'] == 99) {
            $this->crud->update('sequence_area', ['seq' => 1], ['id' => 1]);
        } else {
            $this->crud->update('sequence_area', ['seq' => $seq], ['id' => 1]);
        }


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function getnumberarea()
    {
        $where = array(
            'prefix' => $this->input->post('prefix')
        );

        $c = $this->crud->get_where('area_assets', $where)->num_rows();

        if ($c > 0) {

            $b = $this->crud->get_all_limit_where('area_assets', $where)->row_array();

            if ($b['sequence'] == 99) {
                $ty = 1;
            } else {
                $ty = $b['sequence'] + 1;
            }
        } else {
            $ty = 1;
        }

        $result = $ty;

        echo json_encode($result);
    }

    public function ajax_table_lokasi()
    {
        $table = 'lokasi'; //nama tabel dari database
        $column_order = array('id', 'lokasi', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'lokasi', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, lokasi, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['lokasi'] = $key->lokasi;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_area()
    {
        $table = 'area_assets'; //nama tabel dari database
        $column_order = array('id', 'kode_area', 'area', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kode_area', 'area', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode_area, area, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_area'] = $key->kode_area;
            $row['data']['area'] = $key->area;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_satuan()
    {
        $table = 'satuan'; //nama tabel dari database
        $column_order = array('id', 'kode_satuan', 'deskripsi', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kode_satuan', 'deskripsi', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode_satuan, deskripsi, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_satuan'] = $key->kode_satuan;
            $row['data']['deskripsi'] = $key->deskripsi;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert_data_satuan()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        $insert_data = $this->crud->insert($table, $data);

        //tulis log
        $this->insert_log('Menambah satuan - Kode satuan : ' . $data['kode_satuan'] . ' - Deskripsi : ' . $data['deskripsi']);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }


    public function insert_data_kategori()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        //cek dulu apakah kategori sudah ada ?
        $kategori = $data['kategori'];
        $where = array(
            'kategori' => $kategori
        );
        $a = $this->crud->get_where('kategori', $where)->num_rows();

        if ($a > 0) {
            $response = ['status' => 'error', 'message' => 'Lokasi sudah ada!'];
            echo json_encode($response);
            die;
        }

        $insert_data = $this->crud->insert($table, $data);

        //tulis log
        $this->insert_log('Menambah Kategori - Nama Kategori : ' . $data['kategori']);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function ajax_table_kategori()
    {
        $table = 'kategori'; //nama tabel dari database
        $column_order = array('id', 'kategori', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kategori', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kategori, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kategori'] = $key->kategori;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }



    public function insert_data_sparepart()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        //ambil data untuk tentukan nomor part
        $r = $this->crud->get_all_limit('sparepart')->row_array();
        if ($r > 0) {
            $t = explode("-", $r['kode_barang']);
            $y = $t['1'] + 1;
            $data['kode_barang'] = 'PART-' . $y;
        } else {
            $data['kode_barang'] = 'PART-1';
        }
        //pisahkan data kategori
        $k = explode("-", $data['kategori']);
        unset($data['kategori']);
        $data['kategori'] = $k[1];

        $insert_data = $this->crud->insert($table, $data);

        //tulis log
        $this->insert_log('Menambah barang - Kode barang : ' . $data['kode_barang'] . ' - Nama barang : ' . $data['nama_barang']);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function insert_data_po()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        $ta = explode("*", $data['nama_barang']);
        unset($data['nama_barang']);

        $data['kode_barang'] = $ta[0];
        $data['nama_barang'] = $ta[1];
        $data['unit'] = $ta[2];

        $insert_data = $this->crud->insert($table, $data);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function ajax_table_sparepart()
    {
        $table = 'sparepart'; //nama tabel dari database
        $column_order = array('id', 'kode_barang', 'nama_barang', 'kode_satuan', 'kategori', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'kode_barang', 'nama_barang', 'kode_satuan', 'kategori', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode_barang, nama_barang, kode_satuan, kategori,kategori, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['kode_satuan'] = $key->kode_satuan;
            $row['data']['kategori'] = $key->kategori;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_transaksi_masuk()
    {
        $where = array(
            'keterangan' => 'MASUK'
        );

        $table = 'inventory'; //nama tabel dari database
        $column_order = array('id', 'nomor_transaksi', 'tanggal', 'kode_barang', 'nama_barang', 'suplier', 'invoice', 'jumlah', 'lokasi', 'keterangan', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'nomor_transaksi', 'tanggal', 'kode_barang', 'nama_barang', 'suplier', 'invoice', 'jumlah', 'lokasi', 'keterangan', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nomor_transaksi, tanggal, kode_barang,nama_barang, suplier, invoice, jumlah, lokasi, keterangan,date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nomor_transaksi'] = $key->nomor_transaksi;
            $row['data']['tanggal'] = date('d-M-Y', strtotime($key->tanggal));
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['suplier'] = $key->suplier;
            $row['data']['invoice'] = $key->invoice;
            $row['data']['jumlah'] = $key->jumlah;
            $row['data']['lokasi'] = $key->lokasi;
            $row['data']['keterangan'] = $key->keterangan;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert_data_masuk()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        //ambil data untuk tentukan nomor transaksi
        $r = $this->crud->get_all_limit('inventory')->row_array();
        if ($r > 0) {
            $t = explode("-", $r['nomor_transaksi']);
            $y = $t['1'] + 1;
            $data['nomor_transaksi'] = 'TR-' . $y;
        } else {
            $data['nomor_transaksi'] = 'TR-1';
        }

        //pisahkan data sparepart
        $k = explode("*", $data['sparepart']);
        unset($data['sparepart']);
        $data['kode_barang'] = $k[0];
        $data['nama_barang'] = $k[1];
        $data['nama_barang'] = $k[2];
        $data['keterangan'] = 'MASUK';



        //insert to tabel inventory_saldo
        $r = $this->crud->get_where('inventory_saldo', ['kode_barang' => $k[0]]);
        // var_dump($r);
        // die;

        if ($r) {
            // echo 'OK';
            $data2 = array(
                'kode_barang' => $data['kode_barang'],
                'nama_barang' => $data['nama_barang'],
                'kategori' => $k[2],
                'jumlah' => $data['jumlah']
            );
            $this->crud->insert('inventory_saldo', $data2);
        } else {
            // echo 'NOK';

            $data2 = array(
                'kode_barang' => $data['kode_barang'],
                'nama_barang' => $data['nama_barang'],
                'kategori' => $k[2],
                'jumlah' => $data['jumlah'] + $r['jumlah']
            );
            $this->crud->update('inventory_saldo', $data2, ['kode_barang' => $data['kode_barang']]);
        }

        //insert to tabel inventory_saldo_detil
        $where3 = array(
            'kode_barang' => $data['kode_barang'],
            'lokasi' => $data['lokasi']
        );
        $y = $this->crud->get_where('inventory_saldo_detil', $where3);

        // echo '<pre>';
        // echo $y;
        // echo '</pre>';
        // die;

        if ($y) {
            $data3 = array(
                'kode_barang' => $data['kode_barang'],
                'nama_barang' => $data['nama_barang'],
                'jumlah' => $data['jumlah'],
                'lokasi' => $data['lokasi']
            );
            $this->crud->insert('inventory_saldo_detil', $data3);
        } else {
            $data3 = array(
                'kode_barang' => $data['kode_barang'],
                'nama_barang' => $data['nama_barang'],
                'lokasi' => $data['lokasi'],
                'jumlah' => $data['jumlah'] + $y['jumlah']
            );
            $this->crud->update('inventory_saldo_detil', $data3, $where3);
        }

        //insert to tabel inventory
        $insert_data = $this->crud->insert($table, $data);

        //tulis log
        $this->insert_log('Transaksi Masuk, Kode Barang : ' . $data['kode_barang'] . ' - Nama Barang : ' . $data['nama_barang'] . ' -Qty : ' . $data['jumlah']);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function ajax_table_transaksi_keluar()
    {
        $where = array(
            'keterangan' => 'KELUAR'
        );

        $table = 'inventory'; //nama tabel dari database
        $column_order = array('id', 'nomor_transaksi', 'tanggal', 'kode_barang', 'nama_barang', 'suplier', 'invoice', 'jumlah', 'lokasi', 'keterangan', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'nomor_transaksi', 'tanggal', 'kode_barang', 'nama_barang', 'suplier', 'invoice', 'jumlah', 'lokasi', 'keterangan', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nomor_transaksi, tanggal, kode_barang,nama_barang, suplier, invoice, jumlah, lokasi, keterangan,date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nomor_transaksi'] = $key->nomor_transaksi;
            $row['data']['tanggal'] = date('d-M-Y', strtotime($key->tanggal));
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['suplier'] = $key->suplier;
            $row['data']['invoice'] = $key->invoice;
            $row['data']['jumlah'] = $key->jumlah;
            $row['data']['lokasi'] = $key->lokasi;
            $row['data']['keterangan'] = $key->keterangan;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert_data_keluar()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        //ambil data untuk tentukan nomor transaksi
        $r = $this->crud->get_all_limit('inventory')->row_array();
        if ($r > 0) {
            $t = explode("-", $r['nomor_transaksi']);
            $y = $t['1'] + 1;
            $data['nomor_transaksi'] = 'TR-' . $y;
        } else {
            $data['nomor_transaksi'] = 'TR-1';
        }
        //pisahkan data sparepart
        $k = explode("*", $data['sparepart']);
        unset($data['sparepart']);
        $data['suplier'] = $data['tujuan'];
        $data['kode_barang'] = $k[0];
        $data['nama_barang'] = $k[1];
        $data['keterangan'] = 'KELUAR';
        unset($data['tujuan']);

        //insert to tabel inventory_saldo
        $r = $this->crud->get_where('inventory_saldo', ['kode_barang' => $k[0]])->row_array();

        $data2 = array(
            'kode_barang' => $data['kode_barang'],
            'nama_barang' => $data['nama_barang'],
            'jumlah' => $r['jumlah'] - $data['jumlah']
        );
        $this->crud->update('inventory_saldo', $data2, ['kode_barang' => $data['kode_barang']]);


        //insert to tabel inventory_saldo_detil
        $where3 = array(
            'kode_barang' => $data['kode_barang'],
            'lokasi' => $data['lokasi']
        );
        $y = $this->crud->get_where('inventory_saldo_detil', $where3)->row_array();

        $data3 = array(
            'kode_barang' => $data['kode_barang'],
            'nama_barang' => $data['nama_barang'],
            'lokasi' => $data['lokasi'],
            'jumlah' =>  $y['jumlah'] - $data['jumlah']
        );
        $this->crud->update('inventory_saldo_detil', $data3, $where3);


        $insert_data = $this->crud->insert($table, $data);

        //tulis log
        $this->insert_log('Transaksi Keluar, Kode Barang : ' . $data['kode_barang'] . ' - Nama Barang : ' . $data['nama_barang'] . ' -Qty : ' . $data['jumlah']);

        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function ajax_table_transaksi_saldo()
    {

        $table = 'inventory_saldo'; //nama tabel dari database
        $column_order = array('id', 'kode_barang', 'nama_barang', 'kategori', 'jumlah'); //field yang ada di table user
        $column_search = array('id', 'kode_barang', 'nama_barang', 'kategori', 'jumlah'); //field yang diizin untuk pencarian 
        $select = 'id, kode_barang, nama_barang, kategori, jumlah';
        $order = array('id' => 'asc'); // default order 
        $list = $this->kategori->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['kategori'] = $key->kategori;
            $row['data']['jumlah'] = $key->jumlah;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kategori->count_all($table),
            "recordsFiltered" => $this->kategori->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_transaksi_saldo_detil()
    {
        $where = array(
            'kode_barang' => $this->input->post('kode_barang')
        );

        $table = 'inventory_saldo_detil'; //nama tabel dari database
        $column_order = array('id', 'kode_barang', 'nama_barang', 'jumlah', 'lokasi'); //field yang ada di table user
        $column_search = array('id', 'kode_barang', 'nama_barang', 'jumlah', 'lokasi'); //field yang diizin untuk pencarian 
        $select = 'id, kode_barang, nama_barang, jumlah, lokasi';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['jumlah'] = $key->jumlah;
            $row['data']['lokasi'] = $key->lokasi;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function getqty()
    {
        $kode = $this->input->post('sparepart');
        $f = explode("*", $kode);
        $jumlah = $this->input->post('jumlah');
        $lokasi = $this->input->post('lokasi');
        $where = array(
            'kode_barang' => $f[0],
            'lokasi' => $lokasi
        );
        $a = $this->crud->get_where('inventory_saldo_detil', $where)->row_array(); //jumlah


        if ($jumlah > $a['jumlah']) {
            $result = ['status' => 'error', 'message' => 'Jumlah tidak boleh melebihi stok yang tersedia!'];
        } else {
            $result = ['status' => 'success', 'message' => 'Berhasil Kurangi saldo sparepart!'];
        }


        echo json_encode($result);
    }

    public function generatedatasaldo()
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = date('d-M-Y H:i:s');

        $numrow = 10;
        $no = 1;

        $data = $this->crud->get_all('inventory_saldo_detil')->result();
        $d = $this->crud->get_all('setting_apps')->row_array();

        // echo $this->db->last_query();
        // die;
        $spreadsheet = new Spreadsheet();
        $excel = $spreadsheet->getActiveSheet();

        //styling
        $excel->getColumnDimension('A')->setWidth(5);
        $excel->getColumnDimension('B')->setWidth(20);
        $excel->getColumnDimension('C')->setWidth(30);
        $excel->getColumnDimension('D')->setWidth(20);
        $excel->getColumnDimension('E')->setWidth(20);

        $excel->getRowDimension('9')->setRowHeight(15);

        $excel->getStyle('A1')->getFont()->setBold(true);
        $excel->getStyle('A5')->getFont()->setBold(true);
        $excel->getStyle('A9:E9')->getFont()->setBold(true);

        $excel->getStyle('A2:A3')->getFont()->setSize(9);
        $excel->getStyle('A9:E9')->getFont()->setSize(10);
        $excel->getStyle('A7')->getFont()->setSize(9);
        $excel->getStyle('A5')->getFont()->setSize(10);

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $excel->getStyle('A9:E9')->applyFromArray($styleArray);

        $excel->setCellValue('A1', strtoupper($d['nama_usaha']));
        $excel->setCellValue('A2', strtoupper($d['alamat']));
        $excel->setCellValue('A3', "HP " . $d['handphone']);
        $excel->setCellValue('A5', "LAPORAN SALDO BERJALAN");
        $excel->setCellValue('A7', "GENERATE DATE : " . date('d-M-Y H:i:s', strtotime($today)));
        $excel->setCellValue('A9', "NO");
        $excel->setCellValue('B9', "KODE BARANG");
        $excel->setCellValue('C9', "NAMA BARANG");
        $excel->setCellValue('D9', "JUMLAH");
        $excel->setCellValue('E9', "LOKASI");

        foreach ($data as $key) {
            $excel->setCellValue('A' . $numrow, $no);
            $excel->setCellValue('B' . $numrow, $key->kode_barang);
            $excel->setCellValue('C' . $numrow, $key->nama_barang);
            $excel->setCellValue('D' . $numrow, $key->jumlah);
            $excel->setCellValue('E' . $numrow, $key->lokasi);
            //IMPLEMENTASI ARRAY CELL
            $excel->getStyle('A' . $numrow . ':E' . $numrow)->applyFromArray($styleArray);
            $excel->getStyle('A' . $numrow . ':E' . $numrow)->getFont()->setSize(10);

            $numrow++;
            $no++;
        }
        $file_name = 'laporan_saldo_berjalan.xlsx';

        //format excel baru
        // $writer = new Xlsx($spreadsheet);
        // $writer->save($file_name);

        //format excel lama
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($file_name);
        //end format excel lama

        header('Content-Type: application/x-www-form-urlencoded');
        header('Content-Transfer-Encoding: Binary');
        header("Content-disposition: attachment; filename=\"" . $file_name . "\"");
        readfile($file_name);
        unlink($file_name);
        exit;
    }

    public function ajax_table_po()
    {
        $table = 'purchase_order'; //nama tabel dari database
        $column_order = array('id', 'po_no', 'suplier', 'delivery_date', 'total', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'po_no', 'suplier', 'delivery_date', 'total', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, po_no, suplier, delivery_date, total, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['po_no'] = $key->po_no;
            $row['data']['suplier'] = $key->suplier;
            $row['data']['delivery_date'] = date('d-M-Y', strtotime($key->delivery_date));
            $row['data']['total'] = number_format($key->total);
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_po_list()
    {
        $where = array(
            'po_no' => $this->input->post('po_no')
        );
        $table = 'purchase_order_detil'; //nama tabel dari database
        $column_order = array('id', 'po_no', 'kode_barang', 'nama_barang', 'unit', 'quantity', 'unit_price', 'amount', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'po_no', 'kode_barang', 'nama_barang', 'unit', 'quantity', 'unit_price', 'amount', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, po_no, kode_barang, nama_barang, unit, quantity, unit_price, amount, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['po_no'] = $key->po_no;
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['unit'] = $key->unit;
            $row['data']['quantity'] = $key->quantity;
            $row['data']['unit_price'] = number_format($key->unit_price);
            $row['data']['amount'] = number_format($key->amount);
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_po_detil()
    {
        $where = array(
            'po_no' => ''
        );
        $table = 'purchase_order_detil'; //nama tabel dari database
        $column_order = array('id', 'po_no', 'nama_barang', 'kode_barang', 'unit', 'quantity', 'unit_price', 'amount', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'po_no', 'nama_barang', 'delivery_date', 'unit', 'quantity', 'unit_price', 'amount', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, po_no, nama_barang, kode_barang, unit, quantity, unit_price, amount, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['po_no'] = $key->po_no;
            $row['data']['kode_barang'] = $key->kode_barang;
            $row['data']['nama_barang'] = $key->nama_barang;
            $row['data']['unit'] = $key->unit;
            $row['data']['quantity'] = $key->quantity;
            $row['data']['unit_price'] = number_format($key->unit_price);
            $row['data']['amount'] = number_format($key->amount);
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function hitung_subtotal()
    {
        $result = $this->crud->sum_where('purchase_order_detil', ['po_no' => ''], 'amount')->result();
        echo json_encode($result);
    }

    public function generatepo()
    {
        $order_no = $this->input->post('order_no');
        //-------------------------------------------
        $b = $this->input->post('suplier');
        $a = explode('*', $b);
        $kode_suplier = $a[0];
        $suplier = $a[1];
        $alamat = $a[2];
        $hp = $a[3];
        $contact_person = $a[4];
        //-----------------------------------------
        $delivery_date = $this->input->post('delivery_date');
        $term = $this->input->post('term');
        $remark = $this->input->post('remark');
        $sub_total = $this->input->post('sub_total');
        $ppn = $this->input->post('ppn');
        $total = $this->input->post('total');

        //ambil nomor PO terakhir

        date_default_timezone_set('Asia/Jakarta');
        $bulan = date('m');
        $tahun = date('Y');

        if ($bulan == '1') {
            $bln = 'I';
        } else if ($bulan == '2') {
            $bln = 'II';
        } else if ($bulan == '3') {
            $bln = 'III';
        } else if ($bulan == '4') {
            $bln = 'IV';
        } else if ($bulan == '5') {
            $bln = 'V';
        } else if ($bulan == '6') {
            $bln = 'VI';
        } else if ($bulan == '7') {
            $bln = 'VII';
        } else if ($bulan == '8') {
            $bln = 'VIII';
        } else if ($bulan == '9') {
            $bln = 'IX';
        } else if ($bulan == '10') {
            $bln = 'X';
        } else if ($bulan == '11') {
            $bln = 'XI';
        } else if ($bulan == '12') {
            $bln = 'XII';
        }

        $v = $this->crud->get_all_limit('purchase_order')->row_array();
        if ($v > 0) {
            $po = explode('/', $v['po_no']);
            $seq = $po[0] + 1;
            $po_num = $seq . '/SBN/PO/' . $bln . '/' . $tahun;
        } else {
            $po_num = '1/SBN/PO/' . $bln . '/' . $tahun;
        }

        //insert ke tabel purchase_order
        $data = array(
            'po_no' => $po_num,
            'order_no' => $order_no,
            'kode_suplier' => $kode_suplier,
            'suplier' => $suplier,
            'alamat' => $alamat,
            'hp' => $hp,
            'contact_person' => $contact_person,
            'delivery_date' => $delivery_date,
            'term' => $term,
            'remark' => $remark,
            'sub_total' => $sub_total,
            'ppn' => $ppn,
            'total' => $total
        );

        $this->crud->insert('purchase_order', $data);

        $this->crud->update('purchase_order_detil', ['po_no' => $po_num], ['po_no' => '']);

        //tulis log
        $this->insert_log('Generate PO Number : ' . $po_num);

        if ($this->db->affected_rows() == TRUE) {
            $result = ['status' => 'success', 'message' => 'Berhasil membuat PO!'];
        } else {
            $result = ['status' => 'error', 'message' => 'Gagal membuat PO!'];
        }

        echo json_encode($result);
    }

    public function cek_assets()
    {
        $qr = $this->input->post('qr');
        $a = $this->crud->get_where_or('assets', $qr)->result_array();
        //tulis log
        $this->insert_log('Melakukan Assets Validasi Assets - Keyword : ' . $qr);


        echo json_encode($a);
    }

    public function getkategori()
    {
        $barang = $this->input->post('barang');
        $a = explode('*', $barang);
        $where = array(
            'kode_barang' => $a[0]
        );
        $b = $this->crud->get_where('sparepart', $where)->row_array();
        //tulis log

        echo json_encode($b['kategori']);
    }

    public function insert_log($aktivitas)
    {
        $data = array(
            'userid' => $this->session->userdata('userid'),
            'nama' => $this->session->userdata('name'),
            'aktivitas' => $aktivitas,
            'ip_address' => $this->get_client_ip()
        );

        $this->crud->insert('log_aktivitas', $data);

        return;
    }

    public function gettransaksimasuk()
    {
        $where = array(
            'keterangan' => 'MASUK'
        );

        $result = $this->crud->count_where('inventory', $where);

        echo json_encode($result);
    }

    public function gettransaksikeluar()
    {
        $where = array(
            'keterangan' => 'KELUAR'
        );

        $result = $this->crud->count_where('inventory', $where);

        echo json_encode($result);
    }

    public function gettotalassets()
    {

        $result = $this->crud->count_all('assets');

        echo json_encode($result);
    }

    public function getassetsactive()
    {
        $where = array(
            'status_assets' => 'ACTIVE'
        );

        $result = $this->crud->count_where('assets', $where);

        echo json_encode($result);
    }

    public function getassetsnotactive()
    {
        $where = array(
            'status_assets' => 'NOT ACTIVE'
        );

        $result = $this->crud->count_where('assets', $where);

        echo json_encode($result);
    }

    function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'IP tidak dikenali';
        return $ipaddress;
    }

    function edituser()
    {
        $where = array(
            'id' => $this->input->post('id')
        );
        $result = $this->crud->get_where('user', $where)->result();

        echo json_encode($result);
    }
}
