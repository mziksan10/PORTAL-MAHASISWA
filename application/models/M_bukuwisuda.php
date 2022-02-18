<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bukuwisuda extends CI_Model
{
    function ambil_data_prodi(){
        return $this->db->get('prodis');
    }

    function ambil_data_dosen(){
        return $this->db->get('dosens');
    }

    function ambil_data_alumni($npm){
        return $this->db->query("SELECT * FROM alumnis WHERE npm = '$npm'")->row();
    }

    function input_data($data){
            $this->db->insert('alumnis', $data);
    }
}