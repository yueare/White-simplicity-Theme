<?php
/**
 * 图片墙
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;
 ?>
<?php $this -> need('header.php'); ?>
<section class="blog-banner page">
	<div class="blog-banner-img" style="background-image:url('<?php $this->options->themeUrl('img/banner.jpg');?>');"></div>
	<h2><?php $this->title();?></h2>
</section>
<div id="main" style="margin-top: 25px;">
	<link rel="stylesheet" href="<?php $this -> options -> themeUrl('css/viewer.css'); ?>">
		<div  >
			<!-- SuperBox -->
			<div class="superbox">
				<?php
				Tools_Plugin::getPhotoUrl();
				?> 							
			</div>
			<!-- /SuperBox -->
		</div>
</div>
<script src="<?php $this -> options -> themeUrl('js/jquery.min.js'); ?>">
</script>
<script src="<?php $this -> options -> themeUrl('js/superbox.js'); ?>">
</script>


<script>
$(function() {
		
			// Call SuperBox
			$('.superbox').SuperBox();
		
		});
</script>
<?php $this -> need('footer.php'); ?>