<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $this->load->view('template/Header', $data);
        $this->load->view('Profile', $data);
        $this->load->view('template/Footer');
        $this->load->view('template/Alert');
    }

    public function Edit()
    {
        $data['admin'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();

       
        $this->form_validation->set_rules('password_sekarang', 'Password sekarang', 'requaired|trim');
        $this->form_validation->set_rules('password_baru1', 'Password baru1', 'requaired|trim|min_length[5]');


        if ($this->form_validation->run() == false) {

           
            $password_sekarang = $this->input->post('password_sekarang');
            $password_baru = $this->input->post('password_baru1');

            if (!password_verify($password_sekarang, $data['admin']['password'])) {
                $this->session->set_flashdata('pas_beda', 'pas_beda');
                redirect('Profile');
            } else {
                if ($password_sekarang == $password_baru) {
                    $this->session->set_flashdata('pas_sama', 'pas_sama');
                    redirect('Profile');
                } else {
                    //password suda ok!
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                   
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('login');
                    $this->session->set_flashdata('ubah_pass', 'ubah_pass');
                    redirect('Login/logout');
                }
            }
        } else {
            $this->session->set_flashdata('pas_kosong', 'pas_kosong');

            redirect('Profile');
        }
    }
}
