<?php
class Siparis_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function siparis_ekle($veri) {
        return $this->db->insert('siparisler', $veri);
    }

    public function siparisleri_getir() {
        return $this->db
            ->select('siparisler.*, siparisler.durum, kullanicilar.ad AS musteri, urunler.ad AS urun_adi')
            ->from('siparisler')
            ->join('kullanicilar', 'kullanicilar.id = siparisler.kullanici_id')
            ->join('urunler', 'urunler.id = siparisler.urun_id')
            ->order_by('siparisler.tarih', 'DESC')
            ->get()
            ->result();
    }
    public function durum_guncelle($siparis_id, $yeni_durum) {
        return $this->db->where('id', $siparis_id)->update('siparisler', ['durum' => $yeni_durum]);
    }
    public function kullanicinin_siparisleri($kullanici_id) {
        return $this->db
            ->select('siparisler.*, urunler.ad AS urun_adi')
            ->from('siparisler')
            ->join('urunler', 'urunler.id = siparisler.urun_id')
            ->where('kullanici_id', $kullanici_id)
            ->order_by('tarih', 'DESC')
            ->get()
            ->result();
    }
    
    
    
}
