<div class="navbar navbar-jianshu shrink">
    <div class="dropdown">
        <a class="dropdown-toggle logo" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="javascript:void(0)">乌</a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li>
                <a href="/"> <i class="fa fa-home"></i>
                    首页
                </a>
            </li>
            <li>
                <a href="javascript:void(0)"> <i class="fa fa-th"></i>
                    专题
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="navbar-user">
    @if (!Session::has('uid'))
        <a class="login" data-signup-link="true" data-toggle="modal" href="/signup">
            <i class="fa fa-user"></i>
            注册
        </a>
        <a class="login" data-signin-link="true" data-toggle="modal" href="/signin">
            <i class="fa fa-sign-in"></i>
            登录
        </a>
        <a class="daytime set-view-mode pull-right" href="javascript:void(0)">
            <i class="fa fa-moon-o"></i>
        </a>
    @else
        <a class="user avatar" data-toggle="dropdown" href="javascript:void(0)">
            <img src="http://upload.jianshu.io/users/upload_avatars/54826/971c311b865b.jpg?imageMogr/thumbnail/90x90/quality/100" alt="100"> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu arrow-top" role="menu" aria-labelledby="dLabel">
            <li>
                <a href="/writer">
                    <i class="fa fa-pencil"></i>
                    写文章
                </a>
            </li>
            <li>
                <a target="_blank" href="/user/166a91789ee2">
                    <i class="fa fa-user"></i>
                    我的主页
                </a>
            </li>
            <li>
                <a href="/bookmarks">
                    <i class="fa fa-bookmark"></i>
                    我的收藏
                </a>
            </li>
            <li>
                <a href="/notifications">
                    <i class="fa fa-bell"></i>
                    提醒
                </a>
            </li>
            <li>
                <a href="/chats">
                    <i class="fa fa-envelope"></i>
                    私信
                </a>
            </li>
            <li>
                <a href="/settings">
                    <i class="fa fa-cogs"></i>
                    设置
                </a>
            </li>
            <li>
                <a rel="nofollow" href="/signout">
                    <i class="fa fa-sign-out"></i>
                    登 出
                </a>
            </li>

        </ul>
        <a class="daytime set-view-mode pull-right" href="javascript:void(0)">
            <i class="fa fa-moon-o"></i>
        </a>
    @endif
</div>
<div class="navbar navbar-jianshu expanded">
    <div class="dropdown">
        <a class="active logo" role="button" data-original-title="个人主页" data-container="div.expanded" href="/"> <b>乌</b>
            <i class="fa fa-home"></i>
            <span class="title">首页</span>
        </a>
        <a data-toggle="tooltip" data-placement="right" data-original-title="专题" data-container="div.expanded" href="javascript:void(0)">
            <i class="fa fa-th"></i>
            <span class="title">专题</span>
        </a>
        @if (Session::has('uid'))
            <a data-toggle="tooltip" data-placement="right" data-original-title="朋友圈" data-container="div.expanded" href="timeline">
                <i class="fa fa-users"></i>
                <span class="title">朋友圈</span>
            </a>
            <a data-toggle="tooltip" data-placement="right" data-original-title="写文章" data-container="div.expanded" href="writer/">
                <i class="fa fa-pencil"></i>
                <span class="title">写文章</span>
            </a>
        @endif
    </div>
    <div class="nav-user">
        @if (!Session::has('uid'))
            <a href="#view-mode-modal" data-toggle="modal">
                <i class="fa fa-font"></i>
                <span class="title">显示模式</span>
            </a>
            <a class="signin" data-signin-link="true" data-toggle="modal" data-placement="right" data-original-title="登录" data-container="div.expanded" href="/signin">
                <i class="fa fa-sign-in"></i>
                <span class="title">登录</span>
            </a>
        @else
            <a data-toggle="tooltip" data-placement="right" data-original-title="我的主页" data-container="div.expanded" href="/user/166a91789ee2">
                <i class="fa fa-user"></i>
                <span class="title">我的主页</span>
            </a>
            <a data-toggle="tooltip" data-placement="right" data-original-title="我的收藏" data-container="div.expanded" href="/bookmarks">
                <i class="fa fa-bookmark"></i>
                <span class="title">我的收藏</span>
            </a>
            <a data-toggle="tooltip" data-placement="right" data-original-title="提醒" data-container="div.expanded" href="/notifications">
                <i id="notify-icon" class="fa fa-bell"></i>
                <span class="title">提醒</span>
            </a>
            <a data-toggle="tooltip" data-placement="right" data-original-title="简信" data-container="div.expanded" href="/chats">
                <i id="chat-message-icon" class="fa fa-envelope"></i>
                <span class="title">私信</span>
            </a>
            <a href="#view-mode-modal" data-toggle="modal">
                <i class="fa fa-font"></i>
                <span class="title">显示模式</span>
            </a>
            <a data-toggle="tooltip" data-placement="right" data-original-title="设置" data-container="div.expanded" href="/settings">
                <i class="fa fa-cogs"></i>
                <span class="title">设置</span>
            </a>
            <a data-toggle="tooltip" data-placement="right" data-original-title="登 出" data-container="div.expanded" rel="nofollow" href="/signout">
                <i class="fa fa-sign-out"></i>
                <span class="title">登 出</span>
            </a>
        @endif
    </div>
</div>