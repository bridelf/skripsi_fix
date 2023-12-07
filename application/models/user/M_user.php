<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends Ci_model
{
    function website()
    {
        $this->db->select("*");
        $this->db->from('website');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->result_array();
    }

    function carousel()
    {
        $this->db->select("*");
        $this->db->from('carousel');

        $query = $this->db->get();
        return $query->result_array();
    }

    function profil()
    {
        $this->db->select("*");
        $this->db->from('profil');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->result_array();
    }

    function struktur()
    {
        $this->db->select("*");
        $this->db->from('struktur');

        $query = $this->db->get();
        return $query->result_array();
    }

    function struktur_awal()
    {
        $this->db->select("*");
        $this->db->from('struktur');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();
    }

    function berita()
    {
        $this->db->select("*");
        $this->db->from('berita');
        $this->db->order_by('waktu', 'DESC');
        $this->db->limit(6);

        $query = $this->db->get();
        return $query->result_array();
    }

    function berita2()
    {
        $this->db->select("*");
        $this->db->from('berita');
        $this->db->order_by('waktu', 'DESC');


        $query = $this->db->get();
        return $query->result_array();
    }

    function berita_baca($id_berita)
    {
        $this->db->select("*");
        $this->db->from('berita');
        $this->db->where('id_berita', $id_berita);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->result_array();
    }

    function program()
    {
        $this->db->select("*");
        $this->db->from('program');
        $this->db->order_by('waktu', 'DESC');
        $this->db->limit(6);

        $query = $this->db->get();
        return $query->result_array();
    }

    function program2()
    {
        $this->db->select("*");
        $this->db->from('program');
        $this->db->order_by('waktu', 'DESC');


        $query = $this->db->get();
        return $query->result_array();
    }

    function program_baca($id_program)
    {
        $this->db->select("*");
        $this->db->from('program');
        $this->db->where('id_program', $id_program);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->result_array();
    }

    function anggaran_utama1()
    {
        $this->db->select("*");
        $this->db->from('anggaran');
        $this->db->where('tahun', date('Y'));
        $this->db->where('menu', 'RENCANA PENGGUNAAN ANGGARAN');

        $query = $this->db->get();
        return $query->result_array();
    }

    function anggaran_utama2()
    {
        $this->db->select("*");
        $this->db->from('anggaran');
        $this->db->where('tahun', date('Y'));
        $this->db->where('menu', 'REALISASI ANGGARAN');

        $query = $this->db->get();
        return $query->result_array();
    }

    function anggaran1($tahun)
    {
        $this->db->select("*");
        $this->db->from('anggaran');
        $this->db->where('tahun', $tahun);
        $this->db->where('menu', 'RENCANA PENGGUNAAN ANGGARAN');

        $query = $this->db->get();
        return $query->result_array();
    }

    function anggaran2($tahun)
    {
        $this->db->select("*");
        $this->db->from('anggaran');
        $this->db->where('tahun', $tahun);
        $this->db->where('menu', 'REALISASI ANGGARAN');

        $query = $this->db->get();
        return $query->result_array();
    }

    function tahun()
    {
        $this->db->select("*");
        $this->db->from('anggaran');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'desc');

        $query = $this->db->get();
        return $query->result_array();
    }

    function galery2()
    {
        $this->db->select("*");
        $this->db->from('galery');
        $this->db->order_by('waktu', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }
}
