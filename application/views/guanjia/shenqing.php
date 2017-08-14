<!DOCTYPE html>
<html>

	<head>
		<title>申请</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<script type="text/javascript" src="<?php echo $host;?>js/rem.js"></script>
		<link rel="stylesheet" href="<?php echo $host;?>css/style.css">
	</head>

	<body class="" ontouchstart>

		<div class="shenqingBox">

			<div class="banner">
				<h1 class="logo"></h1>
				<p class="txt">主人您好，
					<br> 我是您的小V管家，
					<br> 我该如何称呼您呢？
				</p>
				<b class="icon"></b>
			</div>
			<div class="desc">
				<h2 class="tit">管家信息</h2>
				<h3 class="subTit">只需享受 无需参与</h3>
			</div>

			<form action="" method="post" onsubmit="return sqCheckForm();">
				<ul class="sqForm" id="sqForm">
					<li>

						<input type="text" name="surname" id="surname" class="inp" placeholder="姓：">
						<div class="sexs">
							<input type="radio" id="radio-1-1" name="radio-1-set" class="regular-radio" checked="" value="1">
							<label for="radio-1-1"><b>男士</b></label> &nbsp;&nbsp;
							<input type="radio" id="radio-1-2" name="radio-1-set" class="regular-radio" value="2">
							<label for="radio-1-2"><b>女士</b></label>
						</div>

					</li>
					<li>
						<input type="text" name="name" id="name" class="inp" placeholder="名：(选填)">
					</li>
					<li>
						<input type="text" name="englishName" id="englishName" class="inp" placeholder="英文名：(选填)">
					</li>
					<li>
						<input type="tel" name="tel" id="sqTel" class="inp" placeholder="手机号：">
					</li>
					<li>
						<input type="text" name="adress" id="sqAdress" class="inp" placeholder="家庭住址：(小区名称)">
					</li>
					<li>
						<input type="submit" value="提交申请" class="blockBtn mt4">
					</li>
				</ul>
			</form>
		</div>
		<script type="text/javascript" src="http://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $host;?>js/layer_mobile/layer.js"></script>
		<script type="text/javascript" src="<?php echo $host;?>js/common.js"></script>
	</body>

</html>