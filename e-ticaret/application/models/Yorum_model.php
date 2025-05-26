<?php
class Yorum_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function yorum_ekle($veri) {
        return $this->db->insert('yorumlar', $veri);
    }

    public function urun_yorumlari($urun_id) {
        return $this->db
            ->select('yorumlar.*, kullanicilar.ad AS kullanici_ad')
            ->from('yorumlar')
            ->join('kullanicilar', 'kullanicilar.id = yorumlar.kullanici_id')
            ->where('urun_id', $urun_id)
            ->order_by('tarih', 'DESC')
            ->get()
            ->result();
    }
}
