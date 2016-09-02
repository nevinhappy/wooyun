    //集成极验验证码
    var login_flag = false;
    var handler = function (captchaObj) {
         captchaObj.appendTo("#geetest-captcha");
         captchaObj.onSuccess(function () {
            login_flag = true;
        });
    };
    var callback = function(data){
        initGeetest({
            gt: data.gt,
            challenge: data.challenge,
            product: "float",
            offline: !data.success
        }, handler);
    }
    requestAjax(null, 'GET', '/geetest?rand='+Math.round(Math.random()*100), callback, true);