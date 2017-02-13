<?php
 /**
 * all
 *
 * @package custom
 */
    
 //默认缩略图地址
 $thumb = '';
 //每页显示条数
 $num_perpage = '10';
 
 $this->need('header.php');
?>

<div class="col-mb-12 col-8" id="main" role="main">
 
<?php 
 	$db = Typecho_Db::get();
 	$options = Typecho_Widget::widget('Widget_Options');
 	$query = $db->select()
 			 ->from('table.contents')
       ->where('status = ?', 'publish')
       ->where('created < ?', $options->gmtTime)
       ->where('type = ?', 'post')
       ->order('created', Typecho_Db::SORT_DESC);
 	
 	$total = count($db->fetchAll($query));
 	$path = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"] ;

 	if ( preg_match('|(.*?)/?page=(\d+)|',$path,$num) ){
 		$cur_page = $num['2'];
 	}else{
 		$num['1'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REDIRECT_URL'].'?';
 		$cur_page = '1';
 	}
 	
 	$max_page = ceil($total/$num_perpage);
	$cur_page > $max_page ? $cur_page = $max_page : NULL ;
	$query = $query->page($cur_page,$num_perpage);
	$res = $db->fetchAll($query);
	
	$url_tag = Typecho_Router::url('post',array(),$options->index);
	
 	foreach ( $res as $list){

 		$mid = $db->fetchAll($db->select()->from('table.relationships')->where('cid = ?', $list['cid']));
		$category = $db->fetchAll($db->select()->from('table.metas')->where('mid = ?', $mid['0']['mid']));
		$time = date('Y-m-d',$list['created']);
 		$year = date('Y',$list['created']);
 		$month = date('m',$list['created']);
 		$day = date('d',$list['created']);
 		
		$link = str_replace(
						array('{cid}','{slug}','{category}','{year}','{month}','{day}'),
						array($list['cid'],$list['slug'],$category['0']['slug'],$year,$month,$day),
						$url_tag);
						
 		//自由发挥开始
 		
 		
 		echo '<a href="'.$link.'">'.$list['title'].'</a> '.$time;
 		echo '<br/>';
 		
 		
 		
 		//自由发挥结束
 	}

?>
	
	<!-- 分页类 -->
	<ol class="page-navigator">
<?php
	$r = array('上一页', '下一页', 3, '...', 'current');
	$nav = new Typecho_Widget_Helper_PageNavigator_Box( $total, $cur_page, $num_perpage, $num['1'].'page='.'%7Bpage%7D' );
	echo $nav->render( $r );
?>
	</ol>
</div><!-- end #main-->
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>