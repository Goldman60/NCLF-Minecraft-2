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
		
		$hasSidebar = array('home');
		
		//Load helper Libraries
		$this->load->helper('html');
		
		//Server Query stuff
		$this->load->model('server_query_model');
			//Creative Server
			try {
				$this->server_query_model->connect("192.168.2.14"); //INTERNAL ADDRESS
				$data['CreativeInfo'] = $this->server_query_model->GetInfo();
				$data['CreativePlayers'] = $this->server_query_model->GetPlayers();
			} catch (MinecraftQueryException $e) {
				$data['CreativeError'] = $e;
			}
			
			//FTB Server
			try {
				$this->server_query_model->connect("192.168.2.14",25566); //INTERNAL ADDRESS
				$data['FTBInfo'] = $this->server_query_model->GetInfo();
				$data['FTBPlayers'] = $this->server_query_model->GetPlayers();
			} catch (MinecraftQueryException $e) {
				$data['FTBError'] = $e;
			}
			
		print_r($data['FTBInfo']);
				
		//Populate data array
		$data['title'] = ucfirst($page);
		$data['style'] = array('sitewide','nav');
		
		//Header
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navigation',$data);
		//Load up the body
		$this->load->view('templates/body/start',$data);
		
		if(in_array($page, $hasSidebar)) {
			$this->load->view('templates/sidebardiv/start');
		}
		
		$this->load->view('page/'.$page, $data);
		
		//load the sidebar IF NEEDED
		if(in_array($page, $hasSidebar)) {
			$this->load->view('templates/sidebardiv/end');
			$this->load->view('templates/sidebar');
		}
		
		//End the body
		$this->load->view('templates/body/end', $data);
		//footer
		$this->load->view('templates/footer', $data);
	}
	
}