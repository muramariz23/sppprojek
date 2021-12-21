<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kk_model extends CI_Model
{
    private $_table = "kompetensi_keahlian";

    public $id_kk;
    public $nama_kk;

    public function rules()
    {
        return [
            ['field' => 'nama_kk',
            'label' => 'nama_kk',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kk" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_kk = $post["nama_kk"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kk = $post["id"];
        $this->nama_kk = $post["nama_kk"];
        $this->db->update($this->_table, $this, array('id_kk' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kk" => $id));
    }
}
