<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper('url');
    }

    public function index()
    {
        $data['anggota'] = $this->anggota_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nomor_anggota', 'Nomor Anggota', 'required|is_unique[anggota.nomor_anggota]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('tanggal_daftar', 'Tanggal Daftar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [
                'nomor_anggota' => $this->input->post('nomor_anggota', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'telepon' => $this->input->post('telepon', TRUE),
                'email' => $this->input->post('email', TRUE),
                'tanggal_daftar' => $this->input->post('tanggal_daftar', TRUE)
            ];

            $this->anggota_model->insert($data);

            $this->session->set_flashdata('success', 'Data anggota berhasil disimpan');
            redirect('anggota');
        }
    }

    public function hapus($id)
    {
        $this->anggota_model->delete($id);

        $this->session->set_flashdata('success', 'Data anggota berhasil dihapus');
        redirect('anggota');
    }

    public function edit($id)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($id);

        if (!$data['anggota']) {
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('tanggal_daftar', 'Tanggal Daftar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nama' => $this->input->post('nama', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'telepon' => $this->input->post('telepon', TRUE),
                'email' => $this->input->post('email', TRUE),
                'tanggal_daftar' => $this->input->post('tanggal_daftar', TRUE)
            ];

            $this->anggota_model->update($id, $data);

            $this->session->set_flashdata('success', 'Data anggota berhasil diupdate');
            redirect('anggota');
        }
    }
}