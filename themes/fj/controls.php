<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="blog-controls">
	<a href="#" class="btn-toggle" data-toggle="category"><i class="fa fa-bars"></i></a>
	<a href="#" class="search-toggle btn-toggle" data-toggle="search"><i class="fa fa-search"></i></a>
	<div class="category-panel expand-panel">
		<h1>分类目录</h1>
		<ul>
		<?php $this->widget('Widget_Metas_Category_List')->to($listCategories); ?>
		<?php while($listCategories->next()):?>
		<li><a href="<?php $listCategories->permalink();?>"><?php $listCategories->name();?></a></li>
		<?php endwhile;?>
		</ul>
	</div>
	<div class="search-panel expand-panel">
		<h1><?php _e('搜索文章'); ?></h1>
		<form id="site-srh-form" method="post" action="./">
			<input type="text" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
			<button type="submit" class="submit btn"><?php _e('搜索'); ?></button>
		</form>
	</div>
</div>