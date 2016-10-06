<div class="user-aside span3">
    <div class="people">
        <div class="basic-info">
            <div class="avatar">
                <img src="{{url_avatar($user->id) }}" alt="100"></div>
            <h3>
                <a href="{{url_user($user->id) }}">{{ $user->nickname }}</a>
            </h3>
            <div class="btn-group" id="follow_mail_block_user_2328399">
                <div class="btn btn-small btn-success follow">
                    <a data-signin-link="true" data-toggle="modal" href="javascript:void(0)"> <i class="fa fa-plus"></i>
                        <span>添加关注</span>
                    </a>
                </div>

                <a class="btn btn-small btn-list btn-success" data-toggle="dropdown" href="javascript:void(0)"> <i class="fa fa-bars"></i>
                </a>
                <ul class="dropdown-menu arrow-top" role="menu" aria-labelledby="dLabel">
                    <li>
                        <a data-signin-link="true" data-toggle="modal" href="javascript:void(0)">
                            <i class="fa fa-fw fa-envelope"></i>
                            写私信
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a data-signin-link="true" data-toggle="modal" href="javascript:void(0)">
                            <i class="fa fa-fw fa-lock"></i>
                            加入黑名单
                        </a>
                    </li>

                </ul>

            </div>
        </div>
        <div class="user-stats">
            <ul class="clearfix">
                <li>
                    <a href="javascript:void(0)"> <b>{{count_num($user->id,"focus")}}</b>
                        <span>关注</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)"> <b>{{count_num($user->id,"fans")}}</b>
                        <span>粉丝</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <b>{{count_num($user->id,"article")}}</b>
                        <span>文章</span>
                    </a>
                </li>
                <li>
                    <a>
                        <b>{{count_num($user->id,"view")}}</b>
                        <span>阅读量</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- <hr>
    notebooks -->
    <div class="qrcode">
        <div class="arrow-top"></div>
        <img width="320" height="320" quality="100" src="{{mkqrcode(url_user($user->id),url_avatar($user->id))}}">
    </div>
</div>