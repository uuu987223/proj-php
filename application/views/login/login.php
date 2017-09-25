<!DOCTYPE html>
<html>

	<head>
		<title>登录页</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<script type="text/javascript" src="<?php echo $host; ?>js/rem.js"></script>
		<!-- head 中 -->

		<link rel="stylesheet" href="<?php echo $host; ?>css/style.css">
	</head>

	<body ontouchstart>

		<div class="loginBox guanjiaBg">
			<h1 class="logo"></h1>
			<div class="box">
				<form action="" onsubmit="return loginCheckForm();">
					<ul>
						<li>
							<input type="tel" name="tel" id="loginTel" class="inp inp_tel" placeholder="手机号" /> </li>
						<li>
							<input type="tel" name="tel_code" class="inp inp_pas" placeholder="验证码" />
							<input type="button" value="获取验证码" class="code" id="loginCode" name="code" onclick="getCode(this)" /> </li>
						<li>
							<input type="submit" value="登录" class="loginBtn blockBtn" />
						</li>
					</ul>
				</form>
			</div>
			<div class="info">
				<p>轻奢时代的真人生活管家</p>
			</div>
		</div>
		<!-- body 最后 -->
		<script type="text/javascript" src="http://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $host; ?>js/layer_mobile/layer.js"></script>
		<script type="text/javascript" src="<?php echo $host; ?>js/common.js"></script>

	</body>

</html>