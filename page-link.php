<?php
/*
Template Name: 友情链接
*/
if (!defined('ABSPATH')) {
    exit;
}
if( isset($_POST['mg_form']) && $_POST['mg_form'] == 'send'){
    global $wpdb;
    
    $link_name = isset( $_POST['mg_name'] ) ? trim(htmlspecialchars($_POST['mg_name'], ENT_QUOTES)) : '';
    $link_url = isset( $_POST['mg_url'] ) ? trim(htmlspecialchars($_POST['mg_url'], ENT_QUOTES)) : '';
    $link_description = isset( $_POST['mg_description'] ) ? trim(htmlspecialchars($_POST['mg_description'], ENT_QUOTES)) : '';
    $link_notes = isset( $_POST['link_notes'] ) ? trim(htmlspecialchars($_POST['link_notes'], ENT_QUOTES)) : '';
    $link_image = isset( $_POST['link_image'] ) ? trim(htmlspecialchars($_POST['link_image'], ENT_QUOTES)) : '';
    $link_target = "_blank";
    $link_visible = "N";
    
    if ( empty($link_name) || mb_strlen($link_name) > 20 ){
        wp_die('连接名称必须填写，且长度不得超过20字');
    }
    
    if ( empty($link_description) || mb_strlen($link_description) > 100 ){
        wp_die('网站描述必须填写，且长度不得超过100字');
    }
    
    if ( empty($link_notes)){
        wp_die('QQ必须填写');
    }
    
    if ( empty($link_url) || strlen($link_url) > 60 || !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link_url)){
        wp_die('链接地址必须填写');
    }
    
    $sql_link = $wpdb->insert(
    $wpdb->links,
        array(
            'link_name' => $link_name.' — 待审核',
            'link_url' => $link_url,
            'link_target' => $link_target,
            'link_description' => $link_description,
            'link_notes' => $link_notes,
            'link_image' => $link_image,
            'link_visible' => $link_visible
        )
    );
    
    $result = $wpdb->get_results($sql_link);
    wp_die('提交成功，等待站长审核中！');
}

$faviconApi = "https://api.szfx.top/ico/?url=";

get_header();

// 网址访问判断
function httpcode($url){
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_exec($ch);
    return $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
}
//链接访问状态判断函数
function link_status($link)
{
//ini_set('max_execution_time',15);
$status=httpcode($link);
if($status == 200 || $status == 302 || $status == 301 || $status == 21 ) 
    return "<span class=\"check\"><i class=\"b2font b2-check-line\" aria-hidden=\"true\"></i>访问正常</span>";
else
    return "<span class=\"close\"><i class=\"b2font b2-skull-2-line\" aria-hidden=\"true\"></i>访问异常</span>";
}
 ?>

