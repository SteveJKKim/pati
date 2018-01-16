
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://gdadmin.pati.co.kr/data/mobile/defaultShopIcon.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?=$name;?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<!--div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form-->
		<ul class="nav menu">
<?php
if($idx == '1') {
?>
			<li class="<?=($this->MM=='1')?'active':'';?>"><a href="/ad2/summary"><em class="fa fa-dashboard">&nbsp;</em> Summary</a></li>
			<li class="<?=($this->MM=='2')?'active':'';?>"><a href="/ad2/media"><em class="fa fa-calendar">&nbsp;</em> Media</a></li>
			<li class="<?=($this->MM=='3')?'active':'';?>"><a href="/ad2/report"><em class="fa fa-bar-chart">&nbsp;</em> Report</a></li>
			<li class="<?=($this->MM=='4')?'active':'';?>"><a href="/ad2/balance"><em class="fa fa-toggle-on">&nbsp;</em> Balance</a></li>
<?php } ?>
			<li class="<?=($this->MM=='5')?'active':'';?>"><a href="/ad2/hotdeal"><em class="fa fa-fire">&nbsp;</em> HotDeal</a></li>
			<!--li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li-->
			<li><a href="javascript:logout();"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"><?=$this->Title;?></li>
			</ol>
		</div><!--/.row-->
