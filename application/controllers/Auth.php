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

    public function aksi_login(){
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
        $username = $this->input->post('npm');
        $password = $this->input->post('password');
        $cek_user = $this->db->get_where('users2', array('username' => $username))->row_array();

        if($cek_user){
          if(password_verify($password, $cek_user['password'])){
            if($cek_user['role_id'] == 1){
              $data_session = [
                'username' => $cek_user['username'],
                'role_id' => $cek_user['role_id'],
              ];
              $this->session->set_userdata($data_session);
              redirect('admin');
            }else{
              if($cek_user['email']){
                $cek_mhs = $this->db->get_where('mahasiswas', array('npm' => $username))->row_array();
                $data_session = [
                  'username' => $cek_user['username'],
                  'nama' => $cek_mhs['nama'],
                  'kelas' => $cek_mhs['kelas'],
                  'role_id' => $cek_user['role_id'],
                ];
                $this->session->set_userdata($data_session);
                redirect('mahasiswa');  
              }else{
                $this->session->set_flashdata(
                  'message',
                  '<div class="alert alert-danger" role="alert">
                Silahkan Daftar Baru. 
                </div>'
                );
                redirect('auth');
              }
            }
          }else{
            $this->session->set_flashdata(
              'message',
              '<div class="alert alert-danger" role="alert">
            Password salah. 
            </div>'
            );
            redirect('auth');
          }
        }else{
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
          NPM tidak terdaftar. Silahkan Daftar Baru! 
          </div>'
          );
          redirect('auth');
        }
      }

    }
    // public function aksi_login() {
    //   $this->form_validation->set_rules(
    //     'npm',
    //     'Npm',
    //     'required',
    //     ['required' => '*NPM Wajib di isi!']
    //   );
    //   $this->form_validation->set_rules(
    //     'password',
    //     'Password',
    //     'required',
    //     ['required' => '*Password Wajib di isi!']
    //   );

    //   if($this->form_validation->run() == false){
    //     $data['title'] = "Masuk";
    //     $this->load->view('auth/header', $data);
    //     $this->load->view('auth/login', $data);
    //     $this->load->view('auth/footer');
    //   }else{
    //     $npm = $this->input->post('npm');
    //     $password = $this->input->post('password');
  
    //     $where = array(
    //       'NPM' => $npm,
    //       'Pass' => $password
    //       );
  
    //       $cek_mhs = $this->db->get_where("mahasiswas", $where)->row_array();
  
    //       if($cek_mhs){
          
    //         $data_session = array(
    //           'npm' => $npm,
    //           'nama' => $cek_mhs['nama'],
    //           'kelas' => $cek_mhs['kelas'],
    //           'status' => "Mahasiswa"
    //           );
          
    //         $this->session->set_userdata($data_session);
    //         redirect('mahasiswa');
    
    //       }else{
    //         $this->session->set_flashdata(
    //         'message',
    //         '<div class="alert alert-danger" role="alert">
    //         Password salah. 
    //         </div>'
    //         );
    
    //         redirect('auth');
    //       }

    //   }   
    //   }

  public function register()
  {
    $data['title'] = "Daftar";
    $this->load->view('auth/header', $data);
    $this->load->view('auth/register', $data);
    $this->load->view('auth/footer');
  }

  public function aksi_register(){
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required',
      ['required' => '*Email Wajib di isi!']
    );
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
      $email = $this->input->post('email');
      $username = $this->input->post('npm');
      $password = $this->input->post('password');
      $password2 = $this->input->post('password2');
  
      $cek_mhs = $this->db->get_where("mahasiswas", array('npm' => $username  ))->num_rows();
      $cek_user = $this->db->get_where("users2", array('username' => $username  ))->num_rows();
      if($cek_mhs > 0){
        if($password === $password2){
          if($cek_user > 0){
            $data = array(
              'email' => $email,
              'username' => htmlspecialchars($username),
              'password' => password_hash($password, PASSWORD_DEFAULT),
              'created_at' => time(),
              
            );
            $this->db->where('username', $username);
            $this->db->update('users2', $data);
            $this->session->set_flashdata(
              'message',
              '<div class="alert alert-success" role="alert">
              Registrasi berhasil. 
              </div>'
              );
      
            redirect('auth');
  
          }
          $data = array(
            'email' => $email,
            'username' => htmlspecialchars($username),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => time(),
            
          );
			    $this->db->insert('users2', $data);
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

  public function lupa_password(){
    $data['title'] = "Lupa Password";
    $this->load->view('auth/header', $data);
    $this->load->view('auth/lupa_password', $data);
    $this->load->view('auth/footer');
  }

  public function aksi_lupa_password(){
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required',
      ['required' => '*Email Wajib di isi!']
    );
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
      $this->load->view('auth/lupa_password', $data);
      $this->load->view('auth/footer');
    }else{
      $email = $this->input->post('email');
      $username = $this->input->post('npm');
      $password = $this->input->post('password');
      $password2 = $this->input->post('password2');
      $cek_user = $this->db->get_where("users2", array('email' => $email))->row_array();
      if($cek_user){
        if($cek_user['username'] == $username){
          if($password === $password2){
            $data = array(
              'email' => $email,
              'username' => htmlspecialchars($username),
              'password' => password_hash($password, PASSWORD_DEFAULT),
              'created_at' => time(),
            );
            $this->db->where('username', $username);
            $this->db->update('users2', $data);
            $this->session->set_flashdata(
              'message',
              '<div class="alert alert-success" role="alert">
              Ganti Password berhasil. 
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
  
            redirect('auth/lupa_password');
          }
        }else{
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
            NPM Salah. 
            </div>'
            );
  
            redirect('auth/lupa_password');          
        }
      }else{
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger" role="alert">
          Email tidak terdaftar. 
          </div>'
          );

          redirect('auth/lupa_password');
      }
    }
  }

  public function logout(){
    session_destroy();
    $this->session->sess_destroy();
    redirect('auth');
  }
}