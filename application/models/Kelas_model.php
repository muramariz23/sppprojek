<?php

class Kelas_model extends CI_Model
{
    private $_table = "kelas";

    public $id_kelas;
    public $nama_kelas;
    public $id_kk;

    public function rules()
    {
        return [
            [
                'field' => 'nama_kelas',
                'label' => 'nama_kelas',
                'rules' => 'required'
            ],

            [
                'field' => 'id_kk',
                'label' => 'id_kk',
                'rules' => 'numeric'
            ]
        ];
    }

    function jumlahAll()
    {
        return $this->db->from($this->_table)->count_all_results();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('kompetensi_keahlian', 'kelas.id_kk=kompetensi_keahlian.id_kk');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id_kelas)
    {
        $this->db->select('*');
        $this->db->join('kompetensi_keahlian', 'kelas.id_kk=kompetensi_keahlian.id_kk');
        $query = $this->db->get_where($this->_table, ["id_kelas" => $id_kelas]);
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kelas = '';
        $this->nama_kelas = $post["nama_kelas"];
        $this->id_kk = $post["id_kk"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kelas = $post["id_kelas"];
        $this->nama_kelas = $post["nama_kelas"];
        $this->id_kk = $post["id_kk"];
        return $this->db->update($this->_table, $this, array('id_kelas' => $post['id_kelas']));
    }

    public function delete($id_kelas)
    {
        return $this->db->delete($this->_table, array("id_kelas" => $id_kelas));
    }
}
