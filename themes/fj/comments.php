<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    <?php if ($comments->have()): ?>
    <?php $comments->listComments(); ?>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    	<h3 id="response"><?php _e('添加新评论'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
			<div class="form-avatar">
				<?php 
					if($this->user->hasLogin()):
					$url = gravatarUrl($this->user->mail,48,'G','');
				?>
					<img src="<?php echo $url; ?>" width="48" class="avatar" />
				<?php elseif($this->remember('mail',true)): ?>
					<img src="<?php echo gravatarUrl($this->remember('mail',true)); ?>" width="48" class="avatar" />
				<?php else: ?>
					<img src="<?php $this->options->themeUrl('img/icon-avatar.png'); ?>" width="32" class="avatar" />
				<?php endif; ?>
			</div>
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
    		<p class="field clearfix">
    			<input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" placeholder="称呼 *" required />
				<input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>  placeholder="Email<?php if ($this->options->commentsRequireMail): ?> *<?php endif; ?>"/>
			</p>
    		<p><input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>  placeholder="网站<?php if ($this->options->commentsRequireURL): ?> *<?php endif; ?>"/></p>
            <?php endif; ?>
    		<p><textarea rows="4" name="text" id="textarea" class="textarea" placeholder="内容" required><?php $this->remember('text'); ?></textarea></p>
            <!-- 表情 -->
			<?php Smilies_Plugin::output(); ?>
    		<p><button type="submit" class="btn blue"><?php _e('提交评论'); ?></button></p>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
