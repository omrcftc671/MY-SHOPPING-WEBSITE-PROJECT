<?php
class Urunler extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Urun_model');
        $this->load->library('session'); // ← Eksik olan satır
    }

    public function index() {
        $data['urunler'] = $this->Urun_model->tum_urunleri_getir();
        $icerik = $this->load->view('urun_listesi', $data, true);
$this->load->view('layout', compact('icerik'));
    }

    public function detay($id) {
        $this->load->model('Yorum_model');
    
        $data['urun'] = $this->Urun_model->urun_getir($id);
        $data['yorumlar'] = $this->Yorum_model->urun_yorumlari($id);
    
        if (!$data['urun']) {
            show_404();
        }
    
        $icerik = $this->load->view('urun_detay', $data, true);
        $this->load->view('layout', compact('icerik'));
    }
    
    
    
    public function yorum_ekle($urun_id) {
        $kullanici = $this->session->userdata('kullanici');
        if (!$kullanici) {
            redirect('Kullanici/giris');
        }
    
        $this->load->model('Yorum_model');
    
        $veri = array(
            'urun_id' => $urun_id,
            'kullanici_id' => $kullanici->id,
            'yorum' => $this->input->post('yorum')
        );
    
        $this->Yorum_model->yorum_ekle($veri);
        redirect('Urunler/detay/' . $urun_id);
    }
    
}
