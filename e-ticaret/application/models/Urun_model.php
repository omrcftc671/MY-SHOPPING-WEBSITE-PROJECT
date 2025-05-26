<?php
class Urun_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();  // ← bu satır eksikse $this->db null olur
    }

    public function tum_urunleri_getir() {
        return $this->db
            ->select('urunler.*, kategoriler.ad AS kategori_adi')
            ->from('urunler')
            ->join('kategoriler', 'urunler.kategori_id = kategoriler.id')
            ->get()
            ->result();
    }
    public function urun_getir($id) {
        return $this->db
            ->select('urunler.*, kategoriler.ad AS kategori_adi')
            ->from('urunler')
            ->join('kategoriler', 'urunler.kategori_id = kategoriler.id')
            ->where('urunler.id', $id)
            ->get()
            ->row();
    }
    public function urun_ekle($veri) {
        return $this->db->insert('urunler', $veri);
    }
    
    public function urun_sil($id) {
        // Önce sepetteki kayıtları sil
        $this->db->where('urun_id', $id)->delete('sepet');
    
        // Sonra ürünü sil
        return $this->db->delete('urunler', array('id' => $id));
    }
    public function urun_guncelle($id, $veri) {
        return $this->db->where('id', $id)->update('urunler', $veri);
    }
    
    
    
}