<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Viewers_model extends CI_Model
{
    public function recent_gallery()
    {
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(4, 0);
        return $this->db->get_where('gallery', array('category' => '1'));
    }
    public function recent_photography()
    {
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(4, 0);
        return $this->db->get_where('gallery', array('category' => '2'));
    }
    public function recent_work()
    {
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(4, 0);
        return $this->db->get_where('gallery', array('category' => '3'));
    }
    public function gallery($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('gallery', array('category' => '1'), $limit, $start)->result_array();
    }
    public function photography($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('gallery', array('category' => '2'), $limit, $start)->result_array();
    }
    public function work($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('gallery', array('category' => '3'), $limit, $start)->result_array();
    }
    public function blog($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('blog', $limit, $start)->result_array();
    }
    public function count_gallery()
    {
        return $this->db->get_where('gallery', array('category' => '1'))->num_rows();
    }
    public function countcomment()
    {
        return $this->db->get_where('comment_gallery', array('id_gallery'))->num_rows();
    }
    public function count_photography()
    {
        return $this->db->get_where('gallery', array('category' => '2'))->num_rows();
    }
    public function count_work()
    {
        return $this->db->get_where('gallery', array('category' => '3'))->num_rows();
    }
    public function count_blog()
    {
        return $this->db->get('blog')->num_rows();
    }
    public function previewgallery($id)
    {
        $result = $this->db->where('id', $id)->get('gallery');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function previewphotography($id)
    {
        $result = $this->db->where('id', $id)->get('gallery');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function previewwork($id)
    {
        $result = $this->db->where('id', $id)->get('gallery');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function previewblog($id)
    {
        $result = $this->db->where('id', $id)->get('blog');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function recent_blog()
    {
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(4, 0);
        return $this->db->get('blog');
    }
    public function counter_blog($id)
    {
        $this->db->where('id', $id);
        $this->db->select('preview');
        $count = $this->db->get('blog')->row();

        $this->db->where('id', $id);
        $this->db->set('preview', ($count->preview + 1));
        $this->db->update('blog');
    }
    public function countergallery($id)
    {
        $this->db->where('id', $id);
        $this->db->select('preview');
        $count = $this->db->get('gallery')->row();

        $this->db->where('id', $id);
        $this->db->set('preview', ($count->preview + 1));
        $this->db->update('gallery');
    }
    public function insertcomment($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    public function getcomment($id)
    {
        $this->db->select('*, comment_blog.id AS id_comment, user.image AS image_user, comment_blog.date AS date_comment, comment_blog.status AS status_comment,');
        $this->db->join('user','user.id=comment_blog.id_user');
        $this->db->join('blog','blog.id=comment_blog.id_blog');
        return $this->db->get_where('comment_blog', array('comment_blog.id_blog' => $id));
    }
    public function getcommentgallery($id)
    {
        $this->db->select('*, comment_gallery.id AS id_comment, user.image AS image_user, comment_gallery.date AS date_comment, comment_gallery.status AS status_comment, 
        user.name AS user_name');
        $this->db->join('user','user.id=comment_gallery.id_user');
        $this->db->join('gallery','gallery.id=comment_gallery.id_gallery');
        return $this->db->get_where('comment_gallery', array('comment_gallery.id_gallery' => $id));
    }
    public function cekliked($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function delete($table, $where)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }
    public function counterlike($id)
    {
        $this->db->where('id', $id);
        $this->db->select('likegallery');
        $count = $this->db->get('gallery')->row();

        $this->db->where('id', $id);
        $this->db->set('likegallery', ($count->likegallery + 1));
        $this->db->update('gallery');
    }
    public function counterdislike($id)
    {
        $this->db->where('id', $id);
        $this->db->select('dislike');
        $count = $this->db->get('gallery')->row();

        $this->db->where('id', $id);
        $this->db->set('dislike', ($count->dislike + 1));
        $this->db->update('gallery');
    }
    public function counterlikeblog($id)
    {
        $this->db->where('id', $id);
        $this->db->select('like_blog');
        $count = $this->db->get('blog')->row();

        $this->db->where('id', $id);
        $this->db->set('like_blog', ($count->like_blog + 1));
        $this->db->update('blog');
    }
    public function counterdislikeblog($id)
    {
        $this->db->where('id', $id);
        $this->db->select('donotlike');
        $count = $this->db->get('blog')->row();

        $this->db->where('id', $id);
        $this->db->set('donotlike', ($count->donotlike + 1));
        $this->db->update('blog');
    }
    public function reducelike($id)
    {
        $this->db->where('id', $id);
        $this->db->select('likegallery');
        $count = $this->db->get('gallery')->row();

        $this->db->where('id', $id);
        $this->db->set('likegallery', ($count->likegallery - 1));
        $this->db->update('gallery');
    }
    public function reducedislike($id)
    {
        $this->db->where('id', $id);
        $this->db->select('dislike');
        $count = $this->db->get('gallery')->row();

        $this->db->where('id', $id);
        $this->db->set('dislike', ($count->dislike - 1));
        $this->db->update('gallery');
    }
    public function reducelikeblog($id)
    {
        $this->db->where('id', $id);
        $this->db->select('like_blog');
        $count = $this->db->get('blog')->row();

        $this->db->where('id', $id);
        $this->db->set('like_blog', ($count->like_blog - 1));
        $this->db->update('blog');
    }
    public function reducedislikeblog($id)
    {
        $this->db->where('id', $id);
        $this->db->select('donotlike');
        $count = $this->db->get('blog')->row();

        $this->db->where('id', $id);
        $this->db->set('donotlike', ($count->donotlike - 1));
        $this->db->update('blog');
    }
    public function showpreferred($table, $where)
    {
        $this->db->select('*, gallery.image AS gallery_image, gallery.name AS gallery_name, gallery.id AS gallery_id');
        $this->db->join('gallery', $table.'.id_gallery=gallery.id');
        $this->db->join('user', $table.'.email_user=user.email');
        return $this->db->get_where($table, $where);
    } 
    public function showdislike($table, $where)
    {
        $this->db->select('*, gallery.image AS gallery_image, gallery.name AS gallery_name, gallery.id AS gallery_id');
        $this->db->join('gallery', $table.'.id_gallery=gallery.id');
        $this->db->join('user', $table.'.email_user=user.email');
        return $this->db->get_where($table, $where);
    }
}
