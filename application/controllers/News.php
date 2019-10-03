<?php
class News extends CI_controller{
    public function __construct()
	{
        parent::__construct();
		$this->load->model('News_model');
	}
	public function index()
	{
        $data["news"] = $this->News_model->get_news();
        $data["title"] = "News archive";

        //var_export($data);
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($slug = NULL)
	{
        $data["news_item"] = $this->News_model->get_news($slug);
        if (empty($data['news_item']))
        {
                show_404();
        }

        $data["title"] = $data["news_item"]["title"];

        //var_export($data);
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
	}
	
}