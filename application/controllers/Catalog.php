<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sparepart_model');
        $this->load->model('Article_model');
        $this->load->helper('url');
        $this->load->helper('text');
    }

    public function index() {
        $data['articles'] = $this->Article_model->get_recent();
        $this->load->view('template');
        $this->load->view('header');
        $this->load->view('catalog_view', $data);
        $this->load->view('footer');
    }

    public function detail() {
        $data['spareparts'] = $this->Sparepart_model->get_all_spareparts();
        $this->load->view('template');
        $this->load->view('header');
        $this->load->view('detail_catalog_view', $data);
        $this->load->view('footer');
    }

    public function artikel($id) {
        $data['article'] = $this->Article_model->get_by_id($id);
        if (!$data['article']) {
            show_404();
            return;
        }

        $this->load->view('template');
        $this->load->view('header');
        $this->load->view('article_detail_view', $data);
        $this->load->view('footer');
    }

    public function send_inquiry() {
        $data = array(
            'customer_name' => $this->input->post('customer_name'),
            'whatsapp' => $this->input->post('whatsapp'),
            'message' => $this->input->post('message')
        );
        $this->Sparepart_model->insert_inquiry($data);
        $this->session->set_flashdata('success', 'Pesan inquiry berhasil dikirim via sistem!');
        redirect('catalog');
    }
}
