<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanici extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kullanici_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    // Giriş sayfası
    public function giris() {
        $this->load->view('giris');
    }

    // Giriş kontrol
    public function giris_yap() {
        $email = $this->input->post('email');
        $sifre = $this->input->post('sifre');
    
        $kullanici = $this->Kullanici_model->giris_yap($email, $sifre);
    
        if ($kullanici) {
            $this->session->set_userdata('kullanici', $kullanici);
            redirect('Urunler'); // Giriş başarılı
        } else {
            $data['hata'] = "E-posta veya şifre hatalı!";
            $this->load->view('giris', $data);
        }
    }
    

    // Çıkış işlemi
    public function cikis() {
        $this->session->unset_userdata('kullanici');
        redirect('Urunler');
    }

    // Üye ol sayfası
    public function uye_ol() {
        $this->load->view('uye_ol');
    }

    // Üye ol formu gönderildiğinde
    public function uye_kaydet() {
        $veri = array(
            'kullanici_adi' => $this->input->post('kullanici_adi'),
            'sifre'         => $this->input->post('sifre'),
            'email'         => $this->input->post('email')
        );

        $ekle = $this->Kullanici_model->uye_ol($veri);

        if ($ekle) {
            redirect('Kullanici/giris');
        } else {
            $data['hata'] = "Kayıt sırasında bir sorun oluştu.";
            $this->load->view('uye_ol', $data);
        }
    }
}
