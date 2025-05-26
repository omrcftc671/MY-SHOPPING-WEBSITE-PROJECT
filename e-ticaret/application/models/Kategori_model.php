<?php
class Kategori_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function tum_kategoriler() {
        return $this->db->get('kategoriler')->result();
    }
}
