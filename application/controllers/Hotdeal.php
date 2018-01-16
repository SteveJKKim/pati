<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotdeal extends CI_Controller {

	public $MM, $SM, $Title;

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->HotDealList();
	}

	public function HotDealList()	## 핫딜상품 리스트
	{
		$this->MM = '5';
		$this->Title = 'HotDeal';

		$this->load->library('session');
		$admin = $this->session->userdata();
		$this->load->library('Func');
		$this->func->chk_admin($admin);

		$this->pdo = $this->load->database('pdo', true);
		$this->load->model('Admin_m');
		$data = $this->Admin_m->HotDealList();

		$html = array();
		$html['html'] = '';

		for($i = 1 ; $i < 6 ; $i++) {
			if(!empty($data[0][$i]['h_idx'])) {
				$img = $data[0][$i]['h_img'];
				$btn = '<a class="btn btn-success" href="/ad2/hotdeal/edit/'.$data[0][$i]['h_idx'].'">수정</a>';
				$title = $data[0][$i]['h_title'];
				$code = $data[0][$i]['goodsNo'];
				$brand = $data[0][$i]['h_brand'];
				$price = number_format($data[0][$i]['goodsPrice'], 0);
				$fixed = number_format($data[0][$i]['fixedPrice'], 0);
				$dis = number_format($data[0][$i]['goodsDiscount'], 0);
				$stat = ($data[0][$i]['h_status'] == 'y') ? '보임' : '숨김';
				$reg = $data[0][$i]['h_regdate'];
			} else {
				$img = '/data/img/no-image.png';
				$btn = '<a class="btn btn-danger" href="/ad2/hotdeal/inst/'.$i.'">등록</a>';
				$title = $code = $brand = $stat = $reg = '';
				$price = $fixed = $dis = 0;

			}
			$select ='';
			$html['html'] .= '
	<tr align="center">
		<td>
			<select class="form-control" id="select'.$i.'">
			';
			for($j = 1 ; $j < 6 ; $j++) {
				if(!empty($data[0][$i]['h_sort'])) {
					$select = $this->func->select($j, ((!empty($data[0][$i]['h_sort']))?$data[0][$i]['h_sort']:$i), true);
					$sort = $data[0][$i]['h_sort'];
				} else {
					$sort = $i;
				}
				$html['html'] .= '<option value="'.$j.'"'.$select.'>'.$j.'</option>';
			}
			$html['html'] .= '
			</select>
		</td>
		<td><img src="'.$img.'" /></td>
		<td align="left">'.$title.'</td>
		<td>'.$code.'</td>
		<td>'.$brand.'</td>
		<td>'.$price.'</td>
		<td>'.$fixed.'</td>
		<td>'.$dis.'</td>
		<td>'.$stat.'</td>
		<td>'.$reg.'</td>
		<td>'.$btn.'</td>
	</tr>
			';
		}

		$this->load->view('lib_header');
		$this->load->view('lib_top');
		$this->load->view('lib_left', $admin);
		$this->load->view('hotdeal', $html);
		$this->load->view('lib_footer');
	}

	public function Inst($sort)	## 핫딜 등록 화면
	{
		$this->MM = '5';
		$this->Title = 'HotDeal';

		$this->load->library('session');
		$admin = $this->session->userdata();
		$this->load->library('Func');
		$this->func->chk_admin($admin);

		$html['sort'] = $sort;

		$this->load->view('lib_header');
		$this->load->view('lib_top');
		$this->load->view('lib_left', $admin);
		$this->load->view('hotdeal_inst', $html);
		$this->load->view('lib_footer');
	}

	public function HotDealInst()
	{
		print_r($_FILES);
	}

}
