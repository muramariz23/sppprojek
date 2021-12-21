<?php

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("kelas_model");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['GetKelas'] = $this->kelas_model->getAll();
        $data['content'] = 'kelas/v_kelas';
        $this->load->view('admin/kelas/list', $data);
    }

    function add()
    {
        $AddKelas = $this->kelas_model;
        $validation = $this->form_validation;
        $validation->set_rules($AddKelas->rules());

        if ($validation->run()) {
            $AddKelas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }


        $data['content'] = 'kelas/new_form';
        $this->load->model("kk_model");
        $data['GetKK'] = $this->kk_model->getAll();

        $this->load->view('admin/kelas/new_form', $data);
    }

    function edit($id_kelas = null)
    {
        if (!isset($id_kelas)) redirect('admin/kelas');

        $EditKelas = $this->kelas_model;
        $validation = $this->form_validation;
        $validation->set_rules($EditKelas->rules());

        if ($validation->run()) {
            $EditKelas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }


        $data['content'] = 'kelas/edit_form';
        $data['GetKelas'] = $EditKelas->getById($id_kelas);
        $this->load->model("kk_model");
        $data['GetKK'] = $this->kk_model->getAll();

        if (!$data['GetKelas']) show_404();

        $this->load->view('admin/kelas/edit_form', $data);
    }

    function delete($id_kelas = null)
    {
        if (!isset($id_kelas)) show_404();

        if ($this->kelas_model->delete($id_kelas)) {
            $this->session->set_flashdata('danger', 'Berhasil dihapus');
            redirect(site_url('admin/kelas'));
        }
    }
}
