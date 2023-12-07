<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_umum extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['admin'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
		$data['website'] = $this->m_admin->website();
		$data['kas_umum'] = $this->m_admin->kas_umum();
		$data['tot_masuk'] = $this->m_admin->tot_masuk();
		$data['tot_keluar'] = $this->m_admin->tot_keluar();

		$this->load->view('template/Header', $data);
		$this->load->view('Kas_umum', $data);
		$this->load->view('template/Footer', $data);
		$this->load->view('template/Alert');
	}

	public function tambah_masuk()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
            'required' => 'Wajib diisi'
        ]);

        $this->form_validation->set_rules('masuk', 'masuk', 'required', [
            'required' => 'Wajib diisi'
        ]);

        $this->form_validation->set_rules('uraian', 'uraian', 'required', [
            'required' => 'Wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('belum_lengkap', 'belum_lengkap');
            redirect('Kas_umum');
        } else {

            $tanggal            = $this->input->post('tanggal');
            $masuk           	= $this->input->post('masuk');
            $uraian            	= $this->input->post('uraian');

            $data = array(
                'masuk'		 => $masuk,
                'keluar' 	 => 0,
                'uraian'  	 => $uraian,
                'tanggal' 	 => $tanggal,
                'bln'        => date('m', strtotime($tanggal)),   
                'thn'        => date('Y', strtotime($tanggal)),  
				'jenis_kas' => 'masuk'
            );

            $this->db->insert('kas_umum', $data);
            $this->session->set_flashdata('sukses', 'sukses');
            redirect('Kas_umum');
        }
    }

	public function tambah_keluar()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
            'required' => 'Wajib diisi'
        ]);

        $this->form_validation->set_rules('keluar', 'keluar', 'required', [
            'required' => 'Wajib diisi'
        ]);

        $this->form_validation->set_rules('uraian', 'uraian', 'required', [
            'required' => 'Wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('belum_lengkap', 'belum_lengkap');
            redirect('Kas_umum');
        } else {

            $tanggal            = $this->input->post('tanggal');
            $keluar           	= $this->input->post('keluar');
            $uraian            	= $this->input->post('uraian');

            $data = array(
                'masuk'		=> 0,
                'keluar' 	=> $keluar,
                'uraian'  	=> $uraian,
				'tanggal' 	 => $tanggal,
                'bln'        => date('m', strtotime($tanggal)),   
                'thn'        => date('Y', strtotime($tanggal)),
				'jenis_kas' => 'keluar'
            );

            $this->db->insert('kas_umum', $data);
            $this->session->set_flashdata('sukses', 'sukses');
            redirect('Kas_umum');
        }
    }

    public function edit_kas()
    {
        $tanggal        = $this->input->post('tanggal');
        $uraian         = $this->input->post('uraian');
        $masuk          = $this->input->post('masuk');
        $keluar         = $this->input->post('keluar');
        $id             = $this->input->post('id');


        $this->db->set('masuk', $masuk);
        $this->db->set('keluar', $keluar);
        $this->db->set('uraian', $uraian);
        $this->db->set('tanggal', $tanggal);
        $this->db->set('bln', date('m', strtotime($tanggal)));
        $this->db->set('thn', date('Y', strtotime($tanggal)));
        $this->db->where('id', $id);
        $this->db->update('kas_umum');

        $this->session->set_flashdata('sukses', 'sukses');
        redirect('Kas_umum');
    }

	function hapus($id)
    {
        $where = array('id' => $id);
        $this->m_admin->hapus_data($where, 'kas_umum');
        $this->session->set_flashdata('hapus', 'hapus');
        redirect('Kas_umum');
    }
}
