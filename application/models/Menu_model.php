<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECt `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

        return $this->db->query($query)->result_array();
    }
    public function delete_menu($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table,);
    }
    public function delete_submenu($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table,);
    }
    public function edit_menu($id)
    {
        $result = $this->db->where('id', $id)->get('user_menu');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function edit_submenu($id)
    {
        $result = $this->db->where('id', $id)->get('user_sub_menu');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
