<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lacak extends CI_Controller
{
    public function index()
    {
        $this->load->model("Crud", "crud");
        $id = $this->input->post('id_pesanan');

        $a = $this->crud->get_where('pekerjaan', ['id' => $id])->row_array();

        $data['customer'] = $a['customer'];
        $data['id'] = $a['id'];
        $data['alamat'] = $a['alamat'];
        $data['pekerjaan'] = $a['pekerjaan'];
        $data['tgl_masuk'] = $a['tgl_masuk'];
        if ($a['tgl_keluar_actual'] == '0000-00-00 00:00:00') {
            $data['tgl_keluar_actual'] = '<span class="badge bg-warning">Masih Proses</span>';
        } else {
            $data['tgl_keluar_actual'] = '<span class="badge bg-success">Selesai</span>';
        }

        // echo $this->db->last_query();
        // die;
        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['title'] = $d['nama_usaha'] . ' | Lacak Laundry';
        $data['favicon'] = $d['favicon'];

        $this->load->view('lacak', $data);
    }
}
