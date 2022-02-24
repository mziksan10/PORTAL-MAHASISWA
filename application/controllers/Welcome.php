<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();
        if(!isset($this->session->userdata['role_id'])){
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                Anda belum login. 
                </div>'
            );
            redirect('auth');
        }
    }

    public function index(){
        $data = [
            'username' => $this->session->userdata('username'),
            'nama' => $this->session->userdata('nama'),
            'role_id' => $this->session->userdata('role_id'),
        ];
        
        $data['title'] = "Beranda";
        $this->load->view('mahasiswa/header.php', $data);
        $this->load->view('mahasiswa/index.php', $data);
        $this->load->view('mahasiswa/footer.php');
    }
}
