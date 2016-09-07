    //集成极验验证码
    var login_flag = false;
    var geetest_handler = function (captchaObj) {
         captchaObj.appendTo("#geetest-captcha");
         captchaObj.onSuccess(function () {
            login_flag = true;
        });
        $("#signin-btn").click(function(){
            var params = $("#signin-form").serializeJson();
            if(!login_flag){
                error_noty("请完成滑块验证");
                return;
            }
            if(!params.email){
                error_noty("请输入邮箱");
                return;
            }
            if(!isEmail(params.email)){
                error_noty("请输入正确格式的邮箱");
                return;
            }
            if(!params.password){
                error_noty("请输入密码");
                return;
            }
            var callback = function(msg){
                if(msg.result == 0){
                    window.location.href = msg.data;
                }else{
                    captchaObj.refresh();
                    error_noty(msg.description);
                }
            }
            requestAjax(params, 'POST', '/signin', callback, true);
        })
        $("#signup-btn").click(function(){
            var params = $("#signup-form").serializeJson();
            if(!login_flag){
                error_noty("请完成滑块验证");
                return;
            }
            if(!params.email){
                error_noty("请输入邮箱");
                return;
            }
            if(!isEmail(params.email)){
                error_noty("请输入正确格式的邮箱");
                return;
            }
            if(!params.nickname){
                error_noty("请输入昵称");
                return;
            }
            if(!params.password){
                error_noty("请输入密码");
                return;
            }
            if(passwordLevel(params.password) == 1){
                error_noty("您的密码强度为弱，安全起见，建议您更换一个复杂的密码");
                return;
            }
            var callback = function(msg){
                error_noty(msg.description);
                if(msg.result == 0){
                    setTimeout("window.location.href = '"+msg.data+"'",1500);
                }else{
                    geetest_handler.refresh();
                }
            }
            requestAjax(params, 'POST', '/signup', callback, true);
        })
    };
    var callback = function(data){
        initGeetest({
            gt: data.gt,
            challenge: data.challenge,
            product: "float",
            offline: !data.success
        }, geetest_handler);
    }
    requestAjax(null, 'GET', '/geetest?rand='+Math.round(Math.random()*100), callback, true);