<?php
class Sepet extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sepet_model');
        $this->load->helper('url');
    }

    public function ekle($urun_id) {
        $kullanici = $this->session->userdata('kullanici');
        if (!$kullanici) {
            redirect('Kullanici/giris');
        }
    
        $this->Sepet_model->sepete_ekle($urun_id, $kullanici->id);
        redirect('Sepet');
    }

    public function index() {
        $kullanici = $this->session->userdata('kullanici');
        if (!$kullanici) {
            redirect('Kullanici/giris');
        }
    
        $data['sepet'] = $this->Sepet_model->sepet_urunleri_getir($kullanici->id);
        $icerik = $this->load->view('sepet', $data, true);
        $this->load->view('layout', compact('icerik'));

    }
    public function sil($id) {
        $this->Sepet_model->sepetten_sil($id);
        redirect('Sepet');
    }
    public function adet($id, $yeni_adet) {
        if ($yeni_adet < 1) {
            $this->Sepet_model->sepetten_sil($id); // sıfırsa sil
        } else {
            $this->Sepet_model->adet_guncelle($id, $yeni_adet);
        }
        redirect('Sepet');
    }
    public function siparis_onayla() {
        $kullanici = $this->session->userdata('kullanici');
        if (!$kullanici) {
            redirect('Kullanici/giris');
        }
    
        $sepet = $this->Sepet_model->sepeti_getir($kullanici->id);
        $this->load->model('Siparis_model');
    
        foreach ($sepet as $urun) {
            $veri = array(
                'kullanici_id' => $kullanici->id,
                'urun_id' => $urun->urun_id,
                'adet' => $urun->adet
            );
            $this->Siparis_model->siparis_ekle($veri);
        }
    
        // Sepeti temizle
        $this->db->where('kullanici_id', $kullanici->id)->delete('sepet');
    
        echo "<script>alert('Siparişiniz alındı!');window.location.href='" . base_url('Urunler') . "';</script>";
    }


    
    
    
    
    
}
