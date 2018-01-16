
<script src="/ad2/js/default.js"></script>

<script>
function mediainst() {
	if(value_chk("id") === false) return false;
	if(value_chk("pw") === false) return false;
}
</script>

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Media 관리</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default chat">
					<div class="panel-heading">
					<?=$m_name;?> 수정
					</div>
					<div class="panel">

<form name="mform" method="post" action="/ad2/media/mediaedit" onsubmit="javascript:return mediainst();">
<input type="hidden" name="idx" value="<?=$m_idx;?>" />
<table class="table table-border table-hover table-striped">
	<tr>
		<th>매체명</th>
		<td colspan="3"><input type="text" class="form-control" name="name" id="name" value="<?=$m_name;?>" disabled="disabled" /></td>
	</tr>
	<tr>
		<th>계약조건</th>
		<td>
			<label for="cpa"><input type="radio" class="rd2" name="term" value="a" id="cpa"<?=$this->func->checked($m_term, 'a');?> /> CPA</label>
			<label for="cps"><input type="radio" class="rd2" name="term" value="s" id="cps"<?=$this->func->checked($m_term, 's');?> /> CPS</label>
			<label for="cpc"><input type="radio" class="rd2" name="term" value="c" id="cpc"<?=$this->func->checked($m_term, 'c');?> /> CPC</label>
			<label for="cpp"><input type="radio" class="rd2" name="term" value="p" id="cpp"<?=$this->func->checked($m_term, 'p');?> /> CPP</label>
		</td>
		<th>매체코드</th>
		<td><input type="text" class="form-control" name="code" id="code" value="<?=$m_code;?>" disabled="disabled" /></td>
	</tr>
	<tr>
		<th width="10%">로그인 아이디</th>
		<td width="40%"><input type="text" class="form-control" name="id" id="id" value="<?=$m_id;?>" /></td>
		<th width="10%">비밀번호</th>
		<td width="40%"><input type="password" class="form-control" name="pw" id="pw" value="<?=$m_pw;?>" /></td>
	</tr>
	<tr>
		<th>로그인여부</th>
		<td colspan="3">
			<label for="yes"><input type="radio" class="rd2" name="status" value="y" id="yes"<?=$this->func->checked($m_status, 'y');?> /> 가능</label>
			<label for="no"><input type="radio" class="rd2" name="status" value="n" id="no"<?=$this->func->checked($m_status, 'n');?> /> 불가능</label>
		</td>
	</tr>
</table>
<button class="btn btn-warning">수정하기</button>
<a href="javascript:;" onclick="javascript:history.back();" class="btn btn-default">목록보기</a>
</form>
					</div>
				</div>

			</div><!--/.col-->

<script>
$(document).ready(function() {
	$("label").css('margin-right','20px');
	$(".rd2").css({"width":"20px", "height":"20px"});
});
</script>
