<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp extends CI_Controller {

    public function kirim_notifikasi($id) {
        $this->db->select('
            peminjaman.*,
            anggota.nama_anggota,
            anggota.telepon
        ');
        $this->db->from('peminjaman');

        $this->db->join(
            'anggota',
            'anggota.id_anggota = peminjaman.anggota_id'  // Perbaikan di sini
        );

        // berdasarkan id peminjaman
        $this->db->where('peminjaman.id', $id);

        $d = $this->db->get()->row();

        if(!$d) {
            show_404();
        }

        $today = date('Y-m-d');

        $selisih = strtotime($today) - strtotime($d->tanggal_jatuh_tempo);

        $terlambat = $selisih > 0
            ? floor($selisih / 86400)
            : 0;

        // hanya kirim jika telat
        if($terlambat > 0){

            $pesan = "Halo " . $d->nama_anggota . ", " .
                "Anda terlambat mengembalikan buku selama " .
                $terlambat . " hari. " .
                "Mohon segera dikembalikan ke perpustakaan.";

            $this->kirim_wa($d->telepon, $pesan);
            
            // Set flash message dan redirect
            $this->session->set_flashdata('success', 'Notifikasi WhatsApp berhasil dikirim');
        } else {
            $this->session->set_flashdata('info', 'Tidak ada keterlambatan, tidak perlu kirim notifikasi');
        }
        
        redirect('peminjaman');
    }

    /**
     * Fungsi untuk mengirim pesan WhatsApp
     */
    private function kirim_wa($telepon, $pesan) {
        // Format nomor telepon (hilangkan karakter non-digit)
        $telepon = preg_replace('/[^0-9]/', '', $telepon);
        
        // Jika nomor diawali 0, ganti dengan 62
        if(substr($telepon, 0, 1) == '0') {
            $telepon = '62' . substr($telepon, 1);
        }
        
        // Simpan ke log untuk debugging
        log_message('info', "WA to {$telepon}: {$pesan}");
        
        // TODO: Ganti dengan API WhatsApp yang sebenarnya
        // Contoh dengan Wablas:
        /*
        $url = 'https://pati.wablas.com/api/send-message';
        $token = 'YOUR_TOKEN_HERE';
        
        $data = [
            'phone' => $telepon,
            'message' => $pesan
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: ' . $token,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        */
        
        return true;
    }
}