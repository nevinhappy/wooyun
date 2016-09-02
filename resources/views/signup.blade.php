@include("common/meta")
<body class="output fluid zh cn win reader-day-mode reader-font2" data-js-module="recommendation" data-locale="zh-CN">
@include("common/navbar")
<div class="container">

    <div class="login-page">
        <div class="logo">
            <img src="/res/logo.png" alt="Img logo"></div>
        <h4 class="title">
            <span>
                <a class="" data-pjax="true" href="/signin">登录</a> <b>·</b>
                <a class="active" data-pjax="true" href="/signup">注册</a>
            </span>
        </h4>
        <div id="pjax-container">
            <div class="sign-up" data-js-module="sign-up-form">
                <form id="sign_up" class="form-horizontal" action="/users" accept-charset="UTF-8" method="post">
                    <input name="utf8" type="hidden" value="✓">
                    <input type="hidden" name="authenticity_token" value="M6IXz1ARvvyHpqmHCnHMjnRcRWJmTcvyG6tw7+j/0m7y4CRdUVaEcGSlFjqF9xQcjWZWh0XpyIetD1R53meExQ==">

                    <p id="signup_errors" class="signin_error hide"></p>
                    <div class="input-prepend">
                        <span class="add-on"> <i class="fa fa-envelope-o"></i>
                        </span>
                        <input type="text" name="email" id="sign_up_email" value="" class="span2" placeholder="你的邮件地址"></div>
                    <div class="input-prepend">
                        <span class="add-on"> <i class="fa fa-user"></i>
                        </span>
                        <input type="text" name="nickname" id="nickname" value="" class="span2" placeholder="选一个昵称"></div>
                    <div class="input-prepend">
                        <span class="add-on">
                            <i class="fa fa-unlock-alt"></i>
                        </span>
                        <input type="password" name="password" id="sign_up_password" class="span2" placeholder="输入密码"></div>

                    
                    <div id="geetest-captcha"></div>

                    <button name="button" type="submit" class="ladda-button submit-button" data-color="green" data-disable-with="<span class='ladda-label'>loading</span>
                    ">
                    <span class="ladda-label">注册</span>
                </button>

                <!-- <p class="sign_up_msg">
                    点击 “注册” 或下方社交登录按钮，即表示您同意并愿意遵守简书
                    <a href="http://www.jianshu.com/p/c44d171298ce">用户协议</a>
                    和
                    <a href="http://www.jianshu.com/p/2ov8x3">隐私政策</a>
                    。
                </p> -->
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
</body>
</html>