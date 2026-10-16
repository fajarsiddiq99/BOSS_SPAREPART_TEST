<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_recent($limit = 3) {
        return $this->db->order_by('created_at', 'DESC')
            ->limit($limit)
            ->get('articles')
            ->result();
    }

    public function get_all() {
        return $this->db->order_by('created_at', 'DESC')
            ->get('articles')
            ->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('articles', array('id' => $id))->row();
    }

    public function insert($data) {
        return $this->db->insert('articles', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('articles', $data);
    }

    public function delete($id) {
        return $this->db->delete('articles', array('id' => $id));
    }
}
