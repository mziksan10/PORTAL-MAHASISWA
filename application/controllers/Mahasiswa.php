<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!isset($this->session->userdata['status'])){
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
            'npm' => $this->session->userdata('npm'),
            'nama' => $this->session->userdata('nama'),
            'status' => $this->session->userdata('status'),
        ];
        
        $data['title'] = "Beranda";
        $this->load->view('mahasiswa/header.php', $data);
        $this->load->view('mahasiswa/index.php', $data);
        $this->load->view('mahasiswa/footer.php');
    }

    public function data_diri(){
        $data = $this->M_mahasiswa->ambil_data_mhs($this->session->userdata['npm']);
        $data = array(
            'npm' => $data->npm,
            'jurusan' => $data->nama_jurusan,
            'kelas' => $data->kelas,
            'semester' => $data->semester,
            'nama' => $data->nama,
            'tempat_lahir' => $data->tempatlahir,
            'tanggal_lahir' => $data->tanggallahir,
            'kelamin' => $data->kelamin,
            'agama' => $data->agama,
            'alamat' => $data->alamat1,
            'no_hp' => $data->hp,
        );

        $data['title'] = "Data diri";
        $this->load->view('mahasiswa/header.php', $data);
        $this->load->view('mahasiswa/data_diri.php', $data);
        $this->load->view('mahasiswa/footer.php');
    }

    public function informasi_dan_layanan(){
        $data = $this->M_mahasiswa->ambil_data_mhs($this->session->userdata['npm']);
        $data = array(
            'npm' => $data->npm,
            'nama' => $data->nama,
        ); 


        $data['kontak'] = $this->M_kontak->ambil_data_kontak();
        
        $data['title'] = "Informasi & Layanan";
        $this->load->view('mahasiswa/header.php', $data);
        $this->load->view('mahasiswa/informasi_dan_layanan.php', $data);
        $this->load->view('mahasiswa/footer.php');
    }

    public function kontak(){

        $data = array(
            'npm' =>  $this->session->userdata('npm'),
            'nama' =>  $this->session->userdata('nama'),
            'kelas' =>  $this->session->userdata('kelas'),
        ); 
        
        $data['title'] = "Kontak";
        $this->load->view('mahasiswa/header.php', $data);
        $this->load->view('mahasiswa/kontak.php', $data);
        $this->load->view('mahasiswa/footer.php');
    }

    public function khs(){
        $npm = $this->session->userdata('npm');
        $data = $this->M_mahasiswa->ambil_data_mhs($this->session->userdata['npm']);
        $data = array(
            'npm' => $data->npm,
            'nama' => $data->nama,
        );

        $data['nilai'] = $this->M_mahasiswa->ambil_data_nilai($npm);
        $data['smt'] = $this->M_mahasiswa->ambil_data_semester($npm);

        $data['title'] = "Kartu Hasil Studi";
        $this->load->view('mahasiswa/header.php', $data);
        $this->load->view('mahasiswa/khs.php', $data);
        $this->load->view('mahasiswa/footer.php');
        
    }

    public function cetak_khs($smt){
        $this->load->library('dompdf_gen');

        $npm = $this->session->userdata('npm');
        $data = array(
            'npm' =>  $npm,
            'nama' =>  $this->session->userdata('nama'),
            'kelas' =>  $this->session->userdata('kelas'),
            'smt' => $smt,
    );
        $data['khs'] = $this->M_mahasiswa->ambil_data_cetak_khs($npm, $smt);
        $this->load->view('mahasiswa/cetak_khs', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('cetak_khs.pdf', array('Attachment' => 0 ));
    }
    
    public function daftar_buku_wisuda(){
        $data = $this->M_mahasiswa->ambil_data_mhs($this->session->userdata['npm']);
        $data = array(
            'npm' => $data->npm,
            'jurusan' => $data->nama_jurusan,
            'kelas' => $data->kelas,
            'semester' => $data->semester,
            'nama' => $data->nama,
            'tempat_lahir' => $data->tempatlahir,
            'tanggal_lahir' => $data->tanggallahir,
            'kelamin' => $data->kelamin,
            'agama' => $data->agama,
            'alamat' => $data->alamat1,
            'no_hp' => $data->hp,
        );

        $npm = $this->session->userdata('npm');
        $data['alumni'] = $this->M_bukuwisuda->ambil_data_alumni($npm);
        $data['prodi'] = $this->M_bukuwisuda->ambil_data_prodi();

        $data['title'] = "Daftar Buku Wisuda";
        $this->load->view('mahasiswa/header.php', $data);
        $this->load->view('mahasiswa/daftar_wisuda.php', $data);
        $this->load->view('mahasiswa/footer.php'); 
    }

}