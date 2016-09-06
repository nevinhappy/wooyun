@include("common/meta")

<body class="output fluid zh cn win reader-day-mode reader-font2" data-js-module="recommendation" data-locale="zh-CN">
    @include("common/navbar")
    <div class="container">

        <div class="login-page">
            <div class="logo">
                <img src="/res/logo.png" alt="Img logo"></div>
            <h4 class="title">
                <span>
                    <a class="active" data-pjax="true" href="/signin">登录</a> <b>·</b>
                    <a class="" data-pjax="true" href="/signup">注册</a>
                </span>
            </h4>
            <div id="pjax-container">

                <div class="sign-in">
                    <form class="form-horizontal" data-js-module="sign-in" action="/signin" accept-charset="UTF-8" method="post" id="signin-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-prepend domestic ">
                            <span class="add-on">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" name="email" id="sign_in_name" value="" class="span2" placeholder="电子邮件"></div>

                        <div class="input-prepend password ">
                            <span class="add-on">
                                <i class="fa fa-unlock-alt"></i>
                            </span>
                            <input type="password" name="password" id="sign_in_password" class="span2" placeholder="密码">
                        </div>

                        <div id="geetest-captcha"></div>

                        <button class="ladda-button submit-button" data-color="blue" type="button">
                            <span class="ladda-label">登 录</span>
                        </button>

                        <div class="control-group text-left">
                            <div class="icheckbox_minimal checked" style="position: relative;">
                                <input type="checkbox" name="remember_me" id="sign_in_remember_me" value="true" checked="checked" style="position: absolute; opacity: 0;"> <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            记住我
                            <a href="/findpwd">忘记密码</a>
                        </div>

                    </form>
                </div>

            </div>
            <div class="login-sns">
                <p>您还可以通过以下方式直接登录</p>
                <ul class="login-sns">
                    <li class="weibo">
                        <a href="http://www.jianshu.com/users/auth/weibo">
                            <i class="fa fa-weibo"></i>
                        </a>
                    </li>
                    <li class="qq">
                        <a href="http://www.jianshu.com/users/auth/qq_connect">
                            <i class="fa fa-qq"></i>
                        </a>
                    </li>
                    <li class="douban">
                        <a href="http://www.jianshu.com/users/auth/douban">
                            <i class="fa fa-douban"></i>
                        </a>
                    </li>
                    <li class="google">
                        <a href="http://www.jianshu.com/users/auth/google_oauth2">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li class="wechat">
                        <a href="http://www.jianshu.com/users/auth/wechat">
                            <i class="fa fa-wechat"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    @include('common/modefoot')
    
    <link rel="stylesheet" type="text/css" href="/res/style.css">
    <script src="http://static.geetest.com/static/tools/gt.js"></script>
    <script src="/res/geetest.js"></script>
    <script type="text/javascript">
        $(".submit-button").click(function(){
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
                    error_noty(msg.description);
                }
            }
            requestAjax(params, 'POST', '/signin', callback, true);
        })
    </script>
</body>
</html>