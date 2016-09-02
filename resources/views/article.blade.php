@include("common/meta")

<body class="output fluid zh cn win reader-day-mode reader-font2" data-js-module="recommendation" data-locale="zh-CN">
    @include("common/navbar")

    <div class="row-fluid">

        <div class="recommended">

            <div class="span12">
                @include("common/topbar")
                <div id="list-container">
                    <ul class="article-list thumbnails">
                        <div style="text-align: center;margin: 25px 0;">
                            <h1>{{ $article->title }}</h1>
                        </div>
                        {!! $article->content !!}
                    </ul>

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

</body>
</html>