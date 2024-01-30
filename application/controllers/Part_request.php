<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Part_request extends CI_Controller
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

    public function ajax_data_part_request()
    {
        $data = $this->crud->get_all_limit_jml('part_request', '10')->result_array();
        echo json_encode($data);
    }

    public function delete_part_req()
    {
        $id = $this->input->post('id');
        $delete_data = $this->crud->delete("part_request", ['id' => $id]);

        if ($delete_data) $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        else $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }
}
