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
    <link rel="shortcut icon" href="<?php  if($this->options->logoUrl): echo $this->options->logoUrl; else: $this->options->themeUrl('images/favicon.png');endif; ?>">
    <script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/common.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/unslider.js'); ?>"></script>

	

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
<div id="overlay">
	<i class="fa fa-remove" id="overlay-close"></i>
	<div class="overlay-layer" id="overlay-about">
		<?php $this->options->siteIntro(); ?>
	</div>
	<div class="overlay-layer" id="overlay-menu">
		<a class="nav-home <?php if($this->is('index')): ?>current<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		<?php while($pages->next()): ?>
		<a class="nav-<?php $pages->slug();?> <?php if($this->is('page', $pages->slug)): ?> current<?php endif; ?>" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
		<?php endwhile; ?>
	</div>
</div>
<div id="wrapper">
<header>
	
	<a href="#" class="btn-menu"><i class="fa fa-bars"></i></a>
	<nav id="nav-menu" class="clearfix">
		<a class="nav-home <?php if($this->is('index')): ?>current<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		<?php while($pages->next()): ?>
		<a class="<?php if($pages->sequence == 2){ _e('nav-left ');}?> nav-<?php $pages->slug();?> <?php if($this->is('page', $pages->slug)): ?> current<?php endif; ?>" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
		<?php endwhile; ?>
		<a style="float: right;margin-right: 0; ">你的指尖有改变世界的力量</a>
	</nav>
</header><!-- end #header -->
<div id="body">