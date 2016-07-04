<?php
/**
 * 瀑布流图片
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;
 ?>
<?php $this -> need('header.php'); ?>
<section class="blog-banner-page page">
	<div class="blog-banner-img" style="background-image:url('<?php $this->options->themeUrl('img/banner.jpg');?>');"></div>
	<h2><?php $this->title();?></h2>
</section>
<div id="main" style="margin-top: 25px;">
	<link rel="stylesheet" href="<?php $this -> options -> themeUrl('css/animate.css'); ?>">
	<link rel="stylesheet" href="<?php $this -> options -> themeUrl('css/magnific-popup.css'); ?>">
	<link rel="stylesheet" href="<?php $this -> options -> themeUrl('css/salvattore.css'); ?>">
	<link rel="stylesheet" href="<?php $this -> options -> themeUrl('css/viewer2.css'); ?>">
		<div class="container">

			<div class="row">

        	<div id="fh5co-board" data-columns>

        	 <?php
                Tools_Plugin::getPhotofallsUrl();
             ?> 
        </div>
       </div>
	</div>
</div>
<script src="<?php $this -> options -> themeUrl('js/jquery.min.js'); ?>"></script>
<script src="<?php $this -> options -> themeUrl('js/jquery.waypoints.min.js'); ?>"></script>
<script src="<?php $this -> options -> themeUrl('js/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php $this -> options -> themeUrl('js/salvattore.min.js'); ?>"></script>
<script src="<?php $this -> options -> themeUrl('js/main.js'); ?>"></script>

<?php $this -> need('footer.php'); ?>