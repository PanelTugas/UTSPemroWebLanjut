<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Model_CRUD extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

//untuk menampilkan semua data

    public function get_all()
    {
        $this->db->from($this->table);
        $this->db->order_by($this->id,'DESC'); 
        $query=$this->db->get();
        return $query->result();
    }

//untuk menampilkan semua data sesuai id

public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->id,$id);
        $query = $this->db->get();

        return $query->row();
    }
    
//untuk insert semua data

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

//untuk update data

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

//untuk delete data

    public function delete_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }


}
