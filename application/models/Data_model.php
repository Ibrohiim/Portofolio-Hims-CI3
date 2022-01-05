<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

    public function userGender()
    {
        $query = "SELECT Gender, count(*) as number FROM user GROUP BY Gender";
        return $this->db->query($query)->result_array();
    }
    public function detail_viewers($id = null)
    {
        $query = $this->db->get_where('user', array('id' => $id))->row();
        return $query;
    }
    public function detailgallery($id = null)
    {
        $query = $this->db->get_where('gallery', array('id' => $id))->row();
        return $query;
    }
    public function detailphotography($id = null)
    {
        $query = $this->db->get_where('gallery', array('id' => $id))->row();
        return $query;
    }
    public function detailwork($id = null)
    {
        $query = $this->db->get_where('gallery', array('id' => $id))->row();
        return $query;
    }
    public function viewers()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('user')->result_array();
    }
    public function count_viewers()
    {
        return $this->db->get('user')->num_rows();
    }
    public function gallery()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('gallery', array('category' => '1'))->result_array();
    }
    public function count_gallery()
    {
        return $this->db->get_where('gallery', array('category' => '1'))->num_rows();
    }
    public function photography()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('gallery', array('category' => '2'))->result_array();
    }
    public function count_photography()
    {
        return $this->db->get_where('gallery', array('category' => '2'))->num_rows();
    }
    public function work()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('gallery', array('category' => '3'))->result_array();
    }
    public function count_work()
    {
        return $this->db->get_where('gallery', array('category' => '3'))->num_rows();
    }
    public function insertgallery($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table,);
    }
}
