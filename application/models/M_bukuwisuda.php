<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bukuwisuda extends CI_Model
{
    function ambil_data_pendaftar($limit, $start, $keyword = null){
        if($keyword){
            $this->db->like('npm', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->order_by('status', 'asc');
        }
        $this->db->order_by('status', 'asc');
        return $this->db->get('alumnis', $limit, $start)->result();
    }

    function update_status_pendaftar($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus_pendaftar($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function export_data_pendaftar(){
        return $this->db->get('alumnis')->result();
    }

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