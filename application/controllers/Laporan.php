<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        
        if($awal == NULL){
            $awal = 'ALL';
            $akhir = 'ALL';
        }else{
            $awal = $this->input->post('awal');
            $akhir = $this->input->post('akhir');
        }

        $data['kas_umum'] = $this->m_admin->Lap_kas_umum($awal, $akhir);
		$data['tot_masuk'] = $this->m_admin->Lap_tot_masuk($awal, $akhir);
		$data['tot_keluar'] = $this->m_admin->Lap_tot_keluar($awal, $akhir);
        $data['awal']= $awal;
        $data['akhir']= $akhir;

        $data['website'] = $this->m_admin->website();
        $data['admin'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/Header', $data);
        $this->load->view('Laporan', $data);
        $this->load->view('template/Footer', $data);
        $this->load->view('template/Alert');
    }

    public function cetak()
    {
        $awal = $_GET['awal'];
        $akhir = $_GET['akhir'];

        $data['kas_umum'] = $this->m_admin->Lap_kas_umum($awal, $akhir);
		$data['tot_masuk'] = $this->m_admin->Lap_tot_masuk($awal, $akhir);
		$data['tot_keluar'] = $this->m_admin->Lap_tot_keluar($awal, $akhir);
        $data['website'] = $this->m_admin->website();
        $this->load->view('Cetak', $data);
    }

}
