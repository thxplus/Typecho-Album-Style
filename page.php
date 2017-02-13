<?php $this->need('header.php'); ?>

<div class="col-md-8" id="main" role="main">

    <article class="border margin-top-26">
      <div class="post-content" itemprop="articleBody">
	<?php $this->content(); ?>
      </div>
    </article>

    <?php $this->need('comments.php'); ?>
    
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
