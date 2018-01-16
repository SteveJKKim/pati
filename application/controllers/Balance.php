<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Balance extends CI_Controller {

	public $MM, $SM, $Title;

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->MM = '4';
		$this->Title = 'Balance';
		$this->load->library('session');
		$admin = $this->session->userdata();
		$this->load->library('Func');
		$this->func->chk_admin($admin);
		$this->load->view('lib_header');
		$this->load->view('lib_top');
		$this->load->view('lib_left', $admin);
		$this->load->view('balance');
		$this->load->view('lib_footer');
	}
}
