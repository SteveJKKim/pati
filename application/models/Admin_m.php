<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	public function login($value)	## 관리자 로그인 처리
	{
		try {
			$sql = "select * from ad_admin where a_id=? and a_pw=?";
			$query = $this->pdo->query($sql,
				array($value['id'], md5($value['pw']))
				);
			$result = $query->result('array');
			return (count($result) > 0) ? $result : false;
		} catch (Exception $e) {
			exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
		}
	}

	public function MediaList($value = array())	## 매체 리스트
	{
		$where = '';
		$bind = array();
		if(!empty($value['keyword'])) {
			$where .= " and (m.m_name like ? or m.m_id like ? or m.m_code like ?)";
			$bind[] = "%".$value['keyword']."%";
			$bind[] = "%".$value['keyword']."%";
			$bind[] = "%".$value['keyword']."%";
		}
		if(!empty($value['cp'])) {
			$where .= " and m.m_term=?";
			$bind[] = $value['cp'];
		}
		if(!empty($value['lg'])) {
			$where .= " and m.m_status=?";
			$bind[] = $value['lg'];
		}

		try {
			$sql = "select count(m.m_idx) as cnt from ad_media as m where 1=1".$where;
			$total = $this->pdo->query($sql, $bind);
			$result['total'] = $total->result('array')[0]['cnt'];
		} catch (Exception $e) {
			exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
		}

		try {
			$sql = "select m.* from ad_media as m where 1=1".$where." order by m_status asc, m_name asc limit ".$value['num'].", ".$value['pagesize'];
			$query = $this->pdo->query($sql, $bind);
			$result['data'] = $query->result_array();
		} catch (Exception $e) {
			exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
		}

		return $result;
	}

	public function MediaInsert($value)	## 매체 신규등록
	{
		if(empty($value['name']) || empty($value['id'])) {
			$this->func->hist('매체 정보가 없습니다');
			exit;
		}

		$sql = "select m_idx from ad_media where m_name=?";
		$query = $this->pdo->query($sql, array($value['name']));
		$result = $query->result_array();
		if(count($result) > 0) {
			$this->func->hist('이미 등록된 매체명입니다');
			exit;
		}

		$sql ="select m_idx from ad_media where m_id=?";
		$query = $this->pdo->query($sql, array($value['id']));
		$result = $query->result_array();
		if(count($result) > 0) {
			$this->func->hist('이미 등록된 로그인 아이디입니다');
			exit;
		}

//unset($value);
//unset($r1);
		$rr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9');
		shuffle($rr);
		$ran = array_rand($rr, 9);
//		$r2 = array_rand($rr, 5);
//		foreach($r2 as $key => $val) $r1 .= $rr[$val];
//		$value['id'] = $value['name'] = $r1;
//		$value['pw'] = md5($r1);
//		$value['term'] = 's';
		$xx = '';
		foreach($ran as $key => $val) $xx .= $rr[$val];

		$sql = "select m_code from ad_media where m_code=?";
		$query = $this->pdo->query($sql, array($xx));
		$result = $query->result_array();

		if (count($result) > 0) {
			$this->MediaInsert($value);
		} else {
			$sql = "
insert into ad_media (
	m_code, m_name, m_id, m_pw, m_term,
	m_regtime, m_status
) values (
	?, ?, ?, ?, ?,
	now(), 'y'
)
			";

			try {
				$query = $this->pdo->query($sql, array(
					$xx, $value['name'], $value['id'], $value['pw'], $value['term']
					));
				return $xx;
			} catch (Exception $e) {
				exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
			}
		}
	}

	public function MediaInfo($value) ## 매체정보 (수정페이지)
	{
		try {
			$sql = "select * from ad_media where m_idx=?";
			$query = $this->pdo->query($sql, array($value['idx']));
			return $query->result_array();
		} catch (Exception $e) {
			exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
		}
	}

	public function MediaEdit($value)	## 매체 수정 시
	{
		try {
			$sql ="
update ad_media set
	m_id=?, m_term=?, m_status=?, m_pw=if(m_pw=?, m_pw, ?)
where
	m_idx=?
			";
			$query = $this->pdo->query($sql, array(
				$value['id'], $value['term'], $value['status'], $value['pw'], md5($value['pw']),
				$value['idx']
				));
			return true;
		} catch (Exception $e) {
			exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
		}
	}

	public function Summary($value)	## 메인 써머리
	{
		try {
			## 신규주문
			$sql = "
select
	count(o.orderNo) as cnt, sum(o.totalGoodsPrice) as price
from
	es_order as o, es_orderGoods as g
where
	o.modDt between ? and ? and kka_company <> '' and o.orderNo=g.orderNo and
	left(g.orderStatus,1)!='c'
			";
			$query = $this->pdo->query($sql, array(
					$value['sdate'], $value['edate']
				));
			$res['sale'] = $query->result('array');

			## 신규회원
			$sql = "select count(memNo) as cnt from es_member where regDt between ? and ? and kka_company<>''";
			$query = $this->pdo->query($sql, array(
					$value['sdate'], $value['edate']
				));
			$res['member'] = $query->result('array');

			## 클릭량
			$sql = "select count(ck_idx) as clk from ad_click where concat(ck_date, ' ', ck_time) between ? and ?";
			$query = $this->pdo->query($sql, array(
					$value['sdate'], $value['edate']
				));
			$res['clk'] = $query->result('array');
			return $res;
		} catch(Exception $e) {
			exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
		}
	}

	public function HotDealList()	## 핫딜 상품 리스트
	{
		try {
			$sql = "select * from ad_hotdeal where 1 order by h_sort asc";
//			$sql = "select * from es_member order by memNo limit 20";
			$query = $this->pdo->query($sql);
			$res = $query->result('array');
			return $res;
		} catch(Exception $e) {
			exit ($e->getMessage(). '<br />'.__CLASS__. ' :: '. __FUNCTION__.' :: '.__LINE__);
		}

	}
}
