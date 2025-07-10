<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kustomer_model extends CI_Model
{
    protected $_table = 'kustomer';
    protected $primary = 'id';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    // Kode perbaikan untuk fungsi save() di Kustomer_model.php
    public function save()
    {
        $data = [
            'nik'    => htmlspecialchars($this->input->post('nik', true)),
            'name'   => htmlspecialchars($this->input->post('name', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'telp'   => htmlspecialchars($this->input->post('telp', true)),
        ];
        return $this->db->insert($this->_table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function editData()
    {
        $id = $this->input->post('id');
        $data = [
            'nik'    => htmlspecialchars($this->input->post('nik', true)),
            'name'   => htmlspecialchars($this->input->post('name', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'telp'   => htmlspecialchars($this->input->post('telp', true)),
        ];
        return $this->db->update($this->_table, $data, array($this->primary => $id));
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->_table);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Kustomer Berhasil DiDelete");
        }
    }


}
