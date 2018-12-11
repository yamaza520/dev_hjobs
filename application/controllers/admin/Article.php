<?php defined('BASEPATH') OR exit('No derect script access allowed');

class Article extends MY_AdminController {
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->model('Article_model');
        $this->load->model('Article_type_model');
    }

    /**
     * @route /admin/articles
     */
    public function index()
    {
        $this->page_title = '記事一覧';

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'admin-article-listing'));

        $result = $this->Article_model->search(array(), array(), $pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $this->_render('article/index', $data);
    }

    /**
     * @route POST /admin/article/delete
     */
    public function delete()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->Article_model->delete($this->input->post('id'));
            redirect($this->path . 'articles');
        } else {
            show_error('Invalid argument.', 400);
        }
    }

    /**
     * @route /admin/article/setup/(:num)
     */
    public function setup($id = 0)
    {
        $data['article_type'] = $this->Article_type_model->find_all_for_dropdown();

        if (empty($id)) {
            $this->page_title = 'コラム新規登録';
            $data['article'] = (object) array(
                'title'         => '',
                'article_type_id' => '',
                'description'   => '',
                'heading_image' => null,
                'contents'      => array(),
                'is_public'     => 1,
            );
        } else {
            $this->page_title = 'コラム更新';
            $article = $this->Article_model->search(array('t.id' => $id), array(), 1);
            if (count($article) === 0) {
                show_404();
            }
            $data['article'] = $article[0];
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('title', 'タイトル', 'required');
            $this->form_validation->set_rules('category', 'カテゴリー', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('content[]', 'コラム内容（見出し、画像、文章）どちら', 'required');

            if (!empty($_FILES['heading-image']['name'])) {
                $this->upload->initialize($this->get_upload_options('upload_article_img_path'));
                if ($this->upload->do_upload('heading-image')) {
                    $upload_info = $this->upload->data();
                    //set new uploaded file name
                    $heading_image = $upload_info['file_name'];
                }
            }

            // upload image file
            if (!empty($_FILES['content-image'])) {
                $upload_info = $this->do_upload();
            }

            if ($this->form_validation->run()) {
                $article_data = array(
                    'title' => $this->input->post('title'),
                    'article_type_id' => $this->input->post('category'),
                    'description' => $this->input->post('description'),
                    'is_public' => $this->input->post('is_public'),
                );
                if (!empty($heading_image)) {
                    $article_data['heading_image'] = $heading_image;
                }

                $contents = array();
                $article_content = array();

                $contents = $this->input->post('content');
                $count = 0;
                foreach ($contents as $content) {
                    $count++;
                    $get_key = array_keys($content);
                    $key = array_pop($get_key);
                    $value = $content[$key];

                    if ($key === 'image') {
                        //for edit
                        $dir = $this->config->item('upload_article_img_path');
                        $file = $dir.$value;

                        // check file is already uploading or not
                        if (!file_exists($file)) {
                            foreach ($upload_info as $info) {
                                if ($info['client_name'] === $value) {
                                    $value = $info['file_name'];
                                    break;
                                }
                            }
                        }
                    }

                    //prepare data to save in article_content table
                    $article_data['contents'][] = array(
                        'type' => $key,
                        'content' => $value,
                        'sort_order' => $count,
                    );

                }

                if (empty($id)) {
                    $article_id = $this->Article_model->insert($article_data);
                    if ($article_id) {
                        $params = [
                            'hub.mode' => 'publish',
                            'hub.url' => site_url('article/detail/' . $article_id),
                        ];

                        curl($this->config->item('pubsubhubbub'), $params, 'post', array('Content-Type: application/x-www-form-urlencoded'));
                    }
                } else {
                    // for unlink images st
                    $db_data = $this->Article_content_model->find_by(array('article_id' => $id, 'type' => 'image'));
                    $data_images = array();
                    foreach ($article_data['contents'] as $content) {
                        if ($content['type'] == 'image'){
                            $data_images[] = $content['content'];
                        }
                    }
                    foreach ($db_data as $value) {
                        if(!in_array($value->content, $data_images)) {
                            $this->remove_file($value->content, $this->config->item('upload_article_img_path'));
                        }
                    }

                    $article_id = $this->Article_model->update($id, $article_data);
                }

                redirect($this->path . 'article');
            } else {
                // validation error
                $data['message'] = validation_errors();
            }
        }

        $this->_render('article/setup', $data);
    }

    public function do_upload()
    {
        $files_group    = $_FILES;
        $total_files    = count($_FILES['content-image']['name']);
        $upload_data    = array();

        for ($i = 0; $i < $total_files; $i++) {
            if (!empty($files_group['content-image']['name'][$i])) {
                $_FILES['content-image']['name']     = $files_group['content-image']['name'][$i];
                $_FILES['content-image']['type']     = $files_group['content-image']['type'][$i];
                $_FILES['content-image']['tmp_name'] = $files_group['content-image']['tmp_name'][$i];
                $_FILES['content-image']['error']    = $files_group['content-image']['error'][$i];
                $_FILES['content-image']['size']     = $files_group['content-image']['size'][$i];

                $config = $this->get_upload_options('upload_article_img_path');
                $this->upload->initialize($config);

                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0777, true);
                }

                if ($this->upload->do_upload('content-image')) {
                    $data = $this->upload->data();
                    array_push($upload_data, $this->upload->data());
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            }
        }

        return $upload_data;
    }
}
