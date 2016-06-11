<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);


    //开启滚动图
    $isshowbaner = new Typecho_Widget_Helper_Form_Element_Text('isshowbaner', NULL, NULL, _t('开启首页滚动图'), _t('输入true or false'));
    $form->addInput($isshowbaner); 
    //滚动图数组
    $picture1 = new Typecho_Widget_Helper_Form_Element_Text('picture1', NULL, NULL, _t('滚动图1-970x300'), _t('在这里填入一个图片URL地址'));
    $form->addInput($picture1);
    $picture2 = new Typecho_Widget_Helper_Form_Element_Text('picture2', NULL, NULL, _t('滚动图2-970x300'), _t('在这里填入一个图片URL地址'));
    $form->addInput($picture2);
    $picture3 = new Typecho_Widget_Helper_Form_Element_Text('picture3', NULL, NULL, _t('滚动图3-970x300'), _t('在这里填入一个图片URL地址'));
    $form->addInput($picture3);
     $picture4 = new Typecho_Widget_Helper_Form_Element_Text('picture4', NULL, NULL, _t('滚动图4-970x300'), _t('在这里填入一个图片URL地址'));
    $form->addInput($picture4);
     $picture5 = new Typecho_Widget_Helper_Form_Element_Text('picture5', NULL, NULL, _t('滚动图5-970x300'), _t('在这里填入一个图片URL地址'));
    $form->addInput($picture5);
     $picture6 = new Typecho_Widget_Helper_Form_Element_Text('picture6', NULL, NULL, _t('滚动图6-970x300'), _t('在这里填入一个图片URL地址'));
    $form->addInput($picture6);

   
  


    
	$blogBanner = new Typecho_Widget_Helper_Form_Element_Text('blogBanner', NULL, NULL, _t('博客推荐文章'), _t('在这里填入一个带图片的文章cid'));
    $form->addInput($blogBanner);
	
	$siteIcp = new Typecho_Widget_Helper_Form_Element_Text('siteIcp', NULL, NULL, _t('网站备案号'), _t('在这里填入网站备案号'));
    $form->addInput($siteIcp);
	
	$siteIntro = new Typecho_Widget_Helper_Form_Element_Textarea('siteIntro', NULL, NULL, _t('关于博客'), _t('在这里博客的介绍'));
    $form->addInput($siteIntro);
	
	$siteStat = new Typecho_Widget_Helper_Form_Element_Textarea('siteStat', NULL, NULL, _t('统计代码'), _t('在这里填入网站统计代码'));
    $form->addInput($siteStat);
	
	$avatarDomain = new Typecho_Widget_Helper_Form_Element_Text('avatarDomain', NULL, 'http://cn.gravatar.com', _t('头像地址'),_t('替换Typecho使用的Gravatar头像服务器（ www.gravatar.com ）'));
	$form->addInput($avatarDomain);

	//附件源地址
    $src_address = new Typecho_Widget_Helper_Form_Element_Text('src_add', NULL, NULL, _t('替换前地址'), _t('即你的附件存放地址，如http://www.yourblog.com/usr/uploads/'));
    $form->addInput($src_address);
    //替换后地址
    $cdn_address = new Typecho_Widget_Helper_Form_Element_Text('cdn_add', NULL, NULL, _t('替换后'), _t('即你的七牛云存储域名，如http://yourblog.qiniudn.com/'));
    $form->addInput($cdn_address);
	
	//默认缩略图
    $default = new Typecho_Widget_Helper_Form_Element_Text('default_thumb', NULL, '', _t('默认缩略图'),_t('文章没有图片时显示的默认缩略图，为空时表示不显示'));
    $form->addInput($default);
    //默认宽度
    $width = new Typecho_Widget_Helper_Form_Element_Text('thumb_width', NULL, '200', _t('缩略图默认宽度'));
    $form->addInput($width);
    //默认高度
    $height = new Typecho_Widget_Helper_Form_Element_Text('thumb_height', NULL, '140', _t('缩略图默认高度'));
    $form->addInput($height);

}
/**
 * 解析内容以实现附件加速
 * @access public
 * @param string $content 文章正文
 * @param Widget_Abstract_Contents $obj
 */
function parseContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    if(!empty($options->src_add) && !empty($options->cdn_add)){
        $obj->content = str_ireplace($options->src_add,$options->cdn_add,$obj->content);
    }
    echo trim($obj->content);
}
/**
 * 获取gravatar头像地址
 *
 * @param string $mail
 * @param int $size
 * @param string $rating
 * @param string $default
 * @return string
 */
function gravatarUrl($mail, $size=32, $rating=null, $default=null){
	$url = Typecho_Widget::widget('Widget_Options')->avatarDomain;
	$url .= '/avatar/';
	if (!empty($mail)) {
		$url .= md5(strtolower(trim($mail)));
	}
	$url .= '?s=' . $size;
	$url .= '&amp;r=' . ($rating==null?Typecho_Widget::widget('Widget_Options')->commentsAvatarRating : $rating);
	$url .= '&amp;d=' . $default;
	return $url;
}
function thumbnail($obj,$size=null,$link=false,$pattern='<div class="post-thumb"><a class="thumb" href="{permalink}" title="{title}" style="background-image:url({thumb})"></a></div>'){

    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    if(isset($matches[1][0])){
        $thumb = $matches[1][0];;
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
        if($size!='full'){
            $thumb_width = $options->thumb_width;
            $thumb_height = $options->thumb_height;
    
            if($size!=null){
                $size = explode('x', $size);
                if(!empty($size[0]) && !empty($size[1])){
                    list($thumb_width,$thumb_height) = $size;
                }
            }
            $thumb .= '?imageView2/4/w/'.$thumb_width.'/h/'.$thumb_height;
        }
    }

	if(empty($thumb) && empty($options->default_thumb)){
	    return '';
	}else{
	    $thumb = empty($thumb) ? $options->default_thumb : $thumb;
	}
	if($link){
	    return $thumb;
	}
	echo str_replace(
	    array('{title}','{thumb}','{permalink}'),
	    array($obj->title,$thumb,$obj->permalink),
	    $pattern);
}
function randColor(){
	$colors=array('0fc317','601165','f74e1e','339FD6','5A606F');
	return $colors[rand(0,4)];
}
/**
 * 重写评论显示函数
 */
function threadedComments($comments, $options){
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    ?>
<li id="li-<?php $comments->theId(); ?>" class="<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
?>">
    <div class="comment-body" id="<?php $comments->theId(); ?>">
		<div class="comment-avatar">
            <?php //$comments->gravatar(48, $options->defaultAvatar); ?>
			<img class="avatar" src="<?php echo gravatarUrl($comments->mail,48,null,$options->defaultAvatar)?>" alt="<?php echo $comments->author;?>" width="48" height="48">
        </div>
    <div class="comment-meta">
        <div class="comment-meta-author">
           <?php if($comments->url) {?>
			<a href="<?php $comments->url();?>" rel="external nofollow" target="_blank"><?php echo $comments->author;?></a>
			<?php } else { ?>
				<?php $comments->author();?>
			<?php }?>
        </div>
        <div class="comment-meta-time"><?php $options->beforeDate();$comments->date($options->dateFormat);$options->afterDate(); ?></div>
        <?php if ('waiting' == $comments->status) { ?>
        <em class="comment-awaiting-moderation"><?php $options->commentStatus(); ?></em>
        <?php } ?>
    </div>
    <div class="comment-content">
    <?php $comments->content();// ?>
    </div>
     <div class="comment-meta-reply">
		<?php $comments->reply($options->replyWord); ?>
	</div>
	</div>
    <?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments(); ?>
    </div>
    <?php } ?>
	
</li>
<?php
}
