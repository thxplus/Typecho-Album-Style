<?php

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/


	function my_substr($str,$limit_length) {
 		$return_str   = "";
  	$total_length = 0; 
  	$len = mb_strlen($str,'utf8');
  	for ($i = 0; $i < $len; $i++) {
  	   $curr_char   = mb_substr($str,$i,1,'utf8');
  	   $curr_length = ord($curr_char) > 127 ? 2 : 1;

  	   if ($i != $len -1) {
  	     $next_length = ord(mb_substr($str,$i+1,1,'utf8')) > 127 ? 2 : 1;
  	   } else {
  	     $next_length = 0;
  	   }
  	
  	   if ($total_length + $curr_length + $next_length > $limit_length) {
  	     return "{$return_str}…";
  	   } else {
  	     $return_str .= $curr_char;
  	     $total_length += $curr_length;
  	   }
  	}
  	return $return_str;
	} 
	
	