<div class="col-md-4 visible-md visible-lg" >
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="border margin-top-26">
		<h5 class="nomargin padding padding-left border-bottom"><?php _e('最新文章'); ?></h5>
        <ul class="nav nav-pills nav-stacked margin-top margin-bottom">
           <?php $this->widget('Widget_Contents_Post_Recent')->to($recent);?>
           <?php while($recent->next()): ?>
            	<li><a href="<?php $recent->permalink(); ?>"><?php echo my_substr($recent->title,46);?></a></li>
          <?php endwhile; ?>
        </ul>
    </section>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="border margin-top-26">
		<h5 class="nomargin padding padding-left border-bottom"><?php _e('最近回复'); ?></h5>
        <ul class="nav nav-pills nav-stacked margin-top margin-bottom">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next('2')): ?>
          <li>
            <a class="modal-open" href="<?php $comments->permalink(); ?>">
            	<div class="pull-left margin-right">
            		<?php $comments->gravatar(128); ?>
            	</div>
            	<div>
            		<span><?php $comments->author(false); ?></span>
            		<span class="h6 pull-right text-muted"><?php $comments->date("m月d日 H:i"); ?></span><br/>
            		<span><?php $comments->excerpt(36, '...'); ?></span>
            	</div>
            </a>
          </li>
         	<div class="clearfix"></div>
        <?php endwhile; ?>
        </ul>
    </section>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="border margin-top-26">
			<h5 class="nomargin padding padding-left border-bottom"><?php _e('分类'); ?></h5>
      <ul class="nav nav-pills nav-stacked margin-top margin-bottom">
        <?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}"><span class="badge pull-right">{count}</span>{name}</a></li>'); ?>
      </ul>
		</section>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="border margin-top-26">
			<h5 class="nomargin padding padding-left border-bottom"><?php _e('归档'); ?></h5>
			<ul class="nav nav-pills nav-stacked margin-top margin-bottom">
				<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}"><span class="badge pull-right">{count}</span>{date}</a></li>'); ?>
			</ul>
		</section>
	<?php endif; ?>
	
    <section class="border margin-top-26">
			<h5 class="nomargin padding padding-left border-bottom"><?php _e('友邻'); ?></h5>
			<ul class="nav nav-pills nav-stacked margin-top margin-bottom">
				<li><a target="_bank" href="http://gongchao.me">GongChao's Blog</a></li>
				<li><a target="_bank" href="http://www.gurenx.com">故人</a></li>
				<li><a target="_bank" href="http://wiki8.org">爱吧博客</a></li>
				<li><a target="_bank" href="http://chenfeng.cc">晨风小站</a></li>
				<li><a target="_bank" href="http://i0o0.com">Jingquan</a></li>
				<li><a target="_bank" href="http://weburls.net/">Weburls</a></li>
				<li><a target="_bank" href="http://www.youzengwei.cn">尤锃威</a></li>
				<li><a target="_bank" href="http://sunhaitao.cn">Wood's</a></li>
			</ul>
		</section>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
		<section class="border margin-top-26">
			<h5 class="nomargin padding padding-left border-bottom"><?php _e('其它'); ?></h5>
			<ul class="nav nav-pills nav-stacked margin-top margin-bottom">
				<?php if($this->user->hasLogin()): ?>
					<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
					<li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
				<?php else: ?>
					<li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
				<?php endif; ?>
			</ul>
		</section>
	<?php endif; ?>

</div><!-- end #sidebar -->
