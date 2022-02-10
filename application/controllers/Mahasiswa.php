<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
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

    public function aksi_buku_wisuda(){
        $this->_rules();
        if($this->form_validation->run() == false){
            $this->daftar_buku_wisuda();
        }else{
        $npm = $this->input->post('npm');
        $nama = $this->input->post('nama');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $prodi = $this->input->post('prodi');
        $pembimbing_1 = $this->input->post('pembimbing_1');
        $pembimbing_2 = $this->input->post('pembimbing_2');
        $judul_karya_ilmiah = $this->input->post('judul_karya_ilmiah');
        $link_jurnal = $this->input->post('link_jurnal');
        $pkl_atau_bekerja = $this->input->post('pkl_atau_bekerja');
        $alamat = $this->input->post('alamat');
    
        $file_name = str_replace('.','',$npm);
        $config['file_name'] = $file_name;
        $config['upload_path'] = './assets/dist/img/foto/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 2048;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if(!$this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', '<div class="text-danger small ml-3">'.$error['error'].'</div>' );
            redirect('mahasiswa/daftar_buku_wisuda','refresh');
        }else{
            $foto = $this->upload->data('file_name');
        }

        $data = array(
            'npm' => $npm,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'prodi' => $prodi,
            'pembimbing_1' => $pembimbing_1,
            'pembimbing_2' => $pembimbing_2,
            'judul_karya_ilmiah' => $judul_karya_ilmiah,
            'link_jurnal' => $link_jurnal,
            'pkl_atau_bekerja' => $pkl_atau_bekerja,
            'alamat' => $alamat,
            'foto' => $foto,
        );
        $this->M_bukuwisuda->input_data($data);
        redirect('mahasiswa/daftar_buku_wisuda');
        }
    }

    public function _rules(){
          $this->form_validation->set_rules(
            'npm',
            'Npm',
            'required',
            ['required' => 'NPM tidak boleh kosong!']
          );
          $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            ['required' => 'Nama tidak boleh kosong!']
          );
          $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required',
            ['required' => 'Tempat Lahir tidak boleh kosong!']
          );
          $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required',
            ['required' => 'Tanggal Lahir tidak boleh kosong!']
          );
          $this->form_validation->set_rules(
            'pembimbing_1',
            'Pembimbing I',
            'required',
            ['required' => 'Pembimbing I tidak boleh kosong!']
          );
          $this->form_validation->set_rules(
            'judul_karya_ilmiah',
            'Judul Karya Ilmiah',
            'required',
            ['required' => 'Judul Karya Ilmiah tidak boleh kosong!']
          );
          $this->form_validation->set_rules(
            'link_jurnal',
            'Link Jurnal',
            'required',
            ['required' => 'Link Jurnal tidak boleh kosong!']
          );
          $this->form_validation->set_rules(
            'pkl_atau_bekerja',
            'PKL atau Bekerja',
            'required',
            ['required' => 'PKL/Bekerja tidak boleh kosong!']
          );
          $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            ['required' => 'Alamat tidak boleh kosong!']
          );
    }

}