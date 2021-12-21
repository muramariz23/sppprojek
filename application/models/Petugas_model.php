<?php

class Petugas_model extends CI_Model
{
    private $_table = "petugas";

    public $id_petugas;
    public $nama_petugas;
    public $id_login = 3;
    public $image = "default.jpg";

    public function rules()
    {
        return [
            [
                'field' => 'nama_petugas',
                'label' => 'nama_petugas',
                'rules' => 'required'
            ],
        ];
    }

    function jumlahAll()
    {
        return $this->db->from($this->_table)->count_all_results();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_petugas)
    {
        return $this->db->get_where($this->_table, ["id_petugas" => $id_petugas])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_petugas = '';
        $this->nama_petugas = $post["nama_petugas"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_petugas = $post["id_petugas"];
        $this->nama_petugas = $post["nama_petugas"];
        return $this->db->update($this->_table, $this, array('id_petugas' => $post['id_petugas']));
    }

    public function delete($id_petugas)
    {
        return $this->db->delete($this->_table, array("id_petugas" => $id_petugas));
    }
}
