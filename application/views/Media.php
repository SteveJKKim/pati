

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Media</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default chat">
					<div class="panel-heading">
					매체리스트
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="/ad2/media/inst">
												<em class="fa fa-cog"></em> 신규등록
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="pull-right">
						<form name="sform" method="get" id="sform">
								<span class="pull-left" style="margin-right:10px;"><input type="text" class="btn-xs form-control" name="keyword" id="keyword" value="<?=$keyword;?>" /></span>
								<span class="pull-left" style="margin-right:7px;"><button class="btn btn-success">검색</button></span>
						</ul>
						<ul class="pull-right">
							<select name="lg" class="form-control" id="lg">
								<option value="">== 로그인</option>
								<option value="y"<?=$this->func->select($lg, 'y');?>>가능</option>
								<option value="n"<?=$this->func->select($lg, 'n');?>>불가능</option>
							</select>
						</ul>
						<ul class="pull-right">
							<select name="cp" class="form-control" id="cp">
								<option value="">== 전체형태</option>
								<option value="a"<?=$this->func->select($cp, 'a');?>>CPA</option>
								<option value="s"<?=$this->func->select($cp, 's');?>>CPS</option>
								<option value="c"<?=$this->func->select($cp, 'c');?>>CPC</option>
								<option value="p"<?=$this->func->select($cp, 'p');?>>CPP</option>
							</select>
						</form>
						</ul>
					</div>
					<div class="panel panel-default">
						<table class="table table-border table-hover table-striped">
							<thead>
							<tr>
								<th>매체코드</th>
								<th>매체명</th>
								<th>로그인 아이디</th>
								<th>제휴형태</th>
								<th>등록일</th>
								<th>로그인</th>
							</tr>
							</thead>
							<tbody>
<?=$data;?>
							</tbody>
						</table>

					<ul class="pull-right">
<?=$this->pagination->create_links('dd');?>
					</ul>
					</div>
				</div>

			</div><!--/.col-->

<script type="text/javascript">
$(document).ready(function() {
	$("#sform").submit(function() {
//		document.location.href="/ad2/media/list/0/"+$("#keyword").val()+"/"+$("#cp").val()+"/"+$("#lg").val();
//		return false;
	});
	$("th, td").css("text-align","center");
});
</script>
