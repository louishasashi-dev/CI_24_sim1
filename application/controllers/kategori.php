<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper('url');
    }

    public function index()
    {
        $data['kategori'] = $this->kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kategori/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori', TRUE)
            ];

            $this->kategori_model->insert($data);

            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('kategori');
        }
    }

    public function hapus($id)
    {
        $this->kategori_model->delete($id);

        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('kategori');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->kategori_model->get_by_id($id);

        if (!$data['kategori']) {
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kategori/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori', TRUE)
            ];

            $this->kategori_model->update($id, $data);

            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('kategori');
        }
    }
}