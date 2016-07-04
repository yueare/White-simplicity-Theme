<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/bar.css'); ?>">
    <link rel="shortcut icon" href="<?php  if($this->options->logoUrl): echo $this->options->logoUrl; else: $this->options->themeUrl('images/favicon.png');endif; ?>">
    <script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/common.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/unslider.js'); ?>"></script>
<script>
$(window).load(function () {



$(".mobile-inner-header-icon").click(function(){

	


	$(this).toggleClass("mobile-inner-header-icon-click mobile-inner-header-icon-out");
	$(".mobile-inner-nav").slideToggle(250,function(){



		var display= $(".mobile-inner-nav").css('display');
		if(display=='none')
		{
			$(".mobile-inner-nav").removeAttr('style');
		}

	});
	
	
});

	$(".mobile-inner-nav a").each(function( index ) {
		$( this ).css({'animation-delay': (index/10)+'s'});
	});
		
});
</script>
	

<!--引入开始-->



    <!--[if lt IE 9]>
    <script src="//cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
	<script type="text/javascript">
		window.action = "<?php $this->options->index('action/');?>";
	</script>

</head>
<body ondragstart="return false">
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<div id="wrapper">
<header>

<div class="mobile-inner-header">
<div class="logo">Yueare</div>


<div class="mobile-inner-nav" >
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<a href="<?php $this->options->siteUrl(); ?>"><?php _e('Yueare'); ?></a>
	<?php while($pages->next()): ?>
		<a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
	<?php endwhile; ?>
	
	<a href="#" id="search" class="search-toggle btn-toggle" data-toggle="search"><i class="fa fa-search"></i></a>
</div>

 <div class="search-panel expand-panel">
	
		<form id="site-srh-form" method="post" action="./">

			<input type="text" name="s" class="text" placeholder="<?php _e('请键入您感兴趣的内容'); ?>" />

			<button type="submit" class="submit btn" style="float: right;width: 100px;"><?php _e('搜索'); ?></button>
	<a href="#" class="search-toggle btn-toggle" style="float: left;" data-toggle="search">关闭</a>
		</form>
		
	</div>

<div class="mobile-inner-header-icon mobile-inner-header-icon-out"><span></span><span></span></div>

</div>
	

	
</header><!-- end #header -->
<div id="body">