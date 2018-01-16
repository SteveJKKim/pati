

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">HotDeal</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default chat">
					<div class="panel-heading">
					핫딜 상품 등록
					</div>
					<div class="panel-default">
<form name="hform" method="post" action="/ad2/hotdeal/hotdealinst" enctype="multipart/form-data">
<input type="hidden" name="sort" value="<?=$sort?>" />
<table class="table table-border table-hover table-striped">
	<tr>
		<th>이미지</th>
		<td><input type="file" class="form-control" name="img" class="img" /></td>
	</tr>
	<tr>
		<th>상품명</th>
		<td><input type="text" class="form-control" name="name" id="name" style="width:300px;" /></td>
	</tr>
	<tr>
		<th>상품코드</th>
		<td><input type="text" class="form-control" name="code" id="code" style="width:200px;" /></td>
	</tr>
	<tr>
		<th>브랜드명</th>
		<td><input type="text" class="form-control" name="brand" id="brand" style="width:300px;" /></td>
	</tr>
	<tr>
		<th>판매가</th>
		<td><input type="text" class="form-control" name="price" id="price" style="width:150px;text-align:right;" value="0" /></td>
	</tr>
	<tr>
		<th>정가</th>
		<td><input type="text" class="form-control" name="fixed" id="fixed" style="width:150px;text-align:right;" value="0" /></td>
	</tr>
	<tr>
		<th>할인금액</th>
		<td><input type="text" class="form-control" name="dis" id="dis" style="width:150px;text-align:right;" value="0" /></td>
	</tr>
	<tr>
		<th>현재상태</th>
		<td>
			<label for="status1"><input type="radio" class="" name="status" id="status1" style="width:20px;height:20px;vertical-align:middle;" value="y" checked="checked" /> 보임</label>
			<label for="status2"><input type="radio" class="" name="status" id="status2" style="width:20px;height:20px;vertical-align:middle;" value="n" /> 숨김</label>
		</td>
	</tr>
</table>
<div>
	<button class="btn btn-success">등록</button>
	<a href="javascript:;" onclick="javascript:history.back();" class="btn btn-default">취소</a>
</div>
</form>
					</div>
				</div>

			</div><!--/.col-->

<script>
$(document).ready(function() {
	$("th").css({"text-align":"center", "vertical-align":"middle"});
	$("td").css({"vertical-align":"middle"});
});
</script>