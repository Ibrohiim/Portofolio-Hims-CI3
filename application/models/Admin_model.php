<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getDatauser()
    {
        $query = "SELECt `user`.*, `user_role`.`role`
                FROM `user` JOIN `user_role`
                ON `user`.`role_id` = `user_role`.`id`";
        return $this->db->query($query)->result_array();
    }
    public function userGender()
    {
        $query = "SELECT Gender, count(*) as number FROM user GROUP BY Gender";
        return $this->db->query($query)->result_array();
    }
    public function delete_role($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public $table = 'contact';
    public $id = 'id';
    public function contact()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('contact')->result();
    }
    public function read($id)
    {
        $result = $this->db->where('id', $id)->limit(1)->get('contact');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function send($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function slider()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('slider')->result_array();
    }
    public function count_slider()
    {
        return $this->db->get('slider')->num_rows();
    }
    public function services()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('services')->result_array();
    }
    public function count_services()
    {
        return $this->db->get('services')->num_rows();
    }
    public function blog()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('blog')->result_array();
    }
    public function count_blog()
    {
        return $this->db->get('blog')->num_rows();
    }
    public function detail_blog($id = null)
    {
        $query = $this->db->get_where('blog', array('id' => $id))->row();
        return $query;
    }
    public function insert($data, $table)
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
    public function notif()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->db->select('contact.*,user.email')
            ->from('contact')
            ->join('user', 'user.email = contact.email', 'left')
            ->group_by('contact.id')
            ->order_by('id', 'desc')
            ->limit(5, 0);
        $query = $this->db->get();
        return $query->result();
    }
}
