<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller {

	public $MM, $SM, $Title;

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->MM = '1';
		$this->Title = 'Summary';
		$this->load->library('session');
		$admin = $this->session->userdata();
		$this->load->library('Func');
		$this->func->chk_admin($admin);

		$this->pdo = $this->load->database('pdo', true);
		$this->load->model('Admin_m');
		$html['sdate'] = date("Y-m-d 00:00:00", strtotime("-6 days"));
		$html['edate'] = date("Y-m-d 23:59:59");
		$data = $this->Admin_m->Summary($html);

		$this->load->view('lib_header');
		$this->load->view('lib_top');
		$this->load->view('lib_left', $admin);
		$this->load->view('summary', $data);
		$this->load->view('lib_footer');
	}
}
