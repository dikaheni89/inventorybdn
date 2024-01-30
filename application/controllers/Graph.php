<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Graph extends CI_Controller
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
        $data = $this->db->select("kategori, count(kategori) jumlah")
        ->from("assets")
        ->group_by("kategori")
        ->get()->result_array();

        echo json_encode($data);
    }

    public function ajax_data_asset_active()
    {
        $data = $this->db->select("status_assets kategori, count(status_assets) jumlah")
        ->from("assets")
        ->group_by("status_assets")
        ->get()->result_array();

        echo json_encode($data);
    }
}
