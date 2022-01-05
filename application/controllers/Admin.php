<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $ip    = $this->input->ip_address();
        $date  = date("Y-m-d");
        $time = time();
        $timeinsert = date("Y-m-d H:i:s");
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
        $ss = isset($s)?($s):0;
        if ($ss == 0) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$time."','".$timeinsert."')");
        }
        else{
        $this->db->query("UPDATE visitor SET hits=hits+1, online='".$time."' WHERE ip='".$ip."' AND date='".$date."'");
        }
        $visitorstoday  = $this->db->query("SELECT * FROM visitor WHERE date='".$date."' GROUP BY ip")->num_rows();
        $dbvisitor = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row(); 
        $totalvisitors = isset($dbvisitor->hits)?($dbvisitor->hits):0;
        $timelimit = time() - 300;
        $onlinevisitors  = $this->db->query("SELECT * FROM visitor WHERE online > '".$timelimit."'")->num_rows();
        $data['visitorstoday']=$visitorstoday;
        $data['totalvisitors']=$totalvisitors;
        $data['onlinevisitors']=$onlinevisitors;

        $data['viewers'] = $this->data->count_viewers();
        $data['gallery'] = $this->data->count_gallery();
        $data['photography'] = $this->data->count_photography();
        $data['work'] = $this->data->count_work();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/admin_footer');
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/admin_footer');
    }
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access Changed!  </div>');
    }
    public function editRole($role_id)
    {
        $data['title'] = 'Edit User Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/editrole', $data);
        $this->load->view('templates/admin_footer');
    }
    public function message()
    {
        $data['title'] = 'Message';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['message'] = $this->admin->contact();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/message', $data);
        $this->load->view('templates/admin_footer');
    }
    public function read_message($id)
    {
        $data['title'] = 'Read Message';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['message'] = $this->admin->contact();
        $data['contact'] = $this->admin->read($id);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/read_message', $data);
        $this->load->view('templates/admin_footer');
    }
    public function compose($id)
    {
        $data['title'] = 'Compose Message';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['message'] = $this->admin->contact();
        $data['contact'] = $this->admin->send($where, 'contact')->result();


        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/compose', $data);
        $this->load->view('templates/admin_footer');
    }
    public function compose_action()
    {
        $config = [
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ibrohimshims@gmail.com',
            'smtp_pass' => 'ibrohiim1999',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);
        $this->email->from('ibrohimshims@gmail.com', 'Ibrohiim');
        $this->email->to($this->input->post('email'));
        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('message'));
        $this->email->send();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Message sent successfully! </div>');
        redirect('admin/message');
    }
    public function delete_message($id)
    {
        $where = array('id' => $id);
        $this->admin->delete($where, 'contact');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Message successfully Delete! </div>');
        redirect('admin/message');
    }
    public function about()
    {
        $data['title'] = 'About Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['about'] = $this->db->get('about')->row_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/about', $data);
        $this->load->view('templates/admin_footer');
    }
    public function edit_about()
    {
        $data['title'] = 'Edit About';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['about'] = $this->db->get('about')->row_array();
        
        $this->form_validation->set_rules('name', 'Image Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/edit_about', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $birthdate = $this->input->post('birthdate');
            $gender = $this->input->post('gender');
            $country = $this->input->post('country');
            $city = $this->input->post('city');
            $address = $this->input->post('address');
            $postalcode = $this->input->post('postalcode');
            $phone = $this->input->post('phone');
            $description = $this->input->post('description');

            $front_image = $_FILES['front_image']['name'];
            if ($front_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/dashboard_admin/img/about/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('front_image')) {
                    $old_image = $data['about']['front_image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dashboard_admin/img/about/' . $old_image);
                    }
                    $front_image = $this->upload->data('file_name');
                    $this->db->set('front_image', $front_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $upload_background = $_FILES['background']['name'];
            if ($upload_background) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/dashboard_admin/img/about/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('background')) {
                    $old_image = $data['about']['background'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dashboard_admin/img/about/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('background', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $upload_cv = $_FILES['cv']['name'];
            if ($upload_cv) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/dashboard_admin/img/about/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('cv')) {
                    $old_image = $data['about']['cv'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dashboard_admin/img/about/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('cv', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('email', $email);
            $this->db->set('birthdate', $birthdate);
            $this->db->set('gender', $gender);
            $this->db->set('country', $country);
            $this->db->set('city', $city);
            $this->db->set('address', $address);
            $this->db->set('postalcode', $postalcode);
            $this->db->set('phone', $phone);
            $this->db->set('description', $description);

            $this->db->update('about');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Your profile has been updated!  </div>');
            redirect('admin/about');
        }
    }
    public function slider()
    {
        $data['title'] = 'Slider Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['slider'] = $this->admin->slider();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/slider_dashboard', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $link = $this->input->post('link');
            $is_active = 0;
            $date_created = date('Y-m-d');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image = '') {
            } else {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/dashboard_admin/img/slider/';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                } else {
                    $upload_image = $this->upload->data('file_name');
                }

                $data = array(
                    'name' => $name,
                    'image' => $upload_image,
                    'title' => $title,
                    'content' => $content,
                    'link' => $link,
                    'is_active' => $is_active,
                    'date_created' => $date_created
                );
                $this->admin->insert($data, 'slider');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Slider successfully added! </div>');
                redirect('admin/slider');
            }
        }
    }
    public function edit_slider($id)
    {
        $data['title'] = 'Edit Slider';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['editslider'] = $this->admin->edit($where, 'slider')->result();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/edit_slider', $data);
        $this->load->view('templates/admin_footer');
    }
    public function update_slider()
    {
        $data['slider'] = $this->db->get('slider')->row_array();

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $link = $this->input->post('link');
        $is_active = $this->input->post('is_active');

        $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/dashboard_admin/img/slider/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['slider']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dashboard_admin/img/slider/' . $old_image);
                    }


                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'name' => $name,
            'title' => $title,
            'content' => $content,
            'link' => $link,
            'is_active' => $is_active,
        );
        $where = array(
            'id' => $id
        );
        $this->admin->update($where, $data, 'slider');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Slider successfully update! </div>');
        redirect('admin/slider');
    }
    public function deleteslider($id)
    {
        $url = $_SERVER['HTTP_REFERER'];

        $where = array('id' => $id);
        $image = $this->db->get_where('slider', array('id' => $id))->row();
        $file = ('./assets/dashboard_admin/img/slider/' .$image->image);
        if(is_readable($file) && unlink($file)){
            $this->admin->delete($where, 'slider');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Slider Successfully Delete! </div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Slider Failed to Delete! </div>');
        }
        redirect($url);
    }
    public function services()
    {
        $data['title'] = 'Services Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['services'] = $this->admin->services();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/services', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $icon = $this->input->post('icon');
            $description = $this->input->post('description');
            $is_active = 0;
            $date_created = date('Y-m-d');

                $data = array(
                    'name' => $name,
                    'icon' => $icon,
                    'description' => $description,
                    'is_active' => $is_active,
                    'date_created' => $date_created
                );
                $this->admin->insert($data, 'services');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Services successfully added! </div>');
                redirect('admin/services');
        }
    }
    public function edit_services($id)
    {
        $data['title'] = 'Edit Services';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['editservices'] = $this->admin->edit($where, 'services')->result();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/edit_services', $data);
        $this->load->view('templates/admin_footer');
    }
    public function update_services()
    {
        $data['services'] = $this->db->get('services')->row_array();

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $icon = $this->input->post('icon');
        $description = $this->input->post('description');
        $is_active = $this->input->post('is_active');

        $data = array(
            'name' => $name,
            'icon' => $icon,
            'description' => $description,
            'is_active' => $is_active,
        );
        $where = array(
            'id' => $id
        );
        $this->admin->update($where, $data, 'services');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Services successfully update! </div>');
        redirect('admin/services');
    }
    public function deleteservices($id)
    {
        $where = array('id' => $id);
        $this->admin->delete($where, 'services');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Services Successfully Delete! </div>');
        redirect('admin/services');
    }
    public function blogadmin()
    {
        $data['title'] = 'Blog Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['blog'] = $this->admin->blog();

            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/blog_admin', $data);
            $this->load->view('templates/admin_footer');
    }
    public function addblog()
    {
        $data['title'] = 'Add Blog';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/add_blog', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $title = $this->input->post('title');
            $slug = str_replace(' ','-', $this->input->post('slug')); 
            $contents = $this->input->post('contents');
            $category = $this->input->post('category');
            $tag = $this->input->post('tag');
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
                $config['upload_path'] = './assets/dashboard_admin/img/blog/';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                } else {
                    $upload_image = $this->upload->data('file_name');
                }
            }
            $data = array(
                'title' => $title,
                'slug' => $slug,
                'image' => $upload_image,
                'contents' => $contents,
                'tag' => $tag,
                'category' => $category,
                'date' => $date,
                'status' => $status,

            );
            $this->db->insert('blog', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Blog successfully added! </div>');
            redirect('admin/blogadmin');
        }
    }
    public function detail_blog($id)
    {

        $data['title'] = 'Detail Blog';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detailblog = $this->admin->detail_blog($id);
        $data['detailblog'] = $detailblog;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/detail_blog', $data);
        $this->load->view('templates/admin_footer');
    }
    public function edit_blog($id)
    {
        $data['title'] = 'Edit Blog';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['editblog'] = $this->admin->edit($where, 'blog')->result();
        
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/edit_blog', $data);
            $this->load->view('templates/admin_footer');
    }
    public function update_blog()
    {
        $data['blog'] = $this->db->get('blog')->row_array();

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $slug = str_replace(' ','-', $this->input->post('slug')); 
        $contents = $this->input->post('contents');
        $category = $this->input->post('category');
        $tag = $this->input->post('tag');
        $date = date('Y-m-d');
        if ($this->input->post('0') !== null) {
            $status = '0';
        }elseif ($this->input->post('1') !== null) {
            $status = '1';
        }else{
            $status = $this->input->post('status');
        }

        $image = $_FILES['image']['name'];
        if ($image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '5048';
            $config['upload_path'] = './assets/dashboard_admin/img/blog/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $old_image = $data['blog']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/dashboard_admin/img/blog/' . $old_image);
                }
                $image = $this->upload->data('file_name');
                $this->db->set('image', $image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'title' => $title,
            'slug' => $slug,
            'contents' => $contents,
            'category' => $category,
            'tag' => $tag,
            'date' => $date,
            'status' => $status,
        );
        $where = array(
            'id' => $id
        );

        $this->admin->update($where, $data, 'blog');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your blog has been updated!  </div>');
        redirect('admin/blogadmin');
    }
    public function deleteblog($id)
    {
        $url = $_SERVER['HTTP_REFERER'];

        $where = array('id' => $id);
        $image = $this->db->get_where('blog', array('id' => $id))->row();
        $file = ('./assets/dashboard_admin/img/blog/' .$image->image);
        if(is_readable($file) && unlink($file)){
            $this->admin->delete($where, 'blog');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Blog Successfully Delete! </div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"> Blog Failed to Delete! </div>');
        }
        redirect($url);
    }
    public function publishblog($id)
    {
        $data = array(

            'status' => 1,
        );
        $where = array(
            'id' => $id
        );

        $this->admin->update($where, $data, 'blog');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your blog has been published!  </div>');
        redirect('admin/blogadmin');
    }
    public function draftblog($id)
    {
        $data = array(

            'status' => 0,
        );
        $where = array(
            'id' => $id
        );

        $this->admin->update($where, $data, 'blog');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your blog has been drafted!  </div>');
        redirect('admin/blogadmin');
    }
    public function publishslider($id)
    {
        $data = array(

            'is_active' => 1,
        );
        $where = array(
            'id' => $id
        );

        $this->admin->update($where, $data, 'slider');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your slider has been published!  </div>');
        redirect('admin/slider');
    }
    public function draftslider($id)
    {
        $data = array(

            'is_active' => 0,
        );
        $where = array(
            'id' => $id
        );

        $this->admin->update($where, $data, 'slider');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your slider has been drafted!  </div>');
        redirect('admin/slider');
    }
    public function publishservices($id)
    {
        $data = array(

            'is_active' => 1,
        );
        $where = array(
            'id' => $id
        );

        $this->admin->update($where, $data, 'services');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your services has been published!  </div>');
        redirect('admin/services');
    }
    public function draftservices($id)
    {
        $data = array(

            'is_active' => 0,
        );
        $where = array(
            'id' => $id
        );

        $this->admin->update($where, $data, 'services');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Your services has been drafted!  </div>');
        redirect('admin/services');
    }
}