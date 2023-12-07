<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends Ci_model
{
    function website()
    {
        $this->db->select("*");
        $this->db->from('website');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->result_array();
    }

    function kas_umum()
    {
        $this->db->select("*");
        $this->db->from('kas_umum');
        $this->db->order_by('tanggal', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function tot_masuk()
    {
        $this->db->select_sum('masuk');
        $this->db->from('kas_umum');
      
        $query = $this->db->get();
        return $query->result_array();
    }

    function tot_keluar()
    {
        $this->db->select_sum('keluar');
        $this->db->from('kas_umum');
      
        $query = $this->db->get();
        return $query->result_array();
    }

    function tgl_awal_kas()
    {
        $this->db->select_min('tanggal');
        $this->db->from('kas_umum');
        $this->db->limit('1');
      
        $query = $this->db->get();
        return $query->result_array();
    }


    function Lap_kas_umum($awal, $akhir)
    {
        if($awal == 'ALL' && $akhir == 'ALL') {
            $this->db->select("*");
            $this->db->from('kas_umum');
            $this->db->order_by('tanggal', 'DESC');
        }else {
            $this->db->select("*");
            $this->db->from('kas_umum');
            $this->db->where('tanggal >=', $awal);
            $this->db->where('tanggal <=', $akhir);
            $this->db->order_by('tanggal', 'DESC');
        }
        

        $query = $this->db->get();
        return $query->result_array();
    }

    function Lap_tot_masuk($awal, $akhir)
    {
        if($awal == 'ALL' && $akhir == 'ALL') {
        $this->db->select_sum('masuk');
        $this->db->from('kas_umum');
    }else {
        $this->db->select_sum('masuk');
        $this->db->from('kas_umum');
        $this->db->where('tanggal >=', $awal);
        $this->db->where('tanggal <=', $akhir);

    }
        $query = $this->db->get();
        return $query->result_array();
    }

    function Lap_tot_keluar($awal, $akhir)
    {
        if($awal == 'ALL' && $akhir == 'ALL') {
            $this->db->select_sum('keluar');
            $this->db->from('kas_umum');
        }else {
            $this->db->select_sum('keluar');
            $this->db->from('kas_umum');
            $this->db->where('tanggal >=', $awal);
            $this->db->where('tanggal <=', $akhir);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function jml_bln()
    {
        $this->db->select("bln");
        $this->db->from('kas_umum');
        $this->db->group_by('bln');
        $this->db->where('thn', date('Y'));
        $query = $this->db->get();
        return $query->result_array();
    }

    function jml_masuk()
    {
        $this->db->select_sum('masuk');
        $this->db->from('kas_umum');
        $this->db->group_by('bln');
        $this->db->where('thn', date('Y'));
        $query = $this->db->get();
        return $query->result_array();
    }

    function jml_keluar()
    {
        $this->db->select_sum('keluar');
        $this->db->from('kas_umum');
        $this->db->group_by('bln');
        $this->db->where('thn', date('Y'));
        $query = $this->db->get();
        return $query->result_array();
    }

    function hitungtamu2()
    {
        $this->db->select('bln, count(nama_tamu) as total');
        $this->db->group_by('bln');
        $this->db->where('thn', date('Y'));
        $query = $this->db->get('data_tamu');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function hitungtamuthn()
    {
        $this->db->select('thn, count(nama_tamu) as total');
        $this->db->group_by('thn');
        $query = $this->db->get('data_tamu');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function jml_tamu()
    {
        $this->db->select_sum('id');
        $this->db->from('data_tamu');
        // $this->db->group_by('bln');
        // $this->db->where('thn', date('Y'));

        $query = $this->db->get();
        return $query->result_array();
    }

    function data_tamu()
    {
        $this->db->select("*");
        $this->db->from('data_tamu');
        $this->db->order_by('tgl', 'ASC');
        $this->db->order_by('bln', 'ASC');
        $this->db->order_by('thn', 'ASC');
        $this->db->order_by('jam', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function cetak_harian($tgl, $bln, $thn)
    {
        $this->db->select("*");
        $this->db->from('data_tamu');
        $this->db->where('tgl', $tgl);
        $this->db->where('bln', $bln);
        $this->db->where('thn', $thn);

        $this->db->order_by('tgl', 'ASC');
        $this->db->order_by('bln', 'ASC');
        $this->db->order_by('thn', 'ASC');
        $this->db->order_by('jam', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function cetak_bulanan($bln, $thn)
    {
        $this->db->select("*");
        $this->db->from('data_tamu');
        $this->db->where('bln', $bln);
        $this->db->where('thn', $thn);

        $this->db->order_by('tgl', 'ASC');
        $this->db->order_by('bln', 'ASC');
        $this->db->order_by('thn', 'ASC');
        $this->db->order_by('jam', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function cetak_tahunan($thn)
    {
        $this->db->select("*");
        $this->db->from('data_tamu');
        $this->db->where('thn', $thn);

        $this->db->order_by('tgl', 'ASC');
        $this->db->order_by('bln', 'ASC');
        $this->db->order_by('thn', 'ASC');
        $this->db->order_by('jam', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_data($where, $table)
    {

        $this->db->where($where);

        $this->db->delete($table);
    }
}
