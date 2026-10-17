<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sparepart_model');
        $this->load->model('Article_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');

        // Check if user is logged in
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('auth');
        }
    }

    public function index() {
        $data['total_spareparts'] = $this->Sparepart_model->get_total_spareparts();
        $data['spareparts'] = $this->Sparepart_model->get_all_spareparts();
        $data['articles'] = $this->Article_model->get_all();
        $data['total_articles'] = count($data['articles']);
        $data['user_fullname'] = $this->session->userdata('full_name');
        
        $this->load->view('admin/dashboard_view', $data);
    }

    public function add() {
        $this->load->library('upload');
        $upload_config = array(
            'upload_path' => FCPATH . 'assets/uploads/spareparts/',
            'allowed_types' => 'jpg|jpeg|png|webp',
            'max_size' => 5120,
            'encrypt_name' => TRUE
        );
        $this->upload->initialize($upload_config);

        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('error', strip_tags($this->upload->display_errors('', '')));
            redirect('admin');
            return;
        }

        $image = $this->upload->data('file_name');
        $data = array(
            'part_number' => $this->input->post('part_number'),
            'part_name' => $this->input->post('part_name'),
            'category_id' => $this->input->post('category_id'),
            'brand' => $this->input->post('brand'),
            'heavy_equipment_model' => $this->input->post('heavy_equipment_model'),
            'price' => $this->input->post('price'),
            'image' => $image
        );

        if (!$this->Sparepart_model->insert_sparepart($data)) {
            unlink($upload_config['upload_path'] . $image);
            $this->session->set_flashdata('error', 'Data gagal disimpan. Pastikan tabel spareparts memiliki kolom image.');
            redirect('admin');
            return;
        }

        $this->session->set_flashdata('success', 'Spare part berhasil ditambahkan.');
        redirect('admin');
    }

    public function delete($id) {
        $this->Sparepart_model->delete_sparepart($id);
        redirect('admin');
    }

    public function edit($id) {
        $sparepart = $this->Sparepart_model->get_sparepart_by_id($id);
        if (!$sparepart) {
            show_404();
            return;
        }

        $part_number = trim($this->input->post('part_number'));
        $part_name = trim($this->input->post('part_name'));
        $brand = trim($this->input->post('brand'));
        $equipment_model = trim($this->input->post('heavy_equipment_model'));
        $category_id = $this->input->post('category_id');
        $price = $this->input->post('price');

        if (
            $part_number === '' || $part_name === '' || $brand === '' || $equipment_model === '' ||
            !ctype_digit((string) $category_id) || (int) $category_id < 1 ||
            !is_numeric($price) || (float) $price < 0
        ) {
            $this->session->set_flashdata('error', 'Periksa kembali data spare part. Semua kolom wajib diisi dan harga harus valid.');
            redirect('admin');
            return;
        }

        $data = array(
            'part_number' => $part_number,
            'part_name' => $part_name,
            'category_id' => (int) $category_id,
            'brand' => $brand,
            'heavy_equipment_model' => $equipment_model,
            'price' => $price
        );

        $this->load->library('upload');
        $upload_config = array(
            'upload_path' => FCPATH . 'assets/uploads/spareparts/',
            'allowed_types' => 'jpg|jpeg|png|webp',
            'max_size' => 5120,
            'encrypt_name' => TRUE
        );
        $this->upload->initialize($upload_config);

        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', strip_tags($this->upload->display_errors('', '')));
                redirect('admin');
                return;
            }
            $data['image'] = $this->upload->data('file_name');
        }

        if (!$this->Sparepart_model->update_sparepart($id, $data)) {
            if (isset($data['image'])) {
                unlink($upload_config['upload_path'] . $data['image']);
            }
            $this->session->set_flashdata('error', 'Spare part gagal diperbarui.');
            redirect('admin');
            return;
        }

        if (isset($data['image']) && !empty($sparepart->image)) {
            $old_image_path = FCPATH . 'assets/uploads/spareparts/' . basename($sparepart->image);
            if (is_file($old_image_path)) {
                unlink($old_image_path);
            }
        }

        $this->session->set_flashdata('success', 'Spare part berhasil diperbarui.');
        redirect('admin');
    }

    public function add_article() {
        $title = trim($this->input->post('title'));
        $content = trim($this->input->post('content'));
        if ($title === '' || $content === '') {
            $this->session->set_flashdata('error', 'Judul dan isi artikel wajib diisi.');
            redirect('admin');
            return;
        }

        $image = $this->upload_article_image();
        if ($image === FALSE) {
            redirect('admin');
            return;
        }

        $article_data = array(
            'title' => $title,
            'content' => $content,
            'image' => $image
        );

        if (!$this->Article_model->insert($article_data)) {
            if ($image !== NULL) {
                unlink(FCPATH . 'assets/uploads/articles/' . $image);
            }
            $this->session->set_flashdata('error', 'Artikel gagal disimpan. Pastikan tabel articles sudah dibuat.');
            redirect('admin');
            return;
        }

        $this->session->set_flashdata('success', 'Artikel berhasil ditambahkan.');
        redirect('admin');
    }

    public function delete_article($id) {
        $article = $this->Article_model->get_by_id($id);
        if (!$this->Article_model->delete($id)) {
            $this->session->set_flashdata('error', 'Artikel gagal dihapus.');
        } else {
            if ($article && !empty($article->image)) {
                $image_path = FCPATH . 'assets/uploads/articles/' . basename($article->image);
                if (is_file($image_path)) {
                    unlink($image_path);
                }
            }
            $this->session->set_flashdata('success', 'Artikel berhasil dihapus.');
        }
        redirect('admin');
    }

    public function edit_article($id) {
        $title = trim($this->input->post('title'));
        $content = trim($this->input->post('content'));
        if ($title === '' || $content === '') {
            $this->session->set_flashdata('error', 'Judul dan isi artikel wajib diisi.');
            redirect('admin');
            return;
        }

        $article = $this->Article_model->get_by_id($id);
        if (!$article) {
            show_404();
            return;
        }

        $image = $this->upload_article_image();
        if ($image === FALSE) {
            redirect('admin');
            return;
        }

        $article_data = array(
            'title' => $title,
            'content' => $content
        );
        if ($image !== NULL) {
            $article_data['image'] = $image;
        }

        if (!$this->Article_model->update($id, $article_data)) {
            if ($image !== NULL) {
                unlink(FCPATH . 'assets/uploads/articles/' . $image);
            }
            $this->session->set_flashdata('error', 'Artikel gagal diperbarui.');
        } else {
            if ($image !== NULL && !empty($article->image)) {
                $old_image_path = FCPATH . 'assets/uploads/articles/' . basename($article->image);
                if (is_file($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            $this->session->set_flashdata('success', 'Artikel berhasil diperbarui.');
        }
        redirect('admin');
    }

    private function upload_article_image() {
        $file = isset($_FILES['article_image']) ? $_FILES['article_image'] : NULL;
        if (!$file || $file['error'] === UPLOAD_ERR_NO_FILE) {
            return NULL;
        }

        $this->load->library('upload');
        $upload_config = array(
            'upload_path' => FCPATH . 'assets/uploads/articles/',
            'allowed_types' => 'jpg|jpeg|png|webp',
            'max_size' => 5120,
            'encrypt_name' => TRUE
        );
        $this->upload->initialize($upload_config);

        if (!$this->upload->do_upload('article_image')) {
            $this->session->set_flashdata('error', strip_tags($this->upload->display_errors('', '')));
            return FALSE;
        }

        return $this->upload->data('file_name');
    }
}
