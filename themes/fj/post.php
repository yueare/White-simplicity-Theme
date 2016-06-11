<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('controls.php'); ?>
<article class="post single">
	<div class="blog-banner">
		<?php $thumb = thumbnail($this,'970x420',true);if(!$thumb):?>
			<?php $thumb = $this->options->themeUrl.'/img/banner.jpg';?>
		<?php endif;?>
		<div class="blog-banner-img" style="background-image:url('<?php echo $thumb;?>');"></div>
		<div class="blog-banner-text">
			<div class="post-category"><?php $this->category(','); ?></div>
			<h2><?php $this->title() ?></h2>
			<ul class="post-meta">
				<li><a href="#comments"><i class="fa fa-comments"></i> <?php $this->commentsNum('%d'); ?></a></li>
				<li><a><i class="fa fa-eye"></i> <?php $this->viewsNum(); ?></a></li>
				<li><a class="btn-like" data-cid="<?php $this->cid(); ?>"><i class="fa fa-thumbs-up"></i> <span class="post-like-num"><?php $this->likesNum(); ?></span></a></li>
				<li><a><i class="fa fa-clock-o"></i> <?php $this->date('Y/m/d H:i:s'); ?></a></li>
			</ul>
		</div>
	</div>
	<div class="post-body">
		<div class="post-content">
			<?php parseContent($this); ?>
		</div>
		<?php if($this->tags):?>
		<p class="post-tags"><i class="fa fa-tags"></i> <?php _e('标签：'); $this->tags(', ', true, 'none'); ?></p>
		<?php endif;?>
		<p class="post-share" data-title="<?php $this->title();?>" data-url="<?php $this->permalink();?>" data-desc="<?php $this->description();?>"><i class="fa fa-share-alt"></i> 
		分享到<a class="btn-share" href="#">微博</a>
		或 <span class="btn-wechat">微信
		<span id="qrcode-img"></span>
		</span></p>
	</div>
</article>
<ul class="post-near">
	<li class="prev" title="<?php _e('上一篇');?>"><?php $this->thePrev('<i class="fa fa-chevron-left"></i> %s'); ?></li>
	<li class="next" title="<?php _e('下一篇');?>"><?php $this->theNext('%s <i class="fa fa-chevron-right"></i>'); ?></li>
</ul>
<div class="post-extend">
	<div class="comment-col"><?php $this->need('comments.php'); ?></div>
	<div class="widget-col">
		<div class="widget">
			<h3>最新文章</h3>
			<ul class="widget-list">
				<?php $this->widget('Widget_Contents_Post_Recent')->to($RecentPosts); ?>
				<?php while($RecentPosts->next()): ?>
				<li>
				<a href="<?php $RecentPosts->permalink(); ?>" title="<?php $RecentPosts->commentsNum();_e('条评论'); ?>"><?php $RecentPosts->title(); ?></a></li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>
<?php $this->need('footer.php'); ?>
