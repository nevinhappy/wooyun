@include("common/meta")

<body class="output fluid zh cn win reader-day-mode reader-font2" data-js-module="recommendation" data-locale="zh-CN">
    @include("common/navbar")

    <div class="row-fluid">

        <div class="recommended">

            <div class="span12">
                @include("common/topbar")
                <div id="list-container">
                    <ul class="article-list thumbnails">
                        @if ($articles)
                            @foreach ($articles as $article)
                                <li class="have-img">
                                    <a class="wrap-img" href="/article/{{ $article->id }}">
                                        @if ($article->thumbnail)
                                            @if ($article->column == 'drops')
                                                <img src="{{$article->thumbnail}}" alt="{{ $article->id }}">
                                            @else
                                                <img src="{{$image_domain}}{{$article->thumbnail}}" alt="{{ $article->id }}">
                                            @endif
                                        @else
                                            <img src="/res/default.jpg" alt="{{ $article->id }}">
                                        @endif
                                    </a>
                                    <div>
                                        <p class="list-top">
                                            <a class="author-name blue-link" target="_blank" href="javascript:void(0)">
                                                @if ($article->column == 'drops')
                                                    管理员
                                                @else
                                                    {{ $article->author }}
                                                @endif
                                            </a> <em>·</em>
                                            <span class="time" data-shared-at="{{ $article->created_at }}">{{ $article->created_at }}</span>
                                        </p>
                                        <h4 class="title">
                                            <a target="_blank" href="/article/{{ $article->id }}">{{ $article->title }}</a>
                                        </h4>
                                        <div class="list-footer">
                                            <a target="_blank" href="/article/{{ $article->id }}">阅读 {{ $article->view }}</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <div style="text-align:center;margin-bottom: 22px;"><h4>没有搜索到匹配的文章~</h4></div>
                        @endif

                    </ul>

                    <!-- <div class="load-more">
                        <button class="ladda-button more-btn" data-style="slide-left" data-type="script" data-remote="" data-size="medium" data-url="/" data-color="maleskine">
                            <span class="ladda-label">点击查看更多</span>
                            <span class="ladda-spinner"></span>
                        </button>
                    </div> -->

                </div>
            </div>
        </div>

        <div id="time-machine-modal" class="modal hide fade share-weixin-modal time-machine-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-stats2015-url="http://www.jianshu.com/stats2015">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
        </div>

    </div>
    @include('common/footer')

    <script type="text/javascript">
        var page = 1;
        var loadindex;
        $(window).scroll(function () {  
           var scrollTop = $(this).scrollTop();  
           var scrollHeight = $(document).height();  
           var windowHeight = $(this).height();  
           if (scrollTop + windowHeight == scrollHeight) {  
                loadindex = layer.load();
                setTimeout("loaddata()",1500);
           }  
        });  
        function loaddata(){
            var params = {p:page+1,column:"{{ $column }}",q:"{{ $keyword }}",_token:"{{csrf_token()}}"};
            var callback = function(msg){
                layer.close(loadindex);
                if(msg.result == 0){
                    if(!msg.data){
                        layer.msg("没有更多数据了");
                        return;
                    }
                    page++;
                    var _html = "";
                    $(msg.data).each(function(index,article){
                        var url = "/article/"+article.id;
                        var author,image;
                        if(article.column == 'drops'){
                            author = "管理员";
                        }else{
                            author = article.author;
                        }
                        if(article.thumbnail){
                            if(article.column == 'drops'){
                                image = article.thumbnail;
                            }else{
                                image = "{{$image_domain}}"+article.thumbnail;
                            }
                        }else{
                            image = "/res/default.jpg";
                        }
                        _html += ['<li class="have-img">',
                            '<a class="wrap-img" href="'+url+'">',
                                '<img src="'+image+'" alt="'+article.id+'"></a>',
                            '<div>',
                                '<p class="list-top">',
                                    '<a class="author-name blue-link" target="_blank" href="javascript:void(0)">'+author+'</a>',
                                    ' <em>·</em>',
                                    '<span class="time" data-shared-at="'+article.created_at+'">'+article.created_at+'</span>',
                                '</p>',
                                '<h4 class="title">',
                                    '<a target="_blank" href="'+url+'">'+article.title+'</a>',
                                '</h4>',
                                '<div class="list-footer">',
                                    '<a target="_blank" href="'+url+'">阅读 '+article.view+'</a>',
                                '</div>',
                            '</div>',
                        '</li>'].join('');
                    })
                    if(_html){
                        $(".article-list").append(_html);
                    }
                }else{
                    layer.msg(msg.description);
                }
            }
            requestAjax(params, 'get', '/datas', callback, true);
        }
    </script>
</body>
</html>