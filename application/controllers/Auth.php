<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
      $data['title'] = "Masuk";
      $this->load->view('auth/header', $data);
      $this->load->view('auth/login', $data);
      $this->load->view('auth/footer');
    }

    public function aksi_login() {
      $this->form_validation->set_rules(
        'npm',
        'Npm',
        'required',
        ['required' => '*NPM Wajib di isi!']
      );
      $this->form_validation->set_rules(
        'password',
        'Password',
        'required',
        ['required' => '*Password Wajib di isi!']
      );

      if($this->form_validation->run() == false){
        $data['title'] = "Masuk";
        $this->load->view('auth/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('auth/footer');
      }else{
        $npm = $this->input->post('npm');
        $password = $this->input->post('password');
  
        $where = array(
          'NPM' => $npm,
          'Pass' => $password
          );
  
          $cek_mhs = $this->db->get_where("mahasiswas", $where)->row_array();
  
          if($cek_mhs){
          
            $data_session = array(
              'npm' => $npm,
              'nama' => $cek_mhs['nama'],
              'kelas' => $cek_mhs['kelas'],
              'status' => "Mahasiswa"
              );
          
            $this->session->set_userdata($data_session);
            redirect('mahasiswa');
    
          }else{
            $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
            Password salah. 
            </div>'
            );
    
            redirect('auth');
          }

      }   
      }

  public function register()
  {
    $data['title'] = "Daftar";
    $this->load->view('auth/header', $data);
    $this->load->view('auth/register', $data);
    $this->load->view('auth/footer');
  }

  public function aksi_register(){
    $this->form_validation->set_rules(
      'npm',
      'Npm',
      'required',
      ['required' => '*NPM Wajib di isi!']
    );
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required',
      ['required' => '*Password Wajib di isi!']
    );
    $this->form_validation->set_rules(
      'password2',
      'Password2',
      'required',
      ['required' => '*Konfirmasi Password Wajib di isi!']
    );

    if($this->form_validation->run() == false){
      $data['title'] = "Daftar";
      $this->load->view('auth/header', $data);
      $this->load->view('auth/register', $data);
      $this->load->view('auth/footer');
    }else{
      $npm = $this->input->post('npm');
      $password = $this->input->post('password');
      $password2 = $this->input->post('password2');
  
      $cek_mhs = $this->db->get_where("mahasiswas", array('npm' => $npm))->num_rows();
      if($cek_mhs > 0){
        if($password === $password2){
          $data = array(
            'pass' => $password,
          );
          $this->db->where('npm', $npm);
          $this->db->update('mahasiswas', $data);
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
            Registrasi berhasil. 
            </div>'
            );
    
          redirect('auth');
          
        }else{
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
            Konfirmasi password salah. 
            </div>'
            );
    
            redirect('auth/register');
        }
      }else{
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger" role="alert">
          NPM tidak terdaftar . 
          </div>'
          );
  
          redirect('auth/register');
      }
    }
  }

  public function logout(){
    session_destroy();
    $this->session->sess_destroy();
    redirect('auth');
  }
}