<style type="text/css">
    h3 {
        font-size: 1.1rem;
        margin-top: 20px
    }

    strong {
        font-weight: bolder
    }

    .contextual-callout p {
        font-size: 13px
    }

    .contextual-callout {
        background-color: rgba(241,64,75,0.12);
        color: #f1404b!important;
        padding: 15px;
        margin: 10px 0 20px;
        border-radius: 3px;
        font-size: 1.3rem;
        line-height: 1.5;
        border: 1px solid rgba(241,64,75,0.07);
        border-left: 4px #f1404b
    }

    .contextual-callout>h4 {
        margin-bottom: 16px;
        text-align: center;
        font-size: 1rem;
        color: #f1404b
    }

    .link-header h1 {
        font-size: 1.6rem;
        line-height: 30px;
        text-align: center;
        margin: 0 0 15px 0
    }

    .link-page {
        margin: 30px 0
    }

    .mb-3,.my-3 {
        margin-bottom: 1rem!important
    }

    .row {
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px
    }

    .col {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px
    }

    .col-6 {
        flex: 0 0 50%;
        max-width: 50%
    }

    .url-card .url-body {
        transform: translateY(0px);
        transition: all .3s ease
    }

    .url-card .url-body:hover {
        transform: translateY(-6px);
        box-shadow: 0 26px 40px -24px rgba(0,36,100,0.30);
    }

    .card,.block {
        border-width: 0;
        margin-bottom: 1rem;
        box-shadow: 0 3px 5px rgb(32 160 255 / 15%);
        transition: background-color .3s
    }

    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: .25rem
    }

    .url-card .card-body {
        padding: .938rem;
        z-index: 1
    }

    .card-body {
        flex: 1 1 auto;
        height: 100px;
        padding: 1.25rem
    }

    .d-flex {
        display: -ms-flexbox!important;
        display: flex!important
    }

    .url-card .url-img {
        width: 40px;
        height: 40px;
        flex: none;
        background: rgba(128,128,128,.1);
        overflow: hidden
    }

    .mr-2,.mx-2 {
        margin-right: .5rem!important
    }

    .align-items-center {
        align-items: unset;
    }

    .justify-content-center {
        justify-content: center!important
    }

    .rounded-circle {
        border-radius: 50%!important
    }

    .url-card .url-img>img {
        max-height: 100%;
        vertical-align: unset
    }

    .url-card .url-info {
        overflow: hidden;
        padding-right: 5px
    }

    .flex-fill {
        flex: 1 1 auto!important
    }

    .overflowClip_1 {
        overflow: hidden;
        text-overflow: ellipsis;
        word-break: break-all;
        display: -webkit-box!important;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical
    }
    
    #check_s {
        position: absolute;
        top: 1px;
        right: 5px
    }
    
    #check_s .check {
        color: #56ea56
    }
    
    #check_s .close {
        color: #333
    }
    
    .text-sm {
        font-size: .875rem!important
    }

    .text-xs {
        font-size: .75rem!important
    }

    .overflowClip_1 a {
        color: #282a2d;
        outline: 0!important;
        text-decoration: none
    }

    @media(min-width:768px) {
        .col-md-3 {
            flex: 0 0 25%;
            max-width: 25%
        }
    }

    @media(max-width:767.98px) {
        .row [class*="col-"] {
            padding-right: .5rem;
            padding-left: .5rem
        }
        #check_s {
            top: -2px;
        }
    }

    .add-link-form .login-form-item textarea {
        width: 100%;
        min-height: 100px;
        padding: 10px;
        transition: .3s;
        border: 1px solid #e8e8e8;
        padding-right: 46px;
    }

    .login-form-item textarea:focus + span,.login-form-item textarea[class="active"] + span,.login-form-item textarea:valid + span {
        left: 10px;
        cursor: default;
    }

    .login-form-item textarea:focus + span:after,.login-form-item textarea[class="active"] + span:after,.login-form-item textarea:valid + span:after {
        content: '';
        width: 100%;
        height: 200px;
        height: 3px;
        background: #fff;
        top: 6px;
        position: absolute;
        left: 0;
        z-index: 0;
        opacity: 1;
    }

    .night .login-form-item textarea:focus + span:after, .night .login-form-item textarea[class="active"] + span:after, .night .login-form-item textarea:valid + span:after {
        background: #121212;
    }

    .night .add-link-form .login-form-item textarea {
        border: 1px solid #8590a6;
        background: #121212;
        color: #8590a6;
    }
    .night .url-card .url-body:hover {
        box-shadow: 0 26px 40px -24px rgb(255 255 255 / 30%);
    }
    .night .card {
        background-color: #8590a6;
    }
    .night .overflowClip_1 a {
        color: #f7f9fa;
    }
