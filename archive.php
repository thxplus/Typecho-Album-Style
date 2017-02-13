<?php $this->need('header.php'); ?>
    
<div class="col-md-8" id="main" role="main">

<?php if ($this->have()): ?>  
	<?php while($this->next()): ?>
    <article class="border margin-top-26">
    	<div class="art-time">
    		<span class="time-d"><?php $this->date('d'); ?></span>
    		<span class="time-m"><?php $this->date('M'); ?></span>
    	</div>
			<h3 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php echo my_substr($this->title,40); ?></a></h3>
			<ul class="post-meta list-unstyled">
				<!--li  class="pull-left margin-right" itemprop="author" itemscope itemtype="http://schema.org/Person">
					<img src="<?php $this->options->themeUrl('img/writer.png') ; ?>"><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
				</li-->
				<li class="pull-left margin-right"><img src="<?php $this->options->themeUrl('img/cat.png') ; ?>"><?php $this->category(','); ?></li>
				<li class="pull-left margin-right"><img src="<?php $this->options->themeUrl('img/time.png') ; ?>"><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y/m/d'); ?></time></li>
				<li  class="pull-left margin-right" itemprop="interactionCount"><img src="<?php $this->options->themeUrl('img/comment.png') ; ?>"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('0', '1 条', '%d 条'); ?></a></li>
			</ul>
			<div class="border-bottom clearfix"></div>
			<?php 
       	if ( preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $r ) ){
       		//print_r($r);//$r['2']['0'];
       		for( $i = 0 ; $i < count($r); $i ++ ){
       			$imgInfo = @getimagesize($r['2'][$i]);
       			if ( $imgInfo['0'] > 759 ){
       				$this->content = str_replace($r['0'][$i],'',$this->content);
       				echo '<div class="art-img">'.$r['0'][$i].'</div>';
       			}else if ( $imgInfo['0'] > 659 ){
       				$this->content = str_replace($r['0'][$i],'<div style="width:660px;margin-bottom:10px;">'.$r['0'][$i].'</div>',$this->content);
       			}
       		}
       	}
      ?>
      <div class="post-content" itemprop="articleBody">
				<?php $this->content('- 阅读剩余部分 -'); ?>
      </div>
    </article>
	<?php endwhile; ?>
<?php else: ?>
   <article class="post">
     <h3 class="post-title widget-title"><?php _e('骚瑞 没有找到内容'); ?></h2>
   </article>
<?php endif; ?>
	<?php $this->pageNav('PREV', 'NEXT'); ?>
</div><!-- end #main-->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
