<?php
/**
 * 标签云
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="blog-banner page">
	<div class="blog-banner-img" style="background-image:url('<?php $this->options->themeUrl('img/banner.jpg');?>');"></div>
	<h2><?php $this->title();?></h2>
</section>
<article class="post widget" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="post-body post-text">
		<ul class="tag-list">
		<?php $this->widget('Widget_Metas_Tag_Cloud')->parse('<li><a href="{permalink}" title="{count}个话题">{name}({count})</a></li>');?>
		</ul>
	</div>
</article>
<?php $this->need('footer.php'); ?>
