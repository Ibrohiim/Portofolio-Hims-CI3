<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Viewers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Viewers_model', 'viewers');
        $this->load->model('Admin_model', 'admin');
        $this->load->helper('string', 'download');
    }
    public function index()
    {
        $data['title'] = 'Hims Portfolio';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['slider'] = $this->db->get('slider')->result();
        $data['services'] = $this->db->get('services')->result();
        $data['about'] = $this->db->get('about')->row_array();
        $data['gallery'] = $this->viewers->recent_gallery()->result();
        $data['photography'] = $this->viewers->recent_photography()->result();
        $data['work'] = $this->viewers->recent_work()->result();
        $data['blog'] = $this->viewers->recent_blog()->result();

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/index');
        $this->load->view('templates/viewers_footer');
    }
    public function gallery()
    {
        $data['title'] = 'Gallery';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/Ibrohiim_Hims/viewers/gallery';
        $config['total_rows'] = $this->viewers->count_gallery();
        $config['per_page'] = 6;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['gallery'] = $this->viewers->gallery($config['per_page'], $data['start']);

        $data['countcomment'] = $this->viewers->countcomment();

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/gallery');
        $this->load->view('templates/viewers_footer');
    }
    public function previewgallery($id)
    {
        $data['title'] = 'Preview Gallery';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['previewgallery'] = $this->viewers->previewgallery($id);

        $this->load->helper('cookie');
        $checkvisitor = $this->input->cookie($id, FALSE);
        $ip = $this->input->ip_address();

        if($checkvisitor == false){
            $cookie = array(
                "name" => $id,
                "value" => $ip,
                "expire" => time() + 7200,
                "secure" => false
            );
            $this->input->set_cookie($cookie);
            $this->viewers->countergallery($id);
        }

        $id = $data['previewgallery']->id;
        $data['commentgallery'] = $this->viewers->getcommentgallery($id)->result();

        $where = array(
            'id_gallery' => $data['previewgallery']->id,
            'email_user' => $this->session->userdata('email')
        );
        $table = 'liked';
        $data['ceklike'] = $this->viewers->cekliked($table, $where)->num_rows();
        $table = 'dislike';
        $data['cekdislike'] = $this->viewers->cekliked($table, $where)->num_rows();

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/preview_gallery', $data);
        $this->load->view('templates/viewers_footer', $data);
    }
    public function photography()
    {
        $data['title'] = 'Photography';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/Ibrohiim_Hims/viewers/photography';
        $config['total_rows'] = $this->viewers->count_photography();
        $config['per_page'] = 6;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['photography'] = $this->viewers->photography($config['per_page'], $data['start']);

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/photography');
        $this->load->view('templates/viewers_footer');
    }
    public function previewphotography($id)
    {
        $data['title'] = 'Preview Photography';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['previewphotography'] = $this->viewers->previewphotography($id);

        $this->load->helper('cookie');
        $checkvisitor = $this->input->cookie($id, FALSE);
        $ip = $this->input->ip_address();

        if($checkvisitor == false){
            $cookie = array(
                "name" => $id,
                "value" => $ip,
                "expire" => time() + 7200,
                "secure" => false
            );
            $this->input->set_cookie($cookie);
            $this->viewers->countergallery($id);
        }

        $id = $data['previewphotography']->id;
        $data['commentgallery'] = $this->viewers->getcommentgallery($id)->result();

        $where = array(
            'id_gallery' => $data['previewphotography']->id,
            'email_user' => $this->session->userdata('email')
        );
        $table = 'liked';
        $data['ceklike'] = $this->viewers->cekliked($table, $where)->num_rows();
        $table = 'dislike';
        $data['cekdislike'] = $this->viewers->cekliked($table, $where)->num_rows();

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/preview_photography', $data);
        $this->load->view('templates/viewers_footer', $data);
    }
    public function work()
    {
        $data['title'] = 'My Work';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/Ibrohiim_Hims/viewers/work';
        $config['total_rows'] = $this->viewers->count_work();
        $config['per_page'] = 6;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['work'] = $this->viewers->work($config['per_page'], $data['start']);

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/work');
        $this->load->view('templates/viewers_footer');
    }
    public function previewwork($id)
    {
        $data['title'] = 'Preview Work';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['previewwork'] = $this->viewers->previewwork($id);

        $this->load->helper('cookie');
        $checkvisitor = $this->input->cookie($id, FALSE);
        $ip = $this->input->ip_address();

        if($checkvisitor == false){
            $cookie = array(
                "name" => $id,
                "value" => $ip,
                "expire" => time() + 7200,
                "secure" => false
            );
            $this->input->set_cookie($cookie);
            $this->viewers->countergallery($id);
        }

        $id = $data['previewwork']->id;
        $data['commentgallery'] = $this->viewers->getcommentgallery($id)->result();

        $where = array(
            'id_gallery' => $data['previewwork']->id,
            'email_user' => $this->session->userdata('email')
        );
        $table = 'liked';
        $data['ceklike'] = $this->viewers->cekliked($table, $where)->num_rows();
        $table = 'dislike';
        $data['cekdislike'] = $this->viewers->cekliked($table, $where)->num_rows();

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/preview_work', $data);
        $this->load->view('templates/viewers_footer', $data);
    }
    public function about()
    {
        $data['title'] = 'About Ibrohiim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['about'] = $this->db->get('about')->row_array();

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/about', $data);
        $this->load->view('templates/viewers_footer');
    }
    public function blog()
    {
        $data['title'] = 'My Blog';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/Ibrohiim_Hims/viewers/blog';
        $config['total_rows'] = $this->viewers->count_blog();
        $config['per_page'] = 6;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['blog'] = $this->viewers->blog($config['per_page'], $data['start']);

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/blog');
        $this->load->view('templates/viewers_footer');
    }
    public function previewblog($id)
    {
        $data['title'] = 'Preview Blog';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['previewblog'] = $this->viewers->previewblog($id);

        $this->load->helper('cookie');
        $checkvisitor = $this->input->cookie($id, FALSE);
        $ip = $this->input->ip_address();

        if($checkvisitor == false){
            $cookie = array(
                "name" => $id,
                "value" => $ip,
                "expire" => time() + 7200,
                "secure" => false
            );
            $this->input->set_cookie($cookie);
            $this->viewers->counter_blog($id);
        }

        $id = $data['previewblog']->id;
        $data['comment'] = $this->viewers->getcomment($id)->result();

        $where = array(
            'id_blog' => $data['previewblog']->id,
            'email_user' => $this->session->userdata('email')
        );
        $table = 'liked';
        $data['ceklike'] = $this->viewers->cekliked($table, $where)->num_rows();
        $table = 'dislike';
        $data['cekdislike'] = $this->viewers->cekliked($table, $where)->num_rows();

        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/preview_blog', $data);
        $this->load->view('templates/viewers_footer', $data);
    }
    public function commentblog()
    {
        $data = array(
            'id_blog' => $this->input->post('id'),
            'id_user' => $this->input->post('id_user'),
            'comments' => $this->input->post('comments'),
            'date' => date('Y-m-d'),
            'status' => 1,
        );

        $insert = $this->viewers->insertcomment($data, 'comment_blog');

        $url = $_SERVER['HTTP_REFERER'];

        if($insert){
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Managed to add comments! </div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert"> Failed to add a comment! </div>');
        }
        redirect($url);
    }
    public function commentgallery()
    {
        $url = $_SERVER['HTTP_REFERER'];
        $data = array(
            'id_gallery' => $this->input->post('id'),
            'id_user' => $this->input->post('id_user'),
            'comments' => $this->input->post('comments'),
            'date' => date('Y-m-d'),
            'status' => 1,
        );

        $insert = $this->viewers->insertcomment($data, 'comment_gallery');

        if($insert){
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Managed to add comments! </div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert"> Failed to add a comment! </div>');
        }
        redirect($url);
    }
    public function contact()
    {
        $data['title'] = 'Contact Ibrohiim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['about'] = $this->db->get('about')->row_array();

        $url = $_SERVER['HTTP_REFERER'];
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/viewers_header', $data);
            $this->load->view('viewers/contact', $data);
            $this->load->view('templates/viewers_footer', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'message_time' => date('Y-m-d')
            ];
            $this->db->insert('contact', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Message sent successfully! </div>');
            redirect($url);
        }
    }
    public function services()
    {
        $data['title'] = 'Services';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['services'] = $this->db->get('services')->result();
        $data['gallery'] = $this->viewers->recent_gallery()->result();
        $data['photography'] = $this->viewers->recent_photography()->result();
        $data['work'] = $this->viewers->recent_work()->result();
        //$data['blog'] = $this->viewers->robusta_home()->result();
        
        $this->load->view('templates/viewers_header', $data);
        $this->load->view('viewers/services');
        $this->load->view('templates/viewers_footer');
    }
    function downloadgallery($id)
	{
		$data = $this->db->get_where('gallery',['id'=>$id])->row();
		force_download('./assets/dashboard_admin/img/gallery/'.$data->image,NULL);
    }
    function downloadcv($id)
	{
		$data = $this->db->get_where('about',['id'=>$id])->row();
		force_download('./assets/dashboard_admin/img/about/'.$data->cv,NULL);
    }
    public function like($id)
    {
        $url = $_SERVER['HTTP_REFERER'];
        $data = array(
            'id_gallery' => $id,
            'email_user'    => $this->session->userdata('email')
        );

        $table = 'dislike';
        $cek = $this->viewers->cekliked($table, $data)->num_rows();
        if($cek > 0){
            $datalike = $this->viewers->cekliked($table, $data)->row();
            $where = array(
                'id' => $datalike->id
            );
            $delete = $this->viewers->delete($table, $where);
            if($delete){
                $this->viewers->reducedislike($id);
            }
        }
        $insert = $this->db->insert('liked', $data);
        if($insert){
            $this->viewers->counterlike($id);
        }
        redirect($url);
    }
    public function dislike($id)
    {
        $url = $_SERVER['HTTP_REFERER'];
        $data = array(
            'id_gallery' => $id,
            'email_user'    => $this->session->userdata('email')
        );

        $table = 'liked';
        $cek = $this->viewers->cekliked($table, $data)->num_rows();
        if($cek > 0){
            $datalike = $this->viewers->cekliked($table, $data)->row();
            $where = array(
                'id' => $datalike->id
            );
            $delete = $this->viewers->delete($table, $where);
            if($delete){
                $this->viewers->reducelike($id);
            }
        }
        $insert = $this->db->insert('dislike', $data);
        if($insert){
            $this->viewers->counterdislike($id);
        }
        redirect($url);
    }
    public function likeblog($id)
    {
        $url = $_SERVER['HTTP_REFERER'];
        $data = array(
            'id_blog' => $id,
            'email_user'    => $this->session->userdata('email')
        );

        $table = 'dislike';
        $cek = $this->viewers->cekliked($table, $data)->num_rows();
        if($cek > 0){
            $datalike = $this->viewers->cekliked($table, $data)->row();
            $where = array(
                'id' => $datalike->id
            );
            $delete = $this->viewers->delete($table, $where);
            if($delete){
                $this->viewers->reducedislikeblog($id);
            }
        }
        $insert = $this->db->insert('liked', $data);
        if($insert){
            $this->viewers->counterlikeblog($id);
        }
        redirect($url);
    }
    public function dislikeblog($id)
    {
        $url = $_SERVER['HTTP_REFERER'];
        $data = array(
            'id_blog' => $id,
            'email_user'    => $this->session->userdata('email')
        );

        $table = 'liked';
        $cek = $this->viewers->cekliked($table, $data)->num_rows();
        if($cek > 0){
            $datalike = $this->viewers->cekliked($table, $data)->row();
            $where = array(
                'id' => $datalike->id
            );
            $delete = $this->viewers->delete($table, $where);
            if($delete){
                $this->viewers->reducelikeblog($id);
            }
        }
        $insert = $this->db->insert('dislike', $data);
        if($insert){
            $this->viewers->counterdislikeblog($id);
        }
        redirect($url);
    }
}
