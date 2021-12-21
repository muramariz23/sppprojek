<?php

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("siswa_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'petugas') {
            $data['GetSiswa'] = $this->siswa_model->getAll();
            $this->load->view('admin/siswa/list', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    function add()
    {
        if ($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'petugas') {
            $AddSiswa = $this->siswa_model;
            $validation = $this->form_validation;
            $validation->set_rules($AddSiswa->rules());

            if ($validation->run()) {
                $AddSiswa->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }


            $this->load->model("kelas_model");
            $data['GetKelas'] = $this->kelas_model->getAll();
            $this->load->model("spp_model");
            $data['GetSpp'] = $this->spp_model->getAll();

            $this->load->view('admin/siswa/add_form', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    function edit($nisn = null)
    {
        if ($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'petugas') {
            if (!isset($nisn)) redirect('admin/siswa');

            $EditSiswa = $this->siswa_model;
            $validation = $this->form_validation;
            $validation->set_rules($EditSiswa->rules());

            if ($validation->run()) {
                $EditSiswa->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }


            $data['GetSiswa'] = $EditSiswa->getById($nisn);
            $this->load->model("kelas_model");
            $data['GetKelas'] = $this->kelas_model->getAll();
            $this->load->model("spp_model");
            $data['GetSpp'] = $this->spp_model->getAll();

            if (!$data['GetSiswa']) show_404();

            $this->load->view('admin/siswa/edit_form', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    function delete($nisn = null)
    {
        if (!isset($nisn)) show_404();

        if ($this->siswa_model->delete($nisn)) {
            $this->session->set_flashdata('danger', 'Berhasil dihapus');
            redirect(site_url('admin/siswa'));
        }
    }

     public function cetak()
    {


        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Cetak Laporan';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_siswa_spp';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";
        $this->data['sis'] =  $this->siswa_model->getAll();
        $html = $this->load->view('admin/siswa/siswa_cetak', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

}