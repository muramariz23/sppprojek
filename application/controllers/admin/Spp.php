<?php 

/**
 * kelas konterol spp
 */
class Spp extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Spp_model");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["spp"] = $this->Spp_model->getAll();
		$this->load->view("admin/spp/list", $data);
	}

	public function add()
	{
		$spp = $this->Spp_model;
		$validation = $this->form_validation;
		$validation->set_rules($spp->rules());

		if ($validation->run()) {
			$spp->save();
			$this->session->set_flashdata('success', 'data berhasil disimpan');
		}

		$this->load->view("admin/spp/new_form");
	}

	public function edit($id_spp = null)
	{
		if (!isset($id_spp)) redirect('admin/spp');

		$spp = $this->Spp_model;
		$validation = $this->form_validation;
		$validation->set_rules($spp->rules());

		if ($validation->run()) {
			$spp->update();
			$this->session->set_flashdata('success', 'data berhasil diubah');
		}

		$data['spp'] = $spp->getById($id_spp);
		if (!$data['spp']) {
			show_404();
		}

		$this->load->view('admin/spp/edit_form', $data);
	}

	public function delete($id = null)
	{
		if (!isset($id)) {
			show_404();
		}

		if ($this->Spp_model->delete($id)) {
			redirect(site_url('admin/spp'));
		}
	}
}
 ?>