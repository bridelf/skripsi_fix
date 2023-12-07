<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
    $data['tot_masuk'] = $this->m_admin->tot_masuk();
    $data['tot_keluar'] = $this->m_admin->tot_keluar();
	$data['nama_bulan'] = $this->m_admin->jml_bln();
	$data['jml_masuk'] = $this->m_admin->jml_masuk();
	$data['jml_keluar'] = $this->m_admin->jml_keluar();

    $this->load->view('template/Header', $data);
    $this->load->view('Dashboard', $data);
    $this->load->view('template/Footer', $data);
	}
}
