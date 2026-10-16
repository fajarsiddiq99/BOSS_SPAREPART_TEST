<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sparepart_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_spareparts() {
        $this->db->select('spareparts.*, categories.category_name');
        $this->db->from('spareparts');
        $this->db->join('categories', 'categories.id = spareparts.category_id', 'left');
        $this->db->order_by('spareparts.id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_total_spareparts() {
        return $this->db->count_all('spareparts');
    }

    public function get_total_inquiries() {
        return $this->db->count_all('inquiries');
    }

    public function insert_inquiry($data) {
        return $this->db->insert('inquiries', $data);
    }

    public function insert_sparepart($data) {
        return $this->db->insert('spareparts', $data);
    }

    public function get_sparepart_by_id($id) {
        return $this->db->get_where('spareparts', array('id' => $id))->row();
    }

    public function update_sparepart($id, $data) {
        return $this->db->where('id', $id)->update('spareparts', $data);
    }

    public function delete_sparepart($id) {
        $this->db->where('id', $id);
        return $this->db->delete('spareparts');
    }
}
