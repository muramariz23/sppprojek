<?php 

/**
 * kelas kontrol kompetensi keahlian
 */
class Kompetensi_keahlian extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Kk_model");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["kk"] = $this->Kk_model->getAll();
		$this->load->view("admin/Kompetensi_keahlian/list", $data);
	}

	public function add()
	{
		$kk = $this->Kk_model;
		$validation = $this->form_validation;
		$validation->set_rules($kk->rules());

		if ($validation->run()) {
			$kk->save();
			$this->session->set_flashdata('success', 'data berhasil disimpan');
		}

		$this->load->view("admin/kompetensi_keahlian/new_form");
	}

	public function edit($id_kk = null)
	{
		if (!isset($id_kk)) redirect('admin/kompetensi_keahlian');

		$kk = $this->Kk_model;
		$validation = $this->form_validation;
		$validation->set_rules($kk->rules());

		if ($validation->run()) {
			$kk->update();
			$this->session->set_flashdata('success', 'data berhasil diubah');
		}

		$data['kk'] = $kk->getById($id_kk);
		if (!$data['kk']) {
			show_404();
		}

		$this->load->view('admin/kompetensi_keahlian/edit_form', $data);
	}

	public function delete($id = null)
	{
		if (!isset($id)) {
			show_404();
		}

		if ($this->Kk_model->delete($id)) {
			redirect(site_url('admin/kompetensi_keahlian'));
		}
	}
}
 ?>