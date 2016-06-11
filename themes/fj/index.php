<?php
/**
 * 响应式单栏主题,自定义Banner，
 * 请保留作者的信息。Thank you 
 * @package 白-简约#FFF
 * @author 风久宥
 * @version 1.0
 * @link http://www.yueare.com
 * @
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<?php $this->need('controls.php'); ?>
<?php if (!empty($this->options->blogBanner)): ?>
	<?php $this->request->setParam('cid',$this->options->blogBanner); $this->widget('Widget_Archive@banner','type=post')->to($blogBanner);$this->request->setParam('cid','');?>
	<div class="blog-banner">
		<?php $thumb = thumbnail($blogBanner,'970x420',true);if(!$thumb):?>
			<?php $thumb = $this->options->themeUrl.'/img/post_banner.jpg';?>
		<?php endif;?>
		<div class="blog-banner-img" style="background-image:url('<?php echo $thumb;?>');"></div>
		<div class="blog-banner-text">
			<div class="post-category"><?php $blogBanner->category(','); ?></div>
			<h2><a href="<?php $blogBanner->permalink() ?>"><?php $blogBanner->title() ?></a></h2>
			<ul class="post-meta">
				<li><a href="#comments"><i class="fa fa-comments"></i> <?php $blogBanner->commentsNum('%d'); ?></a></li>
				<li><a><i class="fa fa-eye"></i> <?php $blogBanner->viewsNum(); ?></a></li>
				<li><a class="btn-like" data-cid="<?php $blogBanner->cid(); ?>"><i class="fa fa-thumbs-up"></i> <span class="post-like-num"><?php $blogBanner->likesNum(); ?></span></a></li>
				<li><a><i class="fa fa-clock-o"></i> <?php $blogBanner->date('Y/m/d H:i:s'); ?></a></li>
			</ul>
		</div>
	</div>
<?php endif; ?>
<!-- 代码 开始 -->
<!-- 控制是否开启滚图 -->
<?php if($this->options->isshowbaner=="true"){?>

<?php 
	$pictures = array();
	$pictures[0]= $this->options->picture1;
	$pictures[1]= $this->options->picture2;
	$pictures[2]= $this->options->picture3;
	$pictures[3]= $this->options->picture4;
	$pictures[4]= $this->options->picture5;
	$pictures[5]= $this->options->picture6;
 ?>

<div class="unslider" >
   <ul style="padding: 0">
   		<?php 
   		for($i=0;$i<6;$i++)
   		{
   			if($pictures[$i]!=null)
   			{
   		?>
   			<li><img src="<?php echo $pictures[$i] ?>" /></li>
		<?php 
   			}
   		}
   		?> 
   </ul>
</div>


<script type="text/javascript">
	
$('.unslider').unslider({
    speed: 500,               // 动画的滚动速度
    delay: 3000,              //  每个滑块的停留时间
    complete: function() {},  //  每个滑块动画完成时调用的方法
    keys: true,               //  是否支持键盘
    dots: false,               //  是否显示翻页圆点
    fluid: true              //  支持响应式设计（有可能会影响到响应式）
});
</script>
<?php }?>

<!-- 代码 结束 -->
<div id="main" role="main">



<!-- 文章 start-->

	<?php $i=1;$tag=""; while($this->next()): ?>
		<!--奇偶标签 -->
		<?php  
		$i=$i*(-1); 
		if($i==1)
			$tag="";
		else
			$tag="-2";
		?>

        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        	<!-- 判断是否有图片 -->
			<?php $thumb = thumbnail($this,null,true);if($thumb):?>
			<!-- 有图片输出图片 -->
			<a href="<?php $this->permalink() ?>" class="post-thumb<?php echo $tag; ?>" style="background-image:url('<?php echo $thumb;?>');"></a>
			<div class="post-body<?php echo $tag; ?>">
				<!-- 无图片随即颜色 -->
				<?php else:?>
				<div class="post-body post-text" style="background-color:#<?php echo randColor();?>">
				<?php endif;?>
					<!-- 分类 -->
					<div class="post-category"><?php $this->category(','); ?></div>
					<!-- 标题 -->
					<h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
					<!-- 文章内容 -->
					<div class="post-content" itemprop="articleBody">
						<?php $this->description(); ?>
					</div>
					<!-- 点赞 -->
					<ul class="post-meta">
						<li><a href="<?php $this->permalink() ?>#comments"><i class="fa fa-comments"></i> <?php $this->commentsNum('%d'); ?></a></li>
						<li><a><i class="fa fa-eye"></i> <?php $this->viewsNum(); ?></a></li>
						<li><a class="btn-like" data-cid="<?php $this->cid(); ?>"><i class="fa fa-thumbs-up"></i> <span class="post-like-num"><?php $this->likesNum(); ?></span></a></li>
					</ul>
			</div>
        </article>
	<?php endwhile; ?>
<!-- 文章 end -->
	<ul class="post-foot box">
        <li class="prev" title="<?php _e('上一页');?>"><?php $this->pageLink('<i class="fa fa-long-arrow-left"></i>','prev');?></li>
        <li class="num"><?php echo $this->getCurrentPage();?> of <?php echo $this->getTotalPage();?></li>
        <li class="next" title="<?php _e('下一页');?>"><?php $this->pageLink('<i class="fa fa-long-arrow-right"></i>','next');?></li>
    </ul>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
