<div>Contents</div>
<?php 
$this->widget('EasyTreeView', array(
                          'data' => $chapters,
                          'unique'=>false,
                          'collapsed'=>false,
						  'cssFile'=>Yii::app()->baseUrl.'/css/blog/jquery.treeview.css',
                          'htmlOptions' => array('class' => 'filetree',)
                           )
);
?>