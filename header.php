<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="-QZD16YSUq2ZY2drDED7CyD1jqR_WQLS_OGQKfmAWa4" />
    <title>
    	<?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?>
        <?php $this->options->title(); ?>
    </title>
    
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/way.css'); ?>">
    
    <!--[if lt IE 9]>
    <script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="alert alert-warning alert-dismissable">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	<?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.
    </div>
<![endif]-->

<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
  <div class="row">
  	
  	<div class="navbar-header col-md-1">
  	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
  	    <span class="sr-only">Toggle navigation</span>
  	    <span class="icon-bar"></span>
  	    <span class="icon-bar"></span>
  	    <span class="icon-bar"></span>
  	  </button>
  	  <a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
  	</div>

		<div class="collapse navbar-collapse col-md-5 margin-left">
			<ul class="nav navbar-nav">
				<li<?php if($this->is('index')): ?> class="active"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
				<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
				<?php while($pages->next()): ?>
				<li<?php if($this->is('page', $pages->slug)): ?> class="active"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
				<?php endwhile; ?> 
				<li><a href="<?php $this->options->siteUrl(); ?>Album"><?php _e('相册'); ?></a></li>
				<li><a href="<?php $this->options->siteUrl(); ?>links"><?php _e('友邻'); ?></a></li>
			</ul>
		</div>
		
		<div class="col-md-4 navbar-right nopadding visible-md visible-lg">
			<form class="navbar-form margin-top" method="post" action="./" role="search">
				<div class="input-group">
					<label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
      		<input type="text" name="s" class="form-control" placeholder="<?php _e('输入关键字搜索'); ?>" />
      		<span class="input-group-btn">
        		<button class="btn btn-default" type="submit"><?php _e('搜'); ?></button>
      		</span>
    		</div>
			</form>
		</div>
		
	</div>
	</div>
</nav>

<div class="container" id="body">
	<div class="row">
