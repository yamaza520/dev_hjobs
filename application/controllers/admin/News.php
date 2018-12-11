<?php defined('BASEPATH') OR exit('No derect script access allowed');

class News extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->model('News_model');
    }

    /**
     * @route /admin/news
     */
    public function index()
    {
        $this->page_title = 'お知らせ一覧';

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'admin-news-listing'));

        $result = $this->News_model->find_all(array('created_at' => 'DESC'), $pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $this->_render('news/index', $data);
    }

    /**
     * Add/New News data
     * @route /admin/setup/{id}
     */
    public function setup($id = 0)
    {
        if (empty($id)) {
            $this->page_title = 'お知らせ登録';
            $data['record'] = (object) array(
                'id'        => '',
                'title'     => '',
                'body'      => '',
                'is_public' => 1,
            );
        } else {
            $this->page_title = 'お知らせ変更';
            $data['record'] = $this->News_model->find_one_by(array('id'=>$id));
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('title', 'タイトル', 'required');
            $this->form_validation->set_rules('body', '本文', 'required');

            if ($this->form_validation->run()) {
                // register
                $id = $this->input->post('id');
                $data = array (
                    'title'     => $this->input->post('title'),
                    'body'      => $this->input->post('body'),
                    'is_public' => $this->input->post('is_public'),
                );

                // if id isn't null, update value
                if ($id) {
                    $data['updated_at'] = date('Y-m-d H:i:s');
                    $this->News_model->update($id, $data);
                } else {
                    $this->News_model->insert($data);
                }

                redirect($this->path . 'news'); // TODO: redirect to 'news'
            }
        }

        $this->_render('news/setup', $data);
    }

    /**
     * @route POST /admin/news/delete
     */
    public function delete()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->News_model->delete($this->input->post('id'));
            redirect($this->path . 'news');
        } else {
            show_error('Invalid argument.', 400);
        }
    }
}
