<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Data_model', 'data');
        $this->load->helper('string');
        $this->load->library('pagination');
    }
    public function dataviewers()
    {
        $data['title'] = 'Viewers Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataviewers'] = $this->data->viewers();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('data/data-viewers', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $birthdate = $this->input->post('birthdate');
            $gender = $this->input->post('gender');
            $role_id = $this->input->post('role_id');
            $date_created = date('Y-m-d');
            $is_active = $this->input->post('is_active');

            $upload_image = $_FILES['image']['name'];
            if ($upload_image = '') {
            } else {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/dashboard_admin/img/profile/';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                } else {
                    $upload_image = $this->upload->data('file_name');
                }
            }
            $data = array(
                'name' => $name,
                'email' => $email,
                'image' => $upload_image,
                'password' => $password,
                'birthdate' => $birthdate,
                'gender' => $gender,
                'role_id' => $role_id,
                'date_created' => $date_created,
                'is_active' => $is_active

            );
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User successfully added! </div>');
            redirect('data/dataviewers');
        }
    }
    public function detail_viewers($id)
    {

        $data['title'] = 'Detail Viewers';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detailviewers = $this->data->detail_viewers($id);
        $data['detailviewers'] = $detailviewers;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('data/detail-viewers', $data);
        $this->load->view('templates/admin_footer');
    }
    public function edit_viewers($id)
    {
        $data['title'] = 'Edit viewers';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['editviewers'] = $this->data->edit($where, 'user')->result();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('data/edit-viewers', $data);
        $this->load->view('templates/admin_footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $birthdate = $this->input->post('birthdate');
        $gender = $this->input->post('gender');
        $country = $this->input->post('country');
        $city = $this->input->post('city');
        $address = $this->input->post('address');
        $postcode = $this->input->post('postcode');
        $phone = $this->input->post('phone');
        $role = $this->input->post('role_id');
        $active = $this->input->post('is_active');

        $data = array(
            'name' => $name,
            'email' => $email,
            'birthdate' => $birthdate,
            'gender' => $gender,
            'country' => $country,
            'city' => $city,
            'address' => $address,
            'postcode' => $postcode,
            'phone' => $phone,
            'role_id' => $role,
            'is_active' => $active
        );
        $where = array(
            'id' => $id
        );
        $this->data->update($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Viewers profile successfully update! </div>');
        redirect('data/dataviewers');
    }
    public function datagallery()
    {
        $data['title'] = 'Gallery Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['gallery'] = $this->data->gallery();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('captions', 'Captions', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('data/datagallery', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $captions = $this->input->post('captions');
            $category = $this->input->post('category');
            $type = $this->input->post('type');
            $date = date('Y-m-d');
            if ($this->input->post('0') !== null) {
                $status = '0';
            }else {
                $status = '1';
            }

            $upload_image = $_FILES['image']['name'];

            if ($upload_image = '') {
            } else {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/dashboard_admin/img/gallery/';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                } else {
                    $upload_image = $this->upload->data('file_name');
                }

                $data = array(
                    'name' => $name,
                    'captions' => $captions,
                    'image' => $upload_image,
                    'category' => $category,
                    'type' => $type,
                    'date' => $date,
                    'status' => $status
                );
                $this->data->insertgallery($data, 'gallery');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Photo successfully added! </div>');
                redirect(base_url('data/datagallery', 'refresh'));
            }
        }
    }
    public function detailgallery($id)
    {

        $data['title'] = 'Detail Photo';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detailgallery = $this->data->detailgallery($id);
        $data['detailgallery'] = $detailgallery;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('data/detail-gallery', $data);
        $this->load->view('templates/admin_footer');
    }
    public function editgallery($id)
    {
        $data['title'] = 'Edit Gallery';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['editgallery'] = $this->data->edit($where, 'gallery')->result();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('data/edit-gallery', $data);
        $this->load->view('templates/admin_footer');
    }
    public function updategallery()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $type = $this->input->post('type');
        $captions = $this->input->post('captions');

        $data = array(
            'name' => $name,
            'category' => $category,
            'type' => $type,
            'captions' => $captions,
        );
        $where = array(
            'id' => $id
        );
        $this->data->update($where, $data, 'gallery');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Photo successfully update! </div>');
        redirect('data/datagallery');
    }
    public function dataphotography()
    {
        $data['title'] = 'Photography Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['photography'] = $this->data->photography();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('captions', 'Captions', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('data/data-photography', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $captions = $this->input->post('captions');
            $category = $this->input->post('category');
            $type = $this->input->post('type');
            $date = date('Y-m-d');
            if ($this->input->post('0') !== null) {
                $status = '0';
            }else {
                $status = '1';
            }

            $upload_image = $_FILES['image']['name'];

            if ($upload_image = '') {
            } else {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/dashboard_admin/img/gallery/';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                } else {
                    $upload_image = $this->upload->data('file_name');
                }

                $data = array(
                    'name' => $name,
                    'captions' => $captions,
                    'image' => $upload_image,
                    'category' => $category,
                    'type' => $type,
                    'date' => $date,
                    'status' => $status
                );
                $this->data->insertgallery($data, 'gallery');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Photo successfully added! </div>');
                redirect(base_url('data/dataphotography', 'refresh'));
            }
        }
    }
    public function detailphotography($id)
    {

        $data['title'] = 'Detail photography';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detailphotography = $this->data->detailphotography($id);
        $data['detailphotography'] = $detailphotography;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('data/detail-photography', $data);
        $this->load->view('templates/admin_footer');
    }
    public function editphotography($id)
    {
        $data['title'] = 'Edit photography';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['editphotography'] = $this->data->edit($where, 'gallery')->result();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('data/edit-photography', $data);
        $this->load->view('templates/admin_footer');
    }
    public function updatephotography()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $type = $this->input->post('type');
        $captions = $this->input->post('captions');

        $data = array(
            'name' => $name,
            'category' => $category,
            'type' => $type,
            'captions' => $captions,
        );
        $where = array(
            'id' => $id
        );
        $this->data->update($where, $data, 'gallery');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Photo successfully update! </div>');
        redirect('data/dataphotography');
    }
    public function mywork()
    {
        $data['title'] = 'Work Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['work'] = $this->data->work();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('captions', 'Captions', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('data/mywork', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $captions = $this->input->post('captions');
            $category = $this->input->post('category');
            $type = $this->input->post('type');
            $date = date('Y-m-d');
            if ($this->input->post('0') !== null) {
                $status = '0';
            }else {
                $status = '1';
            }

            $upload_image = $_FILES['image']['name'];

            if ($upload_image = '') {
            } else {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/dashboard_admin/img/gallery/';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                } else {
                    $upload_image = $this->upload->data('file_name');
                }

                $data = array(
                    'name' => $name,
                    'captions' => $captions,
                    'image' => $upload_image,
                    'category' => $category,
                    'type' => $type,
                    'date' => $date,
                    'status' => $status
                );
                $this->data->insertgallery($data, 'gallery');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Photo successfully added! </div>');
                redirect(base_url('data/mywork', 'refresh'));
            }
        }
    }
    public function detailwork($id)
    {

        $data['title'] = 'Detail Work';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detailwork = $this->data->detailwork($id);
        $data['detailwork'] = $detailwork;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('data/detail-work', $data);
        $this->load->view('templates/admin_footer');
    }
    public function editwork($id)
    {
        $data['title'] = 'Edit Work';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['editwork'] = $this->data->edit($where, 'gallery')->result();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('data/edit-work', $data);
        $this->load->view('templates/admin_footer');
    }
    public function updatework()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $type = $this->input->post('type');
        $captions = $this->input->post('captions');

        $data = array(
            'name' => $name,
            'category' => $category,
            'type' => $type,
            'captions' => $captions,
        );
        $where = array(
            'id' => $id
        );
        $this->data->update($where, $data, 'gallery');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Photo successfully update! </div>');
        redirect('data/mywork');
    }
    public function deleteuser($id)
    {
        $url = $_SERVER['HTTP_REFERER'];
        $where = array('id' => $id);
        $this->data->delete($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User successfully Delete! </div>');
        redirect($url);
    }
    public function deletegallery($id)
    {
        $url = $_SERVER['HTTP_REFERER'];
        
        $where = array('id' => $id);
        $image = $this->db->get_where('gallery', array('id' => $id))->row();
        $file = ('./assets/dashboard_admin/img/gallery/' .$image->image);
        if(is_readable($file) && unlink($file)){
            $this->data->delete($where, 'gallery');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Photo Successfully Delete! </div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Photo Failed to Delete! </div>');
        }
        redirect($url);
    }
    public function deletephotography($id)
    {
        $url = $_SERVER['HTTP_REFERER'];

        $where = array('id' => $id);
        $image = $this->db->get_where('gallery', array('id' => $id))->row();
        $file = ('./assets/dashboard_admin/img/gallery/' .$image->image);
        if(is_readable($file) && unlink($file)){
            $this->data->delete($where, 'gallery');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Photography Successfully Delete! </div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Photography Failed to Delete! </div>');
        }
        redirect($url);
    }
    public function deletework($id)
    {
        $url = $_SERVER['HTTP_REFERER'];

        $where = array('id' => $id);
        $image = $this->db->get_where('gallery', array('id' => $id))->row();
        $file = ('./assets/dashboard_admin/img/gallery/' .$image->image);
        if(is_readable($file) && unlink($file)){
            $this->data->delete($where, 'gallery');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Work Successfully Delete! </div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Work Failed to Delete! </div>');
        }
        redirect($url);
    }
    public function publishgallery($id)
    {
        $data = array(
            'status' => 1,
        );
        $where = array(
            'id' => $id
        );

        $this->data->update($where, $data, 'gallery');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your gallery has been published!  </div>');
        redirect('data/datagallery', 'refresh');
    }
    public function draftgallery($id)
    {
        $data = array(
            'status' => 0,
        );
        $where = array(
            'id' => $id
        );

        $this->data->update($where, $data, 'gallery');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your gallery has been drafted!  </div>');
        redirect('data/datagallery', 'refresh');
    }
    public function publishphotography($id)
    {
        $data = array(
            'status' => 1,
        );
        $where = array(
            'id' => $id
        );

        $this->data->update($where, $data, 'gallery');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your photography has been published!  </div>');
        redirect('data/dataphotography', 'refresh');
    }
    public function draftphotography($id)
    {
        $data = array(
            'status' => 0,
        );
        $where = array(
            'id' => $id
        );

        $this->data->update($where, $data, 'gallery');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your photography has been drafted!  </div>');
        redirect('data/dataphotography', 'refresh');
    }
    public function publishwork($id)
    {
        $data = array(
            'status' => 1,
        );
        $where = array(
            'id' => $id
        );

        $this->data->update($where, $data, 'gallery');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your work has been published!  </div>');
        redirect('data/mywork', 'refresh');
    }
    public function draftwork($id)
    {
        $data = array(
            'status' => 0,
        );
        $where = array(
            'id' => $id
        );

        $this->data->update($where, $data, 'gallery');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your work has been drafted!  </div>');
        redirect('data/mywork', 'refresh');
    }
}
