<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model("Crud", "crud");
    //     $d = $this->crud->get_all('setting_apps')->row_array();
    //     $data['title'] = $d['nama_usaha'] . '| Dashboard';
    // }

    public function index()
    {

        $this->form_validation->set_rules('userid', 'Userid', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->model("Crud", "crud");
            $d = $this->crud->get_all('setting_apps')->row_array();
            $data['title'] = $d['nama_usaha'] . ' | Login';
            $data['slogan'] = $d['slogan'];
            $data['logo_light'] = $d['logo_light'];
            $data['favicon'] = $d['favicon'];
            $data['nama_usaha'] = $d['nama_usaha'];
            $data['gambar_depan'] = $d['gambar_depan'];

            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $userid = $this->input->post('userid');
        $password = $this->input->post('password');



        //ambil data dari model
        $table = 'user';
        $where = array(
            'userid' => $userid,
        );
        $user = $this->Crud->get_where($table, $where)->row_array();

        if ($user) {
            //cek dulu member aktive atau tidak
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    //jika sukses
                    $data = array(
                        'userid' => $user['userid'],
                        'role_id' => $user['role_id'],
                        'name' => $user['name'],
                        'photo' => $user['photo']
                    );
                    //buat session
                    $this->session->set_userdata($data);
                    //tulis data ke log
                    $ip = $this->get_client_ip();

                    $data = array(
                        'userid' => $user['userid'],
                        'nama' => $user['name'],
                        'aktivitas' => 'Login ke sistem',
                        'ip_address' => $ip
                    );
                    $this->Crud->insert('log_aktivitas', $data);
                    // redirect('dashboard');
                    if ($user['role_id'] == 'administrator' || $user['role_id'] == 'gudang') {
                        redirect('dashboard/info');
                    } else if ($user['role_id'] == 'teknisi' || $user['role_id'] == 'surveyor') {
                        redirect('dashboard/info');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Salah Password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Userid belum diaktifkan</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Userid belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        //tulis data ke log
        $data = array(
            'userid' => $this->session->userdata('userid'),
            'nama' => $this->session->userdata('name'),
            'aktivitas' => 'Keluar dari sistem',
            'ip_address' => $this->get_client_ip()
        );
        $this->Crud->insert('log_aktivitas', $data);

        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('photo');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda sudah keluar.</div>');
        redirect('auth');
    }

    public function get_client_ip()
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
}
