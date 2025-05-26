<?php
class Kullanici_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // 🔐 Güvenli giriş kontrolü
    public function giris_yap($email, $sifre) {
        $query = $this->db->where('email', $email)->get('kullanicilar');
        $kullanici = $query->row();
    
        if ($kullanici && password_verify($sifre, $kullanici->sifre)) {
            return $kullanici;
        }
    
        return false;
    }
    

    // 🧾 Güvenli kullanıcı ekleme
    public function kullanici_ekle($veri) {
        // Şifreyi güvenli hale getir
        $veri['sifre'] = password_hash($veri['sifre'], PASSWORD_DEFAULT);
        return $this->db->insert('kullanicilar', $veri);
        
    }

    // 📭 ID ile kullanıcı çek (opsiyonel)
    public function kullanici_getir($id) {
        return $this->db->where('id', $id)->get('kullanicilar')->row();
    }

    // 🛡️ Kullanıcı adı var mı (opsiyonel)
    public function kullanici_adi_varmi($kullanici_adi) {
        return $this->db
            ->where('kullanici_adi', $kullanici_adi)
            ->get('kullanicilar')
            ->row();
    }
    public function uye_ol($veri) {
        // Şifreyi güvenli şekilde hashleyip kaydeder
        $veri['sifre'] = password_hash($veri['sifre'], PASSWORD_DEFAULT);
        return $this->db->insert('kullanicilar', $veri);
    }
    
}
