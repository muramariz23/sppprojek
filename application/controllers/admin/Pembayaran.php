<?php

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("pembayaran_model");
        $this->load->model("petugas_model");
        $this->load->model("siswa_model");
        $this->load->model("spp_model");
        $this->load->library('form_validation');
        $this->load->helper('rupiah');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'petugas') {
            $data['title'] = "Pembayaran";
            $data['GetPembayaran'] = $this->pembayaran_model->getAll();
            $this->load->view('admin/pembayaran/list', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    function add()
    {
        if ($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'petugas') {
            $AddPembayaran = $this->pembayaran_model;
            $validation = $this->form_validation;
            $validation->set_rules($AddPembayaran->rules());

            if ($validation->run()) {
                $AddPembayaran->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }


            $data['GetSiswa'] = $this->siswa_model->getAll();
            $data['GetPetugas'] = $this->petugas_model->getAll();
            $data['GetSpp'] = $this->spp_model->getAll();

            $this->load->view('admin/pembayaran/add_form', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    function edit($id_pembayaran = null)
    {
        if ($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'petugas') {
            if (!isset($id_pembayaran)) redirect('admin/pembayaran');

            $EditPembayaran = $this->pembayaran_model;
            $validation = $this->form_validation;
            $validation->set_rules($EditPembayaran->rules());

            if ($validation->run()) {
                $EditPembayaran->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }


            $data['GetPembayaran'] = $EditPembayaran->getById($id_pembayaran);
            $data['GetSiswa'] = $this->siswa_model->getAll();
            $data['GetPetugas'] = $this->petugas_model->getAll();
            $data['GetSpp'] = $this->spp_model->getAll();
            if (!$data['GetPembayaran']) show_404();

            $this->load->view('admin/pembayaran/edit_form', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    function delete($id_pembayaran = null)
    {
        if (!isset($id_pembayaran)) show_404();

        if ($this->pembayaran_model->delete($id_pembayaran)) {
            $this->session->set_flashdata('danger', 'Berhasil dihapus');
            redirect(site_url('admin/pembayaran'));
        }
    }
    
     public function cetak()
    {


        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Cetak Laporan';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_pembayaran_spp';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";
        $this->data['pem'] =  $this->pembayaran_model->getAll();
        $html = $this->load->view('admin/pembayaran/pembayaran_cetak', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

}
