function showMsg(str) {
	layer.open({
		content: str,
		skin: 'msg',
		time: 2 //2秒后自动关闭
	});
};


var loginObj = {
	tel: $('#loginTel'),
	code: $('#loginCode'),
	num: 60,
	timer: null
};

function loginCheckForm() {
	if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(loginObj.tel.val()))) {
		showMsg('请输入正确的手机号！');
		return false;
	}
	if (loginObj.code.val() == '') {
		showMsg('请输入验证码');
		return false;
	}
};

function getCode(obj) {
	if (loginObj.code.val() != '获取验证码') {
		return;
	}
	if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(loginObj.tel.val()))) {
		showMsg('请输入正确的手机号！');
		return;
	}
        $.ajax({url:"/index.php/Login/getcode?phone="+loginObj.tel.val(),async:false});
	loginObj.code.val('(' + loginObj.num + 's)')
		.addClass('active');
	loginObj.timer = setInterval(function() {
		loginObj.num--;
		loginObj.code.val('(' + loginObj.num + 's)');

		if (loginObj.num == 1) {
			clearInterval(loginObj.timer);
			loginObj.num = 60;
			loginObj.code.val('获取验证码')
				.removeClass('active');
		}
	}, 1000);

};




//反馈表单
var fkObj = {
	desc: $('#desc'),
	contact: $('#contact')
};


function fkCheckForm() {
	if (fkObj.desc.val() == '') {
		showMsg('请输入您的反馈意见！');
		return false;
	}
	if (fkObj.contact.val() == '') {
		showMsg('请输入您的联系方式！');
		return false;
	}


}



//申请表单
var sqObj = {
	surname: $('#surname'),
	tel: $('#sqTtel'),
	adress: $('#sqAdress')
};


function sqCheckForm() {
	if (sqObj.surname.val() == '') {
		showMsg('请输入您的姓氏！');
		return false;
	}

	if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(sqObj.tel.val()))) {
		showMsg('请输入正确的手机号！');
		return false;
	}
	if (sqObj.adress.val() == '') {
		showMsg('请输入您的小区名称！');
		return false;
	}

}