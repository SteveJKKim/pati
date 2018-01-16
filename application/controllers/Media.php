<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public $MM, $SM, $Title;

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->list();
	}

	public function list()
	{
		$this->MM = '2';
		$this->Title = 'Media';

		$this->load->library('session');
		$admin = $this->session->userdata();
		$this->load->library('Func');
		$this->func->chk_admin($admin);

		$num = $this->__ret(INPUT_GET, 'per_page');
		$data['num'] = $html['num'] = (empty($num)) ? 0 : $num;
		$html['keyword'] = $this->__ret(INPUT_GET, 'keyword');
		$html['cp'] = $this->__ret(INPUT_GET, 'cp');
		$html['lg'] = $this->__ret(INPUT_GET, 'lg');

		$this->load->library('pagination');
		$config['base_url'] = '/ad2/media/list/';
		$config['suffix'] = '&keyword='.$html['keyword'].'&cp='.$html['cp'].'&lg='.$html['lg'];
		$config['first_url'] = '?per_page=0'.$config['suffix'];
		$config['page_query_string']=true;
		$config['per_page'] = $html['pagesize'] = '10';
		$config['num_links'] = 2;
		$config['first_link'] = '첫페이지';
		$config['last_link'] = '끝페이지';

		$this->pdo = $this->load->database('pdo', true);
		$this->load->model('Admin_m');
		$data = $this->Admin_m->MediaList($html);

		$config['total_rows'] = $data['total'];
		$this->pagination->initialize($config);

		$tmp = '';
		foreach($data['data'] as $key => $val) {
			Switch($val['m_term']) {
				default: Case 'a': $term = 'CPA'; break;
				Case 's': $term = 'CPS'; break;
				Case 'p': $term = 'CPP'; break;
				Case 'c': $term = 'CPC'; break;
			}
			$log = ($val['m_status'] == 'y') ? '가능' : '불가능';

			$tmp .= '
<tr>
	<td><a href="/ad2/media/edit/'.$val['m_idx'].'">'.$val['m_code'].'</a></td>
	<td>'.$val['m_name'].'</td>
	<td>'.$val['m_id'].'</td>
	<td>'.$term.'</td>
	<td>'.$val['m_regtime'].'</td>
	<td>'.$log.'</td>
</tr>
			';
		}

		$html['data'] = $tmp;

		$this->load->view('lib_header');
		$this->load->view('lib_top');
		$this->load->view('lib_left', $admin);
		$this->load->view('media', $html);
		$this->load->view('lib_footer');
	}

	public function inst()
	{
		$this->MM = '2';
		$this->Title = 'Media';

		$this->load->library('session');
		$admin = $this->session->userdata();
		$this->load->library('Func');
		$this->func->chk_admin($admin);

		$this->load->view('lib_header');
		$this->load->view('lib_top');
		$this->load->view('lib_left', $admin);
		$this->load->view('media_inst');
		$this->load->view('lib_footer');
	}

	public function mediainsert()
	{
		$this->load->library('session');
		$admin = $this->session->userdata();
		$this->load->library('Func');
		$this->func->chk_admin($admin);

		$data['name'] = $this->__ret(INPUT_POST, 'name');
		$data['id'] = $this->__ret(INPUT_POST, 'id');
		$data['pw'] = md5($this->__ret(INPUT_POST, 'pw'));
		$data['term'] = $this->__ret(INPUT_POST, 'term');

		$this->pdo = $this->load->database('pdo', true);
		$this->load->model('Admin_m');

		try {
			$ret = $this->Admin_m->MediaInsert($data);
			$this->func->loca('/ad2/media', '등록되었습니다');
		} catch (Exception $e) {
			exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
		}
	}


	public function edit($idx)
	{
		$this->MM = '2';
		$this->Title = 'Media';

		$this->load->library('session');
		$admin = $this->session->userdata();
		$this->load->library('Func');
		$this->func->chk_admin($admin);

		$data['idx'] = $idx;

		$this->pdo = $this->load->database('pdo', true);
		$this->load->model('Admin_m');
		$data = $this->Admin_m->MediaInfo($data);
		$media = $data[0];

		$this->load->view('lib_header');
		$this->load->view('lib_top');
		$this->load->view('lib_left', $admin);
		$this->load->view('media_edit', $media);
		$this->load->view('lib_footer');
	}

	public function mediaedit()
	{
		$this->load->library('session');
		$admin = $this->session->userdata();
		$this->load->library('Func');
		$this->func->chk_admin($admin);

		$data['idx'] = $this->__ret(INPUT_POST, 'idx');
		$data['id'] = $this->__ret(INPUT_POST, 'id');
		$data['pw'] = $this->__ret(INPUT_POST, 'pw');
		$data['term'] = $this->__ret(INPUT_POST, 'term');
		$data['status'] = $this->__ret(INPUT_POST, 'status');

		$this->pdo = $this->load->database('pdo', true);
		$this->load->model('Admin_m');

		try {
			$ret = $this->Admin_m->MediaEdit($data);
			$this->func->loca('/ad2/media', '수정되었습니다');
		} catch (Exception $e) {
			exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
		}
	}
}
