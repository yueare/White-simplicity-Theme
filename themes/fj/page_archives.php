<?php
/**
 * 文章存档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="blog-banner-page page">
	<div class="blog-banner-img" style="background-image:url('<?php $this->options->themeUrl('img/banner.jpg');?>');"></div>
	<h2><?php $this->title();?></h2>
</section>



<div class="post-body post-text">
		<h1>标签集</h1>
		<ul class="tag-list">
		<?php $this->widget('Widget_Metas_Tag_Cloud')->parse('<li><a href="{permalink}" title="{count}个话题">{name}({count})</a></li>');?>
		</ul>
	</div>
<article class="post-page">
<div class="post-body post-text">
		<h1>分类目录</h1>
		<ul>
		<?php $this->widget('Widget_Metas_Category_List')->to($listCategories); ?>
		<?php while($listCategories->next()):?>
		<li><a href="<?php $listCategories->permalink();?>"><?php $listCategories->name();?></a></li>
		<?php endwhile;?>
		</ul>
</div>

	<div class="post-body post-text">
		<?php
			$stat = Typecho_Widget::widget('Widget_Stat');
			Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
			$year=0; $mon=0; $i=0; $j=0;
			$output = '';
			while($archives->next()){
				$year_tmp = date('Y',$archives->created);
				$mon_tmp = date('m',$archives->created);
				$y=$year; $m=$mon;
				if ($year > $year_tmp || $mon > $mon_tmp) {
					$output .= '</ul>';
				}
				if ($year != $year_tmp || $mon != $mon_tmp) {
							 $year = $year_tmp;
							 $mon = $mon_tmp;
							 $output .= '<h2>'.date('Y年m月',$archives->created).'</h2><ul class="archives-list">'; //输出年份
				}
				$output .= '<li>'.date('d日',$archives->created).' <a href="'.$archives->permalink .'">'. $archives->title .'</a></li>'; //输出文章
			}
			$output .= '</ul>';
			echo $output;
		?>
	</div>
</article>
<?php $this->need('footer.php'); ?>
