<?php
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Urun_model');
        $this->load->library('session');
        $this->load->helper('url');

        // Admin kontrolü
        $kullanici = $this->session->userdata('kullanici');
        if (!$kullanici || $kullanici->rol != 'admin') {
            redirect('Kullanici/giris');
        }
    }

    public function index() {
        $data['urunler'] = $this->Urun_model->tum_urunleri_getir();
        $this->load->view('admin_panel', $data);
    }

    public function urun_ekle() {
        if ($_POST) {
            // 1. Dosya yükleme işlemi
            $resim_yolu = '';
            if (!empty($_FILES['resim']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = time() . '_' . $_FILES['resim']['name'];
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('resim')) {
                    $resim_yolu = $this->upload->data('file_name');
                } else {
                    echo "Resim yükleme hatası: " . $this->upload->display_errors();
                    return;
                }
            }
    
            // 2. Ürün bilgilerini kaydet
            $veri = array(
                'ad' => $this->input->post('ad'),
                'kategori_id' => $this->input->post('kategori_id'),
                'aciklama' => $this->input->post('aciklama'),
                'fiyat' => $this->input->post('fiyat'),
                'stok' => $this->input->post('stok'),
                'resim_yolu' => $resim_yolu
            );
    
            $this->Urun_model->urun_ekle($veri);
            redirect('Admin');
        } else {
            $this->load->model('Kategori_model');
            $data['kategoriler'] = $this->Kategori_model->tum_kategoriler();
            $this->load->view('urun_ekle', $data);
        }
    }
    

    
    public function urun_sil($id) {
        $this->Urun_model->urun_sil($id);
        redirect('Admin');
    }

    public function urun_duzenle($id) {
        $this->load->model('Kategori_model');
    
        if ($_POST) {
            $resim_yolu = $this->input->post('eski_resim'); // varsayılan olarak eski resim
    
            // Eğer yeni bir resim yüklendiyse
            if (!empty($_FILES['resim']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = time() . '_' . $_FILES['resim']['name'];
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('resim')) {
                    $resim_yolu = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                    return;
                }
            }
    
            $veri = array(
                'ad' => $this->input->post('ad'),
                'kategori_id' => $this->input->post('kategori_id'),
                'aciklama' => $this->input->post('aciklama'),
                'fiyat' => $this->input->post('fiyat'),
                'stok' => $this->input->post('stok'),
                'resim_yolu' => $resim_yolu
            );
    
            $this->Urun_model->urun_guncelle($id, $veri);
            redirect('Admin');
        } else {
            $data['urun'] = $this->Urun_model->urun_getir($id);
            $data['kategoriler'] = $this->Kategori_model->tum_kategoriler();
            $this->load->view('urun_duzenle', $data);
        }
    }
    public function siparisler() {
        $this->load->model('Siparis_model');
        $data['siparisler'] = $this->Siparis_model->siparisleri_getir();
        $this->load->view('admin_siparisler', $data);
    }
    
    public function siparis_durum_guncelle() {
        $siparis_id = $this->input->post('siparis_id');
        $yeni_durum = $this->input->post('durum');
    
        $this->load->model('Siparis_model');
        $this->Siparis_model->durum_guncelle($siparis_id, $yeni_durum);
        redirect('Admin/siparisler');
    }
    
    
    
    
}
