<?php
/**
 * 读者墙
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="blog-banner page">
	<div class="blog-banner-img" style="background-image:url('<?php $this->options->themeUrl('img/banner.jpg');?>');"></div>
	<h2><?php $this->title();?></h2>
</section>
<article class="post">
	<div class="post-body post-text">
		<div class="readers">
		<?php Avatars_Plugin::output('li','mostactive'); ?> 
		</div>
	</div>
</article>
<?php $this->need('footer.php'); ?>
