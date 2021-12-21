<?php

class Siswa_model extends CI_Model
{
    private $_table = "siswa";

    public $nisn;
    public $nis;
    public $nama;
    public $id_kelas;
    public $alamat;
    public $no_telp;
    public $id_spp;
    public $id_login = 3;
    public $image = "default.jpg";

    public function rules()
    {
        return [
            [
                'field' => 'nisn',
                'label' => 'nisn',
                'rules' => 'required'
            ],

            [
                'field' => 'nis',
                'label' => 'nis',
                'rules' => 'required'
            ],

            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ],

            [
                'field' => 'id_kelas',
                'label' => 'id_kelas',
                'rules' => 'numeric'
            ],

            [
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'no_telp',
                'label' => 'no_telp',
                'rules' => 'numeric'
            ],

            [
                'field' => 'id_spp',
                'label' => 'id_spp',
                'rules' => 'numeric'
            ],

            [
                'field' => 'id_login',
                'label' => 'id_login',
                'rules' => 'numeric'
            ],
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
        $this->db->join('spp', 'siswa.id_spp=spp.id_spp');
        $query = $this->db->get();
        return $query->result();
    }

    function jumlahAll()
    {
        return $this->db->from($this->_table)->count_all_results();
    }

    public function getById($nisn)
    {
        $this->db->select('*');
        $this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
        $this->db->join('spp', 'siswa.id_spp=spp.id_spp');
        $query = $this->db->get_where($this->_table, ["nisn" => $nisn]);
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nisn = $post["nisn"];
        $this->nis = $post["nis"];
        $this->nama = $post["nama"];
        $this->id_kelas = $post["id_kelas"];
        $this->alamat = $post["alamat"];
        $this->no_telp = $post["no_telp"];
        $this->id_spp = $post["id_spp"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nisn = $post["nisn"];
        $this->nis = $post["nis"];
        $this->nama = $post["nama"];
        $this->id_kelas = $post["id_kelas"];
        $this->alamat = $post["alamat"];
        $this->no_telp = $post["no_telp"];
        $this->id_spp = $post["id_spp"];
        return $this->db->update($this->_table, $this, array('nisn' => $post['nisn']));
    }

    public function delete($nisn)
    {
        return $this->db->delete($this->_table, array("nisn" => $nisn));
    }
}
