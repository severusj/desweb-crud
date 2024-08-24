<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->helper('url');
    }

    public function index() {
        $data['products'] = $this->ProductModel->get_products();
        $this->load->view('products/index', $data);
    }

    public function create() {
        $this->load->view('products/create');
    }

    //Función para insertar los datos de nuevo producto o editar el existente.
    public function store() {
        $data = array(
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description')
        );
        $this->ProductModel->insert_product($data);
        redirect('products');
    }

    public function edit($id) {
        $data['product'] = $this->ProductModel->get_product_by_id($id);
        $this->load->view('products/edit', $data);
    }

    public function update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description')
        );
        $this->ProductModel->update_product($id, $data);
        redirect('products');
    }

    public function delete($id) {
        $this->ProductModel->delete_product($id);
        redirect('products');
    }    
}
