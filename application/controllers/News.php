<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
        
	public function __construct()
    {
		//繼承CI construct
		parent::__construct();
		
        $this->load->model('news_model');
        $this->load->library('Data');//自訂的類別
        $this->load->library('Tools');//自訂的類別
        $this->load->helper('form');//form表單
        $this->load->helper('url');//base_url()
        $this->load->library('pagination');//分頁
		
    }
	
	//預設沒URL的方法時,會先執行index()方法
	public function index()
	{
		$table = 'news';
		$now = time();
		$page = !is_null($this->input->get('page'))?$this->input->get('page'):1;
		$lang_set = !is_null($this->input->get('lang_set'))?$this->input->get('lang_set'):'tw';
		$number_page = !is_null($this->input->get('number_page')) ? $this->input->get('number_page') : Data::$_page;
		//載入語言application\language的資料夾
		$this->lang->load('news_lang', $lang_set);	
		
		$data['page'] = $page;
		$data['lang_set'] = $lang_set;
		


		//$where = "lang_set='{$lang_set}' AND show='1'";也可以自己訂義
		//如果有LIKE就用自己訂義的
		//$where = "lang_set='{$lang_set}' AND show='1' AND title LIKE '%20%'";
		//第一種方法
		//$where = array('lang_set' => $lang_set, 'show' => '1');
		//$orderby = 'fkey DESC, created_t DESC';
		//$like = "'title', 'c'";
		//$data['rsp_list'] = $this->news_model->getAllByPage($page, $number_page, $where, $table, $orderby);
		//$data['total_count'] = $this->news_model->getTotalCount($table, $where);

		//第二種方法
		
		$sql = "select * from news WHERE lang_set = '{$lang_set}' AND `show` = 1 AND `publish_t` <= $now and `overdue_t` >= $now ORDER BY fkey ASC";
		$data['rsp_list'] =  $this->news_model->getJoinByPage($page, $number_page, $sql);
		$data['total_count'] = $this->news_model->getTotalCountByJoin($sql);
		$data['total_pages'] = Tools::getTotalPage($data['total_count'], $number_page);


		$this->load->view('layout/header');
		$this->load->view('news/index', $data);
		$this->load->view('layout/footer', $data);
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







