<?php

class Petugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("petugas_model");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['GetPetugas'] = $this->petugas_model->getAll();
        $data['content'] = 'petugas/v_petugas';
        $this->load->view('admin/petugas/v_petugas', $data);
    }

    function add()
    {
        $AddPetugas = $this->petugas_model;
        $validation = $this->form_validation;
        $validation->set_rules($AddPetugas->rules());

        if ($validation->run()) {
            $AddPetugas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }


        $data['content'] = 'petugas/v_add_petugas';

        $this->load->view('admin/petugas/v_add_petugas', $data);
    }

    function edit($id_petugas = null)
    {
        if (!isset($id_petugas)) redirect('admin/petugas');

        $EditPetugas = $this->petugas_model;
        $validation = $this->form_validation;
        $validation->set_rules($EditPetugas->rules());

        if ($validation->run()) {
            $EditPetugas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }


        $data['content'] = 'petugas/v_edit_petugas';
        $data['GetPetugas'] = $EditPetugas->getById($id_petugas);

        if (!$data['GetPetugas']) show_404();

        $this->load->view('admin/petugas/v_edit_petugas', $data);
    }

    function delete($id_petugas = null)
    {
        if (!isset($id_petugas)) show_404();

        if ($this->petugas_model->delete($id_petugas)) {
            $this->session->set_flashdata('danger', 'Berhasil dihapus');
            redirect(site_url('admin/petugas'));
        }
    }
}
