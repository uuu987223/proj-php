<!DOCTYPE html>
<html>

	<head>
		<title>意见反馈</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<script type="text/javascript" src="<?php echo $host;?>js/rem.js"></script>
		<link rel="stylesheet" href="<?php echo $host;?>css/style.css">
	</head>

	<body class="bodyBlack" ontouchstart>

		<div class="fankuiBox">
			<div class="tBox">
				<h1 class="logo"></h1>
			</div>
			<span class="line"></span>
			<div class="tBox boxBottomBor">
				<p class="org f32">您在使用过程中遇到什么问题，或者对为家管家有什么建议，都可以再次进行反馈，我们会在第一时间进行收集和处理，并给到您及时的反馈。</p>
			</div>

			<div class="tBox">
				<form action="" method="post" onsubmit="return fkCheckForm();">
					<h2 class="org f32">详细描述：</h2>
					<textarea class="textarea" maxlength="500" placeholder="
为家中式管家用心倾听您的建议，请在这里输入您的意见、建议，我们将不断优化产品，为您提供更优质的服务。" name="desc" id="desc"></textarea>
					<input type="text" name="call" class="inp" maxlength="200" placeholder="请留下电话号码、微信号、QQ号或者邮箱地址。" name="contact" id="contact">
					<input type="submit" value="提交反馈" class="blockBtn mt8">
				</form>
			</div>

		</div>
		<script type="text/javascript" src="http://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $host;?>js/layer_mobile/layer.js"></script>
		<script type="text/javascript" src="<?php echo $host;?>js/common.js"></script>
	</body>

</html>