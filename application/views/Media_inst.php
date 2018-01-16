
<script src="/ad2/js/default.js"></script>

<script>
function mediainst() {
	if(value_chk("name") === false) return false;
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
					신규등록
					</div>
					<div class="panel-default">

<form name="mform" method="post" action="/ad2/media/mediainsert" onsubmit="javascript:return mediainst();">
<table class="table table-border table-hover table-striped">
	<tr>
		<th width="120">매체명</th>
		<td colspan="3"><input type="text" class="form-control" name="name" id="name" /></td>
	</tr>
	<tr>
		<th>계약조건</th>
		<td colspan="3">
			<label for="cpa"><input type="radio" class="rd2" name="term" value="a" id="cpa" checked /> CPA</label>
			<label for="cps"><input type="radio" class="rd2" name="term" value="s" id="cps" /> CPS</label>
			<label for="cpc"><input type="radio" class="rd2" name="term" value="c" id="cpc" /> CPC</label>
			<label for="cpp"><input type="radio" class="rd2" name="term" value="p" id="cpp" /> CPP</label>

		</td>
	</tr>
	<tr>
		<th>로그인 아이디</th>
		<td><input type="text" class="form-control" name="id" id="id" /></td>
		<th width="120">비밀번호</th>
		<td><input type="password" class="form-control" name="pw" id="pw" /></td>
	</tr>
</table>
<button class="btn btn-warning">등록하기</button>
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
