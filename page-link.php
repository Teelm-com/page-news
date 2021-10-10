<?php
/*
Template Name: 实时热点
*/
if (!defined('ABSPATH')) {
    exit;
}
$ionewsKey = "b7IfHRk3TgLPYtJTjh0RzZUg4T7jjz";//此为测试key，使用时请更改为您自己的key

get_header(); ?>

<style type="text/css">
    .card{
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: rgba(255,255,255,.2);
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: .25rem;}
    .card-header {
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        border-bottom: 1px solid rgba(0,0,0,.125);
    }
    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
    }
    .io-hot-body{height:300px;}
    .io-hot-list a{text-decoration:none!important;color:#555!important;outline:none!important}
    .io-hot-list a:hover,.io-hot-list a:focus{color:#333!important;outline:none!important}
    .io-hot-list ul{margin:0;padding:0}
    .io-hot-list ul li {line-height:inherit!important}
    .d-flex{display:flex}
    .d-none{display:none}
    .ml-2{margin-left:.5rem}
    .mb-2{margin-bottom:.5rem}
    .ml-auto{margin-left:auto!important}
    .pl-2{padding-left:.5rem}
    .overflow-auto{overflow:auto!important}
    .align-items-center {
        -ms-flex-align: center!important;
        align-items: center!important;
    }
    .hot-rank {
        width: 1.25rem;
        border-radius: .25rem;
        white-space: nowrap;
        text-align: center;
        background: rgba(124,124,124,0.3);
        display: inline-block;
    }
    .hot-rank-1{color:#fff;background:#f1404b}
    .hot-rank-2{color:#fff;background:#c56831}
    .hot-rank-3{color:#fff;background:#b89e2c}
    .text-ss{font-size:.45rem!important}
    .text-xs{font-size:.75rem!important}
    .text-sm{font-size:.875rem!important}
    .text-md{font-size:1rem!important}
    .text-nowrap{white-space:nowrap;}
    @media (min-width:768px){
    .d-md-block{display:block!important}
    }

    @media only screen and (min-device-width:768px){
    .io-hot-list ::-webkit-scrollbar-thumb{background-color:rgba(130,130,130,.5);-webkit-border-radius:4px;border-radius:4px}
    .io-hot-list ::-webkit-scrollbar-thumb:hover{background-color:#f1404b;-webkit-border-radius:4px;border-radius:4px}
    .io-hot-list ::-webkit-scrollbar{width:5px;height:5px} 
    .io-hot-list ::-webkit-scrollbar-thumb:active{background-color:#f1404b;-webkit-border-radius:4px;border-radius:4px}
    .io-hot-list ::-webkit-scrollbar-corner{background:rgba(0,0,0,0);border-radius:0 0 8px 0}
    .io-hot-list ::-webkit-scrollbar-button{background-color:rgba(0,0,0,0);height:2px;width:2px}
    }
    .page .content-area{
        max-width: 100%;
    }
    .b2_gap>li {
        width: 25%;
        box-sizing: border-box;
    }
    .night .io-hot-list a:hover, .night .io-hot-list a:focus {
        color: #0066ff!important;
        outline: none!important;
    }
    .io-hot-list a {
        text-decoration: none!important;
        color: #909399!important;
        outline: none!important;
    }
    @media screen and (max-width: 768px){
        ul.b2_gap>li {
            width: 100%!important;
        }
    }
        
</style>
<div class="collection-top mg-b" style="background-image:url(https://api.oneNeko.com/bing);background-size: cover !important;">
    <h1><?php echo get_the_title() ?></h1>
    <p>实时热点，深锐观察，聚合全网实时热点事件！</p>
    <p>包括了知乎、微博、虎扑、B站、贴吧、豆瓣、抖音、今日头条等等</p>
</div>
<div class="b2-single-content wrapper category single-sidebar-hidden ">
    <div id="primary-home" class="content-area">
        <div class="archive-row">
            <div class=" post-1 post-item-1 post-list hidden-line">
                <ul class="b2_gap ">
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100000&select=io_news"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news1" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100001&select=io_news1"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news2" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100002&select=io_news2"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news3" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100003&select=io_news3"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news4" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100004&select=io_news4"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news5" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100005&select=io_news5"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news6" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100006&select=io_news6"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news7" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100007&select=io_news7"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news8" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100008&select=io_news8"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news9" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100009&select=io_news9"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news10" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100010&select=io_news10"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news11" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100011&select=io_news11"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news12" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100012&select=io_news12"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news13" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100013&select=io_news13"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news14" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100014&select=io_news14"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news15" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100015&select=io_news15"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news16" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100016&select=io_news16"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news17" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100017&select=io_news17"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news18" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100018&select=io_news18"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news19" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100019&select=io_news19"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news20" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100020&select=io_news20"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news21" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100021&select=io_news21"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news22" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100022&select=io_news22"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news23" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100023&select=io_news23"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news24" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100024&select=io_news24"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news25" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100025&select=io_news25"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news26" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100026&select=io_news26"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news27" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100027&select=io_news27"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news28" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100028&select=io_news28"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news29" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100029&select=io_news29"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news30" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100030&select=io_news30"></script>
                        </div>
                    </li>
                    <li class="post-list-item item-post-style-1">
                        <div class="item-in box b2-radius">
                            <div id="io_news31" class="rule-content">加载中...</div>
                            <script src="https://ionews.top/hot.php?key=<?php echo $ionewsKey; ?>&id=100031&select=io_news31"></script>
                        </div>
                    </li>
                </ul>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
<?php get_footer();
