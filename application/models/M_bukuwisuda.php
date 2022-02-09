<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bukuwisuda extends CI_Model
{
    function ambil_data_prodi(){
        return $this->db->get('prodis');
    }

    function ambil_data_dosen($query){
        $this->db->like('nama_lengkap', $query , 'both');
        $this->db->order_by('nama_lengkap'. 'ASC');
        $this->db->limit(5);
        return $this->db->get('dosens')->result();
    }

    function ambil_data_alumni($npm){
        return $this->db->query("SELECT * FROM alumnis WHERE npm = '$npm'")->row();
    }
}