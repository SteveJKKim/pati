

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">HotDeal</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default chat">
					<div class="panel-heading">
					핫딜 상품 관리
					</div>
					<div class="panel-default">

<table class="table table-border table-hover table-striped">
	<tr>
		<th>순서</th>
		<th>이미지</th>
		<th>상품명</th>
		<th>상품코드</th>
		<th>브랜드명</th>
		<th>판매가</th>
		<th>정가</th>
		<th>할인금액</th>
		<th>현재상태</th>
		<th>등록일</th>
		<th>관리</th>
	</tr>
<?=$html;?>
</table>

					</div>
				</div>

			</div><!--/.col-->

<script>
$(document).ready(function() {
	$("th").css({"text-align":"center"});
	$("td").css({"vertical-align":"middle"});
});
</script>