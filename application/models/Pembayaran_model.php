<?php

class Pembayaran_model extends CI_Model
{
    private $_table = "pembayaran";

    public $id_pembayaran;
    public $id_petugas;
    public $nisn;
    public $tgl_bayar;
    public $bulan_bayar;
    public $tahun_bayar;
    public $id_spp;
    public $jumlah_bayar;

    public function rules()
    {
        return [
            [
                'field' => 'id_petugas',
                'label' => 'id_petugas',
                'rules' => 'numeric'
            ],

            [
                'field' => 'nisn',
                'label' => 'nisn',
                'rules' => 'numeric'
            ],

            [
                'field' => 'tgl_bayar',
                'label' => 'tgl_bayar',
                'rules' => 'required'
            ],

            [
                'field' => 'bulan_bayar',
                'label' => 'bulan_bayar',
                'rules' => 'required'
            ],

            [
                'field' => 'tahun_bayar',
                'label' => 'tahun_bayar',
                'rules' => 'required'
            ],

            [
                'field' => 'id_spp',
                'label' => 'id_spp',
                'rules' => 'numeric'
            ],

            [
                'field' => 'jumlah_bayar',
                'label' => 'jumlah_bayar',
                'rules' => 'required'
            ],
        ];
    }

    function jumlahAll()
    {
        return $this->db->from($this->_table)->count_all_results();
    }

    function totalBayar()
    {
        $query = $this->db->query("SELECT tahun_bayar, SUM(jumlah_bayar) AS jumlah_bayar FROM pembayaran GROUP BY tahun_bayar");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $Read) {
                $hasil[] = $Read;
            }
            return $hasil;
        }
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('petugas', 'pembayaran.id_petugas=petugas.id_petugas');
        $this->db->join('siswa', 'pembayaran.nisn=siswa.nisn');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id_pembayaran)
    {
        $this->db->select('*');
        $this->db->join('petugas', 'pembayaran.id_petugas=petugas.id_petugas');
        $this->db->join('siswa', 'pembayaran.nisn=siswa.nisn');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp');
        $query = $this->db->get_where($this->_table, ["id_pembayaran" => $id_pembayaran]);
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pembayaran = '';
        $this->id_petugas = $post["id_petugas"];
        $this->nisn = $post["nisn"];
        $this->tgl_bayar = $post["tgl_bayar"];
        $this->bulan_bayar = $post["bulan_bayar"];
        $this->tahun_bayar = $post["tahun_bayar"];
        $this->id_spp = $post["id_spp"];
        $this->jumlah_bayar = $post["jumlah_bayar"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pembayaran = $post["id_pembayaran"];
        $this->id_petugas = $post["id_petugas"];
        $this->nisn = $post["nisn"];
        $this->tgl_bayar = $post["tgl_bayar"];
        $this->bulan_bayar = $post["bulan_bayar"];
        $this->tahun_bayar = $post["tahun_bayar"];
        $this->id_spp = $post["id_spp"];
        $this->jumlah_bayar = $post["jumlah_bayar"];
        return $this->db->update($this->_table, $this, array('id_pembayaran' => $post['id_pembayaran']));
    }

    public function delete($id_pembayaran)
    {
        return $this->db->delete($this->_table, array("id_pembayaran" => $id_pembayaran));
    }
}
