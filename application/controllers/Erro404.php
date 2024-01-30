<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erro404 extends CI_Controller
{
    public function index()
    {
        $this->load->model("Crud", "crud");
        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['title'] = $d['nama_usaha'] . ' | 404';
        $data['favicon'] = $d['favicon'];

        $this->load->view('e404', $data);
    }
}
