<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	//url沒有方法名則預設為index()會被報行
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function index1()
	{
		echo 123;
	}
	
	
	//第二個 URI 區段簡單定義了要請求 Controller 的哪個方法。 
	//CodeIgniter 允許你複寫這個行為，通過使用 _remap() 方法
	//在方法之後的所有額外的區段，將會被傳入 _remap() 當作可選的第二個參數。
	//這個陣列可以搭配 PHP 的 call_user_func_array() 去模擬 CodeIgniter 的預設行為。
	public function _remap($method, $params = array())
	{
		$method = $method.'_action';
		if(method_exists($this, $method)){
			return call_user_func_array(array($this, $method), $params);
		}
	}
	
	private function test_action($params,$params1){
		echo $params;
		echo $params1;
	}
	
	private function model_action(){
		$this->load->model('WelcomeModel','TaipeiModel');
		$this->WelcomeModel->method1();
		//echo $params;
		//echo $params1;
	}
	
}
