<?php
class Sepet_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function sepete_ekle($urun_id, $kullanici_id, $adet = 1) {
        $veri = array(
            'urun_id' => $urun_id,
            'kullanici_id' => $kullanici_id,
            'adet' => $adet
        );
        return $this->db->insert('sepet', $veri);
    }

    public function sepetten_sil($id) {
        return $this->db->delete('sepet', array('id' => $id));
    }

    public function adet_guncelle($id, $yeni_adet) {
        return $this->db->where('id', $id)
                        ->update('sepet', array('adet' => $yeni_adet));
    }

    // 🔥 KULLANMAN GEREKEN FONKSİYON
    public function sepeti_getir($kullanici_id) {
        return $this->db
            ->select('sepet.*, urunler.ad AS urun_adi, urunler.fiyat AS urun_fiyat')
            ->from('sepet')
            ->join('urunler', 'urunler.id = sepet.urun_id')
            ->where('kullanici_id', $kullanici_id)
            ->get()
            ->result();
    }

    // (İstersen bunu silebilirsin veya aynı hale getirebilirsin)
    public function sepet_urunleri_getir($kullanici_id) {
        return $this->db
            ->select('sepet.*, urunler.ad AS urun_adi, urunler.fiyat AS urun_fiyat')
            ->from('sepet')
            ->join('urunler', 'urunler.id = sepet.urun_id')
            ->where('kullanici_id', $kullanici_id)
            ->get()
            ->result();
    }
}
