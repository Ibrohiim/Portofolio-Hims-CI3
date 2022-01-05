<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Data_model', 'data');
        $this->load->model('Viewers_model', 'viewers');
    }
    public function index()
    {
        $data['title'] = 'User Profile';
        $data['icon'] = 'fas fa-fw fa-user';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['photos'] = $this->data->count_gallery();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/admin_footer');
    }
    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['icon'] = 'fas fa-fw fa-user-edit';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('nickname', 'Nickname', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $nickname = $this->input->post('nickname');
            $email = $this->input->post('email');
            $birthdate = $this->input->post('birthdate');
            $gender = $this->input->post('gender');
            $country = $this->input->post('country');
            $city = $this->input->post('city');
            $address = $this->input->post('address');
            $postcode = $this->input->post('postcode');
            $phone = $this->input->post('phone');
            $campus = $this->input->post('campus');
            $about = $this->input->post('about');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '0';
                $config['upload_path'] = './assets/dashboard_admin/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'defaultmale.jpg') {
                        unlink(FCPATH . 'assets/dashboard_admin/img/profile/' . $old_image);
                    }
                    $new = $this->upload->data();

                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = 'assets/dashboard_admin/img/profile/' . $new['file_name'];
                    $config2['width'] = "624";
                    $config2['height'] = "624";
                    $config2['maintain_ratio'] = false;
                    $config2['x_axis'] = '1';
                    $config2['y_axis'] = '1';

                    $config2['new_image'] = 'assets/dashboard_admin/img/profile/' . $new['file_name'];

                    $this->load->library('image_lib', $config2);
                    $this->image_lib->crop();

                    $new_image = $this->upload->data('file_name');

                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('nickname', $nickname);
            $this->db->set('birthdate', $birthdate);
            $this->db->set('gender', $gender);
            $this->db->set('country', $country);
            $this->db->set('city', $city);
            $this->db->set('address', $address);
            $this->db->set('postcode', $postcode);
            $this->db->set('phone', $phone);
            $this->db->set('campus', $campus);
            $this->db->set('about', $about);
            $this->db->set('image', $new_image);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Your profile has been updated!  </div>');
            redirect('user');
        }
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['icon'] = 'fas fa-fw fa-key';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong Current Password!  </div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New password cannot be the same as current password!  </div>');
                    redirect('user/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Changed!  </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
    public function preferredphoto()
    {
        $data['title'] = 'Preferred Photos';
        $data['icon'] = 'fas fa-fw fa-thumbs-up';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $table = 'liked';
        $where = array(
            'email_user' => $data['user']['email']
        );
        $data['liked'] = $this->viewers->showpreferred($table, $where)->result();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/preferred-photo', $data);
        $this->load->view('templates/admin_footer');
    }
    public function dislikedphotos()
    {
        $data['title'] = 'Disliked Photos';
        $data['icon'] = 'fas fa-fw fa-thumbs-down';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $table = 'dislike';
        $where = array(
            'email_user' => $data['user']['email']
        );
        $data['dislike'] = $this->viewers->showdislike($table, $where)->result();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/disliked-photos', $data);
        $this->load->view('templates/admin_footer');
    }
}