</style>
<div class="b2-single-content wrapper">
    <div id="primary-home" class="content-area" style="max-width:100%">
        <article class="single-article b2-radius box">
            <main class="site-main">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" class="type-post post">
                        <h1 class="h2 mb-4"><?php echo get_the_title() ?></h1>
                        <div class="add-link">
							<form method="post" class="add-link-form" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
								<p class="login-form-item">
									<input type="text" size="20" value="" class="active" id="mg_name" name="mg_name" required="required" />
                                    <span><b>链接名称 *</b></span>
								</p>
								<p class="login-form-item">
									<input type="text" size="40" value="" class="active" id="mg_url" name="mg_url" required="required" />
                                    <span><b>链接地址 *</b></span>
								</p>
								<p class="login-form-item">
							    	<input type="text" value="" class="active" id="link_image" name="link_image"  />
                                    <span><b>LOGO地址</b></span>
								</p>
								<p class="login-form-item">
									<input type="text" size="12" value="" class="active" id="link_notes" name="link_notes" required="required" />
                                    <span><b>QQ *</b></span>
								</p>
								<p class="login-form-item">
									<textarea id="mg_description" class="active" name="mg_description" tabindex="1" placeholder="简短的描述一下你的网站..." ></textarea>
                                    <span><b>网站描述 *</b></span>
								</p>
								<p class="login-form-item">
									<input type="hidden" value="send" name="mg_form" />
									<button type="submit" class="">提交申请</button>
								</p>
							</form>
						</div>
                        <div class="content">
                            <div class="single-content">
                                    <h3>一、申请友链可以直接在本页面自助申请，内容包括网站名称、链接以及相关说明，为了节约你我的时间，可先做好本站链接再申请，我将尽快答复</h3>
                                    <h3>二、欢迎申请友情链接，只要是正规站常更新即可，申请首页链接需符合以下几点要求：</h3>
                                    <ul>
                                        <li>&#x2714; 申请前请先加上本站链接；</li>
                                        <li>&#x2714; 本站优先招同类原创、内容相近的博客或网站；</li>
                                        <li>&#x2714; Baidu和Google有正常收录，百度近期快照，不含有违法国家法律内容的合法网站，TB客，垃圾站不做。</li>
                                        <li>&#x2714; 如果您的站原创内容少之又少，且长期不更新，申请连接不予受理！</li>
                                        <li>&#x2714; 友情链接的目的是常来常往，凡是加了友链的朋友，我都会经常访问的，也欢迎你来我的网站参观、留言等。</li>
                                    </ul>
                                    <p>&#x2757; 长期不更新的会视情节把友链转移至内页。</p>
                                    <div class="contextual-callout">
                                        <h4>友链申请示例</h4>
                                        <p>本站名称：<?php echo get_bloginfo('name') ?><br>
                                            本站链接：<?php echo esc_url(home_url()) ?><br>
                                            本站描述：<?php echo get_bloginfo('description') ?></p>
                                    </div>
                                    <p>PS:链接由于无法访问或您的博客没有发现本站链接等其他原因，将会暂时撤销超链接，恢复请留言通知我，望请谅解，谢谢！</p>
                                <?php the_content(); ?>
                            </div>
                            <!-- .single-content -->
                            <article class="link-page">

                                <?php $default_ico = B2_CHILD_URI . '/Assets/image/ieicon.jpg';
                                $linkcats = get_terms('link_category');
                                if (!empty($linkcats)) {
                                    foreach ($linkcats as $linkcat) {
                                        echo '<div class="link-title mb-3"><h3 class="link-cat"><i class="b2font b2-hashtag"></i>' . $linkcat->name . '</h3></div>';
                                        $bookmarks = get_bookmarks(array(
                                            'orderby' => 'rating',
                                            'order' => 'asc',
                                            'category' => $linkcat->term_id,
                                        ));
                                        echo '<div class="row">';
                                        foreach ($bookmarks as $bookmark) {
                                            $ico = $faviconApi . format_url($bookmark->link_url,true);
                                            ?>
                                            <div class="url-card col col-6 col-md-3">
                                                <div class="card url-body default">
                                                    <span class="insert-post-bg">
                                                        <picture class="picture"><source type="image/webp" srcset="<?php echo $ico; ?>"><img
                                                                    alt="<?php echo $bookmark->link_name; ?>" class="b2-radius lazy" data-src="<?php echo $ico; ?>"
                                                                    src="<?php echo B2_DEFAULT_IMG; ?>" data-was-processed="false">
                                                        </picture>
                                                    </span>
                                                    <div class="card-body">
                                                        <div class="url-content d-flex align-items-center">
                                                            <div class="url-img rounded-circle mr-2 d-flex align-items-center justify-content-center">
                                                                <img class="lazy" src="<?php echo B2_DEFAULT_IMG; ?>" data-src="<?php echo $ico; ?>"
                                                                     onerror="javascript:this.src='<?php echo $default_ico; ?>'" alt="<?php echo $bookmark->link_name; ?>">
                                                            </div>
                                                            <div class="url-info flex-fill">
                                                                <div class="text-sm overflowClip_1">
                                                                    <a href="<?php echo $bookmark->link_url; ?>"
                                                                       title="<?php echo $bookmark->link_name; ?>"
                                                                       target="_blank"><strong><?php echo $bookmark->link_name; ?></strong></a>
                                                                </div>
                                                                <p class="overflowClip_1 m-0 text-xs"><?php echo $bookmark->link_description ?></p>
                                                            </div>
                                                            <div id="check_s" class="text-sm"><?php echo link_status($bookmark->link_url) ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        echo '</div>';
                                    }
                                } else {
                                    echo '<div class="row">';
                                    $bookmarks = get_bookmarks(array(
                                        'orderby' => 'rating',
                                        'order' => 'asc'
                                    ));
                                    foreach ($bookmarks as $bookmark) {
                                        $ico = $faviconApi . format_url($bookmark->link_url,true);
                                        ?>
                                        <div class="url-card col col-6 col-md-3">
                                            <div class="card url-body default">
                                                <div class="card-body">
                                                    <div class="url-content d-flex align-items-center">
                                                        <div class="url-img rounded-circle mr-2 d-flex align-items-center justify-content-center">
                                                            <img class="lazy" src="<?php echo B2_DEFAULT_IMG; ?>" data-src="<?php echo $ico; ?>" onerror="javascript:this.src='<?php echo $default_ico; ?>'" alt="">
                                                        </div>
                                                        <div class="url-info flex-fill">
                                                            <div class="text-sm overflowClip_1">
                                                                <a href="<?php echo $bookmark->link_url; ?>"
                                                                   title="<?php echo $bookmark->link_name; ?>"
                                                                   target="_blank"><strong><?php echo $bookmark->link_name; ?></strong></a>
                                                            </div>
                                                            <p class="overflowClip_1 m-0 text-xs"><?php echo $bookmark->link_description ?></p>
                                                        </div>
                                                        <div id="check_s" class="text-sm"><?php echo link_status($bookmark->link_url) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    echo '</div>';
                                } ?>
                                <div class="clear"></div>
                            </article>
                        </div>
                        <!-- .content -->
                    </article><!-- #page -->
                <?php endwhile; ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php if (comments_open() || get_comments_number()) : ?>
                        <?php comments_template('', true); ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </main>
        </article>
    </div>
<?php get_footer();

