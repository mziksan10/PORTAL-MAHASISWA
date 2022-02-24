<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
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
            'role_id' => $this->session->userdata('role_id'),
        ];
        
        $data['title'] = "Dashboard";
        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/index.php', $data);
        $this->load->view('admin/footer.php');
    }

    public function pendaftar_buku_wisuda(){
        $data = $this->session->userdata();

        // Ambil data keyword
        if($this->input->post('submit')){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        }else{
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // Config
        $this->db->like('npm', $data['keyword']);
        $this->db->or_like('nama', $data['keyword']);
        $this->db->from('alumnis');
        $this->db->order_by('status', 'asc');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 2;


        // Initialize
        $this->pagination->initialize($config);
        
        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $this->uri->segment(3);
        $data['pendaftar'] = $this->M_bukuwisuda->ambil_data_pendaftar($config['per_page'],$data['start'], $data['keyword']);

        $data['title'] = "Pendaftar Buku Wisuda";
        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/pendaftar_buku_wisuda.php', $data);
        $this->load->view('admin/footer.php');    
    }

    public function export_buku_wisuda(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NPM');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Tempat Lahir');
        $sheet->setCellValue('E1', 'Tanggal Lahir');
        $sheet->setCellValue('F1', 'Program Studi');
        $sheet->setCellValue('G1', 'Pembimbing I');
        $sheet->setCellValue('H1', 'Pembimbing II');
        $sheet->setCellValue('I1', 'Judul Karya Ilmiah');
        $sheet->setCellValue('J1', 'PKL/Bekerja');
        $sheet->setCellValue('K1', 'Alamat');
        $sheet->setCellValue('L1', 'Link Jurnal');
        $sheet->setCellValue('M1', 'Tanggal Daftar');
        
        $pendaftar = $this->M_bukuwisuda->export_data_pendaftar();
        $no = 1;
        $x = 2;
        foreach($pendaftar as $row)
        {
            $sheet->setCellValue('A'.$x, $no++);
            $sheet->setCellValue('B'.$x, $row->npm);
            $sheet->setCellValue('C'.$x, $row->nama);
            $sheet->setCellValue('D'.$x, $row->tempat_lahir);
            $sheet->setCellValue('E'.$x, $row->tanggal_lahir);
            $sheet->setCellValue('F'.$x, $row->prodi);
            $sheet->setCellValue('G'.$x, $row->pembimbing_1);
            $sheet->setCellValue('H'.$x, $row->pembimbing_2);
            $sheet->setCellValue('I'.$x, $row->judul_karya_ilmiah);
            $sheet->setCellValue('J'.$x, $row->pkl_atau_bekerja);
            $sheet->setCellValue('K'.$x, $row->alamat);
            $sheet->setCellValue('L'.$x, $row->link_jurnal);
            $sheet->setCellValue('M'.$x, $row->tanggal_daftar);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-pendaftar-bukuwisuda';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}