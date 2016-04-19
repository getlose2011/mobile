<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
        
	public function __construct()
    {
		//繼承CI construct
		parent::__construct();
		
        $this->load->model('news_model');
        $this->load->library('Data');
		
    }
	
	//預設沒URL的方法時,會先執行index()方法
	public function index($languages='tw')
	{
		
		
		//ini_set('memory_list', '512M');
		$page = !is_null($this->input->get('page'))?$this->input->get('page'):1;
		
		//echo $page;
		//var_dump($page);
		
		//載入語言application\language的資料夾
		$this->lang->load('news_lang', $languages);	
		
		$data['rsp_list'] = $this->news_model->get_news($page, $languages);
		$data['page'] = $page;
		
		$this->load->view('layout/header');
		$this->load->view('news/index', $data);
		$this->load->view('layout/footer');
	}
		
		public function view($slug = NULL)
        {
			  echo 123;
			  $data['news_item'] = $this->news_model->get_news($slug);
			if (empty($data['news_item']))
			{
					show_404();
			}

				$data['title'] = $data['news_item']['title'];

				$this->load->view('templates/header', $data);
				$this->load->view('news/view', $data);
				$this->load->view('templates/footer');
			}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');//設定表單驗證的規則
		
		$data['title'] = 'create a news item';
		
		$this->form_validation->set_rules('title', 'Title 必填', 'required');
		$this->form_validation->set_rules('text', 'text 不能為空', 'required');
		
		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');
		}else{
			$this->news_model->set_news();
			$this->load->view('news/success');
		}
		
	}
}







