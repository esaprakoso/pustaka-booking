<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class Web extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['judul'] = 'Halaman Depan';
        $this->load->view('v_header',$data);
        $this->load->view('v_index',$data);
        $this->load->view('v_footer',$data);
    }
    public function about(){
        $data['judul'] = 'About';
        $this->load->view('v_header',$data);
        $this->load->view('v_about',$data);
        $this->load->view('v_footer',$data);
    }
    public function formMataKuliah(){
        $data['judul'] = 'Form Mata Kuliah';
        $this->load->view('v_header',$data);
        $this->load->view('v_form-matakuliah',$data);
        $this->load->view('v_footer',$data);
    }
    public function tampilMataKuliah(){
        $this->form_validation->set_rules('kode', 'Kode Matakuliah',
            'required|min_length[3]', [
            'required' => 'Kode Matakuliah Harus diisi',
            'min_length' => 'Kode terlalu pendek'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Matakuliah',
            'required|min_length[3]', [
            'required' => 'Nama Matakuliah Harus diisi',
            'min_length' => 'Nama terlalu pendek'
        ]);
        if ($this->form_validation->run() != true) {
            $this->index();
        }else{
            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'sks' => $this->input->post('sks')
            ];
            $data['judul'] = 'Data Mata Kuliah';
            $this->load->view('v_header',$data);
            $this->load->view('v_data-matakuliah',$data);
            $this->load->view('v_footer',$data);
        }
    }
}
