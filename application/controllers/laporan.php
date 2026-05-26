<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan = $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');

        $this->db->join(
            'anggota',
            'anggota.anggota_id = peminjaman.anggota_id'
        );

        if ($bulan) {
            $this->db->where(
                'DATE_FORMAT(tanggal_pinjam,"%Y-%m") =',
                $bulan
            );
        }

        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/peminjaman', $data);
        $this->load->view('templates/footer');
    }

     public function buku()
    {
        $kategori    = $this->input->get('kategori');
        $ketersediaan = $this->input->get('ketersediaan');
 
        $this->db->select('buku.*');
        $this->db->from('buku');
 
        if ($kategori) {
            $this->db->where('kategori', $kategori);
        }
 
        if ($ketersediaan === 'tersedia') {
            $this->db->where('stok >', 0);
        } elseif ($ketersediaan === 'habis') {
            $this->db->where('stok', 0);
        }
 
        $this->db->order_by('judul_buku', 'ASC');
 
        $data['data']         = $this->db->get()->result();
        $data['kategori']     = $kategori;
        $data['ketersediaan'] = $ketersediaan;
 
        // Ambil semua kategori unik untuk dropdown filter
        $data['list_kategori'] = $this->db->select('kategori')
                                          ->distinct()
                                          ->get('buku')
                                          ->result();
 
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/buku', $data);
        $this->load->view('templates/footer');
    }
 
    public function cetak_buku()
    {
        $kategori     = $this->input->get('kategori');
        $ketersediaan = $this->input->get('ketersediaan');
 
        $this->db->select('buku.*');
        $this->db->from('buku');
 
        if ($kategori) {
            $this->db->where('kategori', $kategori);
        }
 
        if ($ketersediaan === 'tersedia') {
            $this->db->where('stok >', 0);
        } elseif ($ketersediaan === 'habis') {
            $this->db->where('stok', 0);
        }
 
        $this->db->order_by('judul_buku', 'ASC');
 
        $data['data']         = $this->db->get()->result();
        $data['kategori']     = $kategori;
        $data['ketersediaan'] = $ketersediaan;
 
        // Halaman cetak standalone (tanpa header/sidebar/footer template)
        $this->load->view('laporan/cetak_buku', $data);
    }
}