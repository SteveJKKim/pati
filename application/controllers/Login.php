<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function confirm()
	{
		$value['id'] = $this->__ret(INPUT_POST, 'id');
		$value['pw'] = $this->__ret(INPUT_POST, 'pw');
		$this->pdo = $this->load->database('pdo', true);
		$this->load->model('Admin_m');
		$res = $this->Admin_m->Login($value);
		$this->load->library('Func');
		if($res == false) {
			$this->func->alert('접속 정보를 확인해 주세요');
			$this->func->hist();
		} else {
			$this->func->alert('안녕하세요 관리자님');
			$this->load->library('session');
			$admin = array( 'name' => $res[0]['a_name'], 'id' => $res[0]['a_id'], 'regtime' => date("Y-m-d H:i:s"), 'idx' => $res[0]['a_idx'] );
			$this->session->set_userdata($admin);
			if($admin['idx'] > 1) {
				$this->func->loca('/ad2/hotdeal');
			} else {
				$this->func->loca('/ad2/summary');
			}
		}
		exit;
	}

	public function logout()
	{
		$admin = array( 'name' => null, 'id' => null, 'regtime' => null, 'idx' => null );
		$this->load->library('Func');
		$this->load->library('session');
		$this->session->set_userdata($admin);
		$this->func->alert("로그아웃 되었습니다.");
		$this->func->loca("/ad2/login");
	}
}
