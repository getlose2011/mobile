<?php
class News_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
		
		
		
		public function get_news($page, $languages)
		{

		}
		
		public function set_news(){
			//$title = "What's wrong with CSS?";
			//$url_title = url_title($title, 'underscore', TRUE);
			// Produces: whats_wrong_with_css
			$this->load->helper('url');

			$slug = url_title($this->input->post('title'), 'dash', TRUE);
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
			);
			return $this->db->insert('news', $data);
		}
}
