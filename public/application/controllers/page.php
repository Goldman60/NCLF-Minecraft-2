<?php
class page extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
	}
	
	public function view($page = 'home') {
		if(!file_exists('./application/views/page/'.$page.'.php')) {
			//File does not exsist
			show_404();
		}
		
		//Load helper Libraries
		$this->load->helper('html');
		
		//Populate data array
		$data['title'] = ucfirst($page);
		
		//Header
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navigation',$data);
		//Load up the body
		$this->load->view('templates/body/start',$data);
		
		$this->load->view('page/'.$page, $data);
		
		//load the sidebar
		$this->load->view('templates/sidebar');
		
		//End the body
		$this->load->view('templates/body/end', $data);
		//footer
		$this->load->view('templates/footer', $data);
	}
	
}