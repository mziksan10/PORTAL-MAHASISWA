<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
    
    function ambil_data_mhs($npm){
        return $this->db->query("SELECT mahasiswas.npm, mahasiswas.kelas, mahasiswas.nama, mahasiswas.tempatlahir, mahasiswas.tanggallahir, mahasiswas.kelamin, mahasiswas.agama, mahasiswas.alamat1, mahasiswas.hp, MAX(nilai09.smt) AS semester, IF(MID(mahasiswas.npm,3,3) = '301', 'AKE', IF(MID(mahasiswas.npm,3,3) = '401', 'KAT', IF(MID(mahasiswas.npm,3,3) = '404', 'MBIS', IF(MID(mahasiswas.npm,3,3) = '308', 'AKS', IF(MID(mahasiswas.npm,3,3) = '307', 'FAR', IF(MID(mahasiswas.npm,3,3) = '309', 'FIS', IF(MID(mahasiswas.npm,3,3) = '403', 'IRM', IF(MID(mahasiswas.npm,3,3) = '303', 'RMIK', IF(MID(mahasiswas.npm,3,3) = '305', 'ARS', IF(MID(mahasiswas.npm,3,3) = '302', 'MIF', IF(MID(mahasiswas.npm,3,3) = '402', 'SI', IF(MID(mahasiswas.npm,3,3) = '304', 'TIK', IF(MID(mahasiswas.npm,3,3) = '306', 'KMA', ''))))))))))))) AS nama_jurusan FROM mahasiswas LEFT OUTER JOIN nilai09 ON mahasiswas.npm = nilai09.npm WHERE mahasiswas.npm = '$npm'")->row();
    }

    function ambil_data_nilai($npm){
        return $this->db->query("SELECT n.smt, mk.KodeMatkul, mk.Matkul, mk.SKS, n.nilaiuts, n.nilaiuas, n.nilaiakhir, IF(n.nilaiakhir = 'A', '4.00', IF(n.nilaiakhir = 'AB', '3.50', IF(n.nilaiakhir = 'B', '3.00', IF(n.nilaiakhir = 'BC', '2.50', IF(n.nilaiakhir = 'C', '2.00', IF(n.nilaiakhir = 'CD', '1.50', IF(n.nilaiakhir = 'D', '1.00', IF(n.nilaiakhir = 'E', '0.00',0)))))))) AS asss FROM (nilai09 n LEFT OUTER JOIN matakuliah2021 mk ON n.kodematkul = mk.KodeMatkul) LEFT OUTER JOIN mahasiswas mhs ON n.npm = mhs.NPM WHERE mhs.NPM = '$npm' GROUP BY mk.KodeMatkul");
    }

    function ambil_data_semester($npm){
        return $this->db->query("SELECT n.smt FROM (nilai09 n LEFT OUTER JOIN matakuliah2021 mk ON n.kodematkul = mk.KodeMatkul) LEFT OUTER JOIN mahasiswas mhs ON n.npm = mhs.NPM WHERE mhs.NPM = '$npm' GROUP BY n.smt");
    }

    function ambil_data_cetak_khs($npm, $smt){
        return $this->db->query("SELECT n.smt, mk.KodeMatkul, mk.Matkul, mk.SKS, n.nilaiuts, n.nilaiuas, n.nilaiakhir, IF(n.nilaiakhir = 'A', '4.00', IF(n.nilaiakhir = 'AB', '3.50', IF(n.nilaiakhir = 'B', '3.00', IF(n.nilaiakhir = 'BC', '2.50', IF(n.nilaiakhir = 'C', '2.00', IF(n.nilaiakhir = 'CD', '1.50', IF(n.nilaiakhir = 'D', '1.00', IF(n.nilaiakhir = 'E', '0.00',0)))))))) AS asss FROM (nilai09 n LEFT OUTER JOIN matakuliah2021 mk ON n.kodematkul = mk.KodeMatkul) LEFT OUTER JOIN mahasiswas mhs ON n.npm = mhs.NPM WHERE mhs.NPM = '$npm' AND n.smt = '$smt' GROUP BY mk.KodeMatkul");
    }
}