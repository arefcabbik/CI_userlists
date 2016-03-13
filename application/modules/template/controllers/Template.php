<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public function index($data)
	{
		//header dan footer hanya akan di load jika request bukan berupa ajax
		if(! $this->input->is_ajax_request()) $this->load->view('header');
		$this->load->view('content', $data);
		if(! $this->input->is_ajax_request()) $this->load->view('footer');
	}
}

/* End of file Template.php */
/* Location: ./application/modules/template/controllers/Template.php */