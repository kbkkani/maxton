<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                // Your own constructor code

                $this->load->model("main_model");
        }


	public function index()
	{
		$data['hotest_tours'] = $this->main_model->getAllHotestTours();
                $data['featured_tours'] = $this->main_model->getAllFeturedTours();
		$this->load->view('template/header',$data);
		$this->load->view('site/home');
		$this->load->view('template/footer');
	}
        
        public function alltours(){
                $data['alltours'] = $this->main_model->getAllTours();
		$this->load->view('template/header',$data);
		$this->load->view('site/alltours');
		$this->load->view('template/footer');
        }
        
        
        public function selectedTour($id){
                $data['selectedTour'] = $this->main_model->getSelectedTour($id);
		$this->load->view('template/header',$data);
		$this->load->view('site/tour');
		$this->load->view('template/footer');
            
        }
        
}